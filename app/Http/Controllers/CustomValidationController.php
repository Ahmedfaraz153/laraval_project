<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service\CustomValidationServiceInterface;


class CustomValidationController extends Controller
{
    private $customServiceProvider;
    
    public function __construct(CustomValidationServiceInterface $customServiceProvider)
    {
        $this->customServiceProvider = $customServiceProvider;
    }
    public function custom_validation(){
      return $this->customServiceProvider->customvalidations();
    }
}
