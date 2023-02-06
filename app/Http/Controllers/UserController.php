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
    //
    public function userListView()
    {
        # code...
        $users=User::paginate(8);
        return view('Users.user.userList',compact('users'));
    }
    public function userCreateForm()
    {
        # code...
        $roles=roles::get();
        return view('Users.Forms.createUserForm',compact('roles'));
    }
    public function userCreate(Request $request)
    {
        # code...
        $this->userValidation($request->toArray());
        $userData=$request->toArray();
        $userData['password']=Hash::make($userData['password']);
        User::create($userData);
        return redirect()->route('userList');
    }

    // user data edit form for update user data
    public function userEditForm($id)
    {
        # code...
        $user=User::where('id',$id)->first();
        $roles=roles::get();
        return view('Users.Forms.editUserForm',compact('roles','user'));
    }

    public function userDataUpdate(Request $request,$id)
    {
        # code...
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
            'gender'=>$request->gender,
            'is_active'=>$request->is_active ?? 0,
            'username'=>$request->username,

        ]);
        return redirect()->route('userList')->with('success',"Successfully Update User's Data");

    }
    public function userInfo($id){
        $user=User::where('id',$id)->first();
        $users=User::get();
        return view('Users.user.userInfo',compact('user','users'));
    }


    //delete user
    public function userDelete($id)
    {
        # code...
        User::where('id',$id)->delete();
        return back();

    }

    // validation

    //validtion for user creation
    private function userValidation($request)
    {
        # code...
        return Validator::make($request,[
            'name'=>'required|max:30',
            'email'=>'unique:users,email',
            'phone'=>'numeric|unique:users,phone',
            'gender'=>'required|boolean',
            'role_id'=>'required|boolean',
            'is_active'=>'boolean',
            'username'=>'required',
            'password'=>'required|min:8',
            'confirmPassword'=>'required|min:8|same:password',

        ])->validate();
    }

    //validation for user data update
    private function updateDataValidation($request,$id)
    {
        # code...
        return Validator::make($request,[
            'name'=>'required|max:30',
            'email'=>'unique:users,email,'.$id,
            'phone'=>'numeric|unique:users,phone,'.$id,
            'gender'=>'required|boolean',
            'role_id'=>'required|boolean',
            'is_active'=>'boolean',
            'username'=>'required',
        ])->validate();

    }
    //validation for user data update
    private function updatePasswordValidation($request)
    {
        # code...
        return Validator::make($request,[
            'password'=>'required|min:8',
            'confirmPassword'=>'required|min:8|same:password',
        ])->validate();

    }
}
