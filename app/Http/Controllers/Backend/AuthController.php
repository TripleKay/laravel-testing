<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateAdminRequest;

class AuthController extends Controller
{
    //login view
    public function login(){

        if(!Auth::check()){
            return view('backend.auth.login');
        }
        return redirect()->route('dashboard');
    }

    //login submit
    public function postLogin(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);
        $user = User::where('email',$request->email)->first();
        if($user){
            if(Hash::check($request->password,$user->password)){
                $credential = $request->only('email','password');
                Auth::attempt($credential);
                return redirect()->route('dashboard');
            }else{
                return back()->with(['credentialError'=>'Your credential do not match']);
            }
        }
        return back()->with(['credentialError'=>"Your credential does not exists"]);
    }

    //edit profile
    public function editProfile(){
        $data = auth()->user();
        return view('backend.auth.edit-profile')->with(['data' => $data]);
    }

    //update editProfile
    public function updateProfile(UpdateAdminRequest $request){
        User::where('id',auth()->user()->id)->update([
            'name' => $request->name,
            'email' => $request->email
        ]);
        return redirect()->route('dashboard')->with(['success'=>'Profile ပြုပြင်ခြင်းအောင်မြင်ပါသည်။']);
    }

    //edit password
    public function editPassword(){
        return view('backend.auth.edit-password');
    }

    //update password
    public function updatePassword(Request $request){
        $request->validate([
            'newPassword' => 'required|string',
            'confirmPassword' => 'required|string',
        ]);
        if($request->newPassword != $request->confirmPassword){
            return back()->with(['passwordError' => 'Password confirmation do not match!']);
        }
        User::where('id',auth()->user()->id)->update([
                'password' => Hash::make($request->newPassword),
        ]);
        return redirect()->route('dashboard')->with(['success'=>'Password ‌ပြောင်းလဲခြင်းအောင်မြင်ပါသည်။']);
    }

    //logout
    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}