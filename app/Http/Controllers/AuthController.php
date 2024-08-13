<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function register(Request $request,User $user){
         $field=$request->validate([
            'name'=>['required','min:6'],
            'email'=>['required','email','unique:users'],
            'password'=>['required','min:6','confirmed'],
            'image'=>['image','mimes:png,jpg,jpeg']
         ]);
         $path=null;
         if($request->hasFile('image')){
            $path=Storage::disk('public')->put('users_images',$request->image);
            $field['image_path']=$path;
         }
         
         $user=User::create($field);


         Auth::login($user);

         event(new Registered($user));


         return redirect()->route('view.dashboard');
        }






    public function login(Request $request,User $user){
         $field=$request->validate([
            'email'=>['required','email'],
            'password'=>['required'],
         ]);   
         if(Auth::attempt($field,$request->filled('remember'))){
            return redirect()->route('post.index');
         }else{
            return back()->with('error','these records does not match our records');
         }
           
    }






    public function logout(Request $request){
       Auth::logout();
       $request->session()->invalidate();
       $request->session()->regenerateToken();
       return redirect()->route('home');
    }
    public function resetpassword(Request $request){
      dd('ok');
    $field=$request->validate([
        'email'=>['required','email'],
    ]);
    $status=Password::sendResetLink($field);
    return $status===Password::RESET_LINK_SENT ? back()->with(['status'=>__($status)]) : back()->withErrors(['email'=>__($status)]);
    }





    public function verify() {
      return view('auth.verify-email');
  }
  
  public function verifyEmail(EmailVerificationRequest $request) {
      $request->fulfill();
      return redirect()->route('view.dashboard');
  }
  
  public function sendVerificationEmail(Request $request) {
      $request->user()->sendEmailVerificationNotification();
      return back()->with('message', 'Verification link sent!');
  }
}
