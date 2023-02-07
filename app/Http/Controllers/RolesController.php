<?php

namespace App\Http\Controllers;

use App\Models\roles;
use App\Models\features;
use Illuminate\Http\Request;
use App\Models\role_permissions;
use Illuminate\Support\Facades\Validator;

class RolesController extends Controller
{
    //
    public function roleListView()
    {
        # code...
        $roles=roles::when(request('search'),function($query){
            $query->where('name','like','%'.request('search').'%');
        })->paginate('8');
        $role=$roles->appends(request()->all());
        return view('App.roles.roleList',compact('roles'));
    }

    //role create blade form
    public function roleCreateForm(){
        $features=features::get();
        $permissions=$this->permissions($features);
        return view('App.Forms.createRoleForm',compact('features','permissions'));
    }

    //role Creation
    public function roleCreate(Request $request)
    {
        # code...
        $this->roleValidate($request->toArray());
        $permission_arr=$request->toArray();
        $permissions=array_splice($permission_arr,2);
        if(count($permissions)==0){
            return back()->with('error','A role must have at least one permission.');
        }
        $roleData=roles::create([
            'name'=>$request->roleName
        ]);
        $this->roleCreation($permissions,$roleData);
        return redirect()->route('roleList')->with('success','Successfully Create New Role');
    }
    //get role permissions
    private function permissions($features){
        $permissions=[];
        foreach ($features as $f ) {
            $permission=features::select('permissions.id as permissions_id','features.name as feature','permissions.name as permission')
            ->where('features.name',$f->name)
            ->orderBy('permissions.id','asc')
            ->leftJoin('permissions','features.id','permissions.feature_id')
            ->get();
            $permissions[$f->name]=$permission;
        }
        return $permissions;
    }

    //role edit blade form
    public function roleEditForm($id)
    {
        # code...
        $role=$this->defaultRoleCheck($id);
        if(!$role){
           return back()->with('role-error','Invalid Role Id');
        }
        $features=features::get();
        $permissions=$this->permissions($features);
        $permissions_id=role_permissions::where('role_id',$id)->get();
        return view('App.Forms.roleEditForm',compact('features','permissions','permissions_id','role'));


    }
    //for only edut permission role
    public function editPermission(Request $request)
    {
        # code...
        Validator::make($request->toArray(),[
            'roleId'=>'required',
        ])->validate();
        return redirect()->route('roleEditForm',$request->roleId);
    }
    //role update
    public function roleUpdate(Request $request)
    {
        # code...
        $role=$this->defaultRoleCheck($request->role_id);
        $this->roleUpdateValidate($request->toArray());
        $permission_arr=$request->toArray();
        $permissions=array_splice($permission_arr,3);
        if(count($permissions)==0){
            return back()->with('error','A role must have at least one permission');
        }
        roles::where('id',$request->role_id)->update([
            'name'=>$request->roleName
        ]);
        role_permissions::where('role_id',$request->role_id)->delete();
        $this->roleCreation($permissions,$role);
        return redirect()->route('roleList')->with('success','Successfully Update Role');

    }
    //role delete
    public function roleDelete($id)
    {
        $this->defaultRoleCheck($id);
        roles::where('id',$id)->delete();
        role_permissions::where('role_id',$id)->delete();
        return back();
    }

    // default admin role check
    public function defaultRoleCheck($id)
    {
        # code...
        $role=roles::where('id',$id)->first();
        $roleName=$role?$role->name:'';
        if($role && $roleName!='admin'){
            if($roleName=='admin'){
                return false;
            }
            return $role;
        }
        return false;

    }


    //
    private function roleCreation($permissions,$roleData){
        $permissions_id=array_values($permissions);
        $roleId=$roleData->id;
        foreach ($permissions_id as $permission ) {
            role_permissions::create([
                'role_id'=>$roleId,
                'permissions_id'=>$permission,
            ]);
        }

    }

    //role validation
    private function roleValidate($request){
        return Validator::make($request,[
            'roleName'=>'required|unique:roles,name',
        ])->validate();
    }
    //role validation
    private function roleUpdateValidate($request){
        return Validator::make($request,[
            'roleName'=>'required|unique:roles,name,'.$request['role_id'],
        ])->validate();
    }
}
