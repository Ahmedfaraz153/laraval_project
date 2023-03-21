<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Service\CustomValidationServiceInterface;

class RegisterController extends Controller
{
    public function __construct(CustomValidationServiceInterface $customServiceProvider)
    {
        $this->customServiceProvider = $customServiceProvider;
    }
    public function showRegistrationForm(){
        $validation = '';
        return view('register')->with('error',$validation);
    }
    public function register(Request $request){
        $validation = $this->customServiceProvider->registerationvalidation();
        if ($validation) {
            return view('register')->with('error',$validation);
        }
        $item             = new Employee();
        $item->name       = $request->input('name');
        $item->email      = $request->input('mail');
        $item->employeeno = $request->input('empnmbr');
        $item->password   = $request->input('password');
        $item->save();
        return view('login')->with('error',$validation);
    }
}
