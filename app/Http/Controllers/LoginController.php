<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\CustomValidationServiceInterface;


class LoginController extends Controller
{
    public function __construct(CustomValidationServiceInterface $customServiceProvider)
    {
        $this->customServiceProvider = $customServiceProvider;
    }

    public function showloginForm(){
        $validation = '';
        return view('login')->with('error',$validation);
    }
    public function login(Request $request){
        $validation = $this->customServiceProvider->customvalidations();
        if ($validation) {
            return view('login')->with('error',$validation);
        }
        return view('dashboard');
    }
    public function logout(){
        session()->forget('user_name');
        return redirect('/');
    }
}
