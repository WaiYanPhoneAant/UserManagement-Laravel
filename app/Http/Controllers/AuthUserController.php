<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthUserController extends Controller
{
    //
    public function AuthUserProfile()
    {
        # code...
        return view('Users.AuthUser.profile');
    }
    public function passwordUpdate(Request $request){
        $this->pwValidate($request->toArray());
        $currentPw= Auth::user()->password;
        $pwCheck=Hash::check($request->oldPassword,$currentPw);
        if($pwCheck){
            $newPw=$request->newPassword;
            $hashedPw=Hash::make($newPw);
            User::where('id',Auth::user()->id)->update([
                'password'=>$hashedPw,
            ]);
            return back();
        }else{
            return abort('404');
        }

    }
    public function AuthInfoUpdate(Request $request)
    {
        # code...
        $this->infoValidation($request->toArray());
        $update=User::where('id',Auth::user()->id)->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'gender'=>$request->gender,
            'is_active'=>$request->is_active?'1':'0',
        ]);
        if($update){
           return back()->with(['success'=>'Update Successfully Complete']);

        }else{
            return abort('500');
        }
    }

    //pw validation
    private function pwValidate($request){
        return Validator::make($request,[
            'oldPassword'=>'required|min:8',
            'newPassword'=>'required|min:8',
            'confirmPassword'=>'required|same:newPassword|min:8'
        ])->validate();
    }

    //info update validation
    private function infoValidation($request){
        return Validator::make($request,[
            'name'=>'required|max:20',
            'email'=>'required|unique:users,email,'.Auth::user()->id,
            'phone'=>'required|numeric',
            'gender'=>'required'
        ])->validate();
    }
}
