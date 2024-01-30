<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomServices\CustomServiceInterface;

use App\CustomFacade\DateClass;

class CustomController extends Controller
{
    public function doCustomThing(CustomServiceInterface $req){
        $req->doSomething();
        
    }
    public function dateFormatChanger(){
        return "Date Format Changer by Custom facade through Controller route : " . DateClass::dateFormatYMD('01/20/2024');
        
    }
}
