<?php
namespace App\Service;
use App\Models\Employee;
class CustomValidationService implements CustomValidationServiceInterface{
   public function customvalidations(){

    $message        = array();
    $employeeNumber = $_POST['empno'];
    $password       = $_POST['password'];
    $employee       = Employee::where('employeeno',  $employeeNumber)->first();

    if ( $employee  == null) {
       $message[] = 'Employee Number is not valid';
    }elseif ($employee->password != $password ) {
        $message[] = 'Password is not matching';
    }elseif ($employee  != null && $employee->password == $password) {
        $_SESSION['user_name'] =  $employee->name;
    }
    return $message;
 
   }
   public function registerationvalidation(){
    $message = array();
    $employeeregno  = $_POST['empnmbr'];
    if ($employeeregno) {
        $employee       = Employee::where('employeeno',  $employeeregno)->first();
        if ($employee != null) {
            $message[] = 'This Employee Number Already Exists';
        }
        return $message;
    }
   }
}