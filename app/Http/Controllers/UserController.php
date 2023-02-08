<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\roles;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    //user list
    public function userListView()
    {
        $users=User::when(request('search'),function($query){
            $query->where('name','like','%'.request('search').'%')
            ->orWhere('email','like','%'.request('search').'%')
            ->orWhere('phone','like','%'.request('search').'%');
        })->paginate('8');
        $users=$users->appends(request()->all());
        return view('App.user.userList',compact('users'));
    }
    //user create view form
    public function userCreateForm()
    {
        $roles=roles::get();
        return view('App.Forms.createUserForm',compact('roles'));
    }
    //user creation
    public function userCreate(Request $request)
    {
        $this->userValidation($request->toArray());
        $userData=$request->toArray();
        $userData['password']=Hash::make($userData['password']);
        User::create($userData);
        return redirect()->route('userList');
    }

    // user data edit form for update user data
    public function userEditForm($id)
    {
        $user=User::where('id',$id)->first();
       if($user){
            $roles=roles::get();
            return view('App.Forms.editUserForm',compact('roles','user'));
       }
       return back()->with('user-error','Invalid User Id');
    }
    //for only edut permission user
    public function editPermission(Request $request)
    {
        Validator::make($request->toArray(),[
            'userId'=>'required',
        ])->validate();
        return redirect()->route('userEditForm',$request->userId);
    }

    //update user data
    public function userDataUpdate(Request $request,$id)
    {
        $this->updateDataValidation($request->toArray(),$id);
        if($request->password){
            $this->updatePasswordValidation($request->toArray());
            $newPassword=Hash::make($request->password);
            User::where('id',$id)->update(['password'=>$newPassword]);
        }
        User::where('id',$id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'role_id'=>$request->role_id,
            'gender'=>$request->gender,
            'is_active'=>$request->is_active ?? 0,
            'username'=>$request->username,

        ]);
        return redirect()->route('userList')->with('success',"Successfully Update User's Data");

    }

    //user's infomation
    public function userInfo($id){
        $user=User::where('id',$id)->first();
        $users=User::get();
        return view('App.user.userInfo',compact('user','users'));
    }


    //delete user
    public function userDelete($id)
    {
        User::where('id',$id)->delete();
        return back();

    }

// validation

    //validtion for user creation
    private function userValidation($request)
    {
        return Validator::make($request,[
            'name'=>'required|max:30',
            'email'=>'unique:users,email',
            'phone'=>'numeric|unique:users,phone',
            'role_id'=>'required|numeric',
            'is_active'=>'boolean',
            'username'=>'required|unique:users,username',
            'password'=>'required|min:8',
            'confirmPassword'=>'required|min:8|same:password',

        ])->validate();
    }

    //validation for user data update
    private function updateDataValidation($request,$id)
    {
        return Validator::make($request,[
            'name'=>'required|max:30',
            'email'=>'unique:users,email,'.$id,
            'phone'=>'numeric|unique:users,phone,'.$id,
            'role_id'=>'required|numeric',
            'is_active'=>'boolean',
            'username'=>'required|unique:users,username,'.$id,
        ])->validate();

    }

    //validation for user data update
    private function updatePasswordValidation($request)
    {
        return Validator::make($request,[
            'password'=>'required|min:8',
            'confirmPassword'=>'required|min:8|same:password',
        ])->validate();

    }
}
