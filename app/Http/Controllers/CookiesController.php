<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CookiesController extends Controller
{
    public function setCookie(){
        if(!request()->hasCookie('cookie_myname')){
            // return response(view('welcome'))->withCookie('cookie_myname', Str::uuid(), 1);
            // return response(view('welcome'))->withCookie('cookie_myname',"hi i'm cookie prince");

            // $names = ["prince", "dawinder"];
            $names = [
                ["name" => "prince", "age" => 23],
                 ["name" => "dawinder", "age" => 22]
            ];
            $names_json = json_encode($names);
            return response(view('welcome'))->withCookie('cookie_myname', $names_json);

        }
        return view('welcome');
    }
    
    public function getCookie(){
        // return request()->cookie('cookie_myname');

        $names_json = request()->cookie('cookie_myname');

        // $names = json_decode($names_json);  // Use true for associative arrays
        // return $names[0]->name;

        $names = json_decode($names_json, true);  // Use true for associative arrays
        return $names;

    }
    
    public function delCookie(){
        return response('deleted')->cookie('cookie_myname', null, -1);
    }
}
