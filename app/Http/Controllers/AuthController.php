<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
   public function index(){
       return view('index');
   }

   public function cek_login(Request $request){
       if(Auth::attempt($request->only('email','password'))){
           return redirect('home')->with('success', 'berhasil login');
       }
       return redirect('/');
   }
   public function logout(){
       Auth::logout();
       return redirect('/');
   }
}
