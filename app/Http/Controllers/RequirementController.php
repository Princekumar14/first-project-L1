<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequirementRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RequirementController extends Controller
{
    //addRequirement
    public function addRequirement(Request $req)
    {
        $data['message']= "done";
        // $data['_token']= csrf_token();
        $data['_token'] = $req->header('X-CSRF-TOKEN');
       return json_encode($data);
    //    die;
        // dd($request,"hello");
        // $requirement = DB::table('requirements')
        //     ->insert(
        //         [
        //             'customer_name' => $req->customer_name,
        //             'customer_email' => $req->customer_email,
        //             'customer_phone' => $req->customer_phone,
        //             'customer_message' => $req->customer_message,
        //             'requested_product_image' => $req->requested_product_image,
        //             'page_info' => $req->page_info,
        //         ]
        //     );
        // if ($requirement) {
        //     // return redirect()->route('allstudents');
        //     echo "<h1>Data Added Successfully.</h1>";

        // } else {
        //     echo "<h1>Failed to Add Data.</h1>";

        // }

    }
    public function justcheck(Request $req)
    {
        echo $req;
        // pr($req);
        echo "just check";
        die;

    }

    public function takecsrf(Request $req)
    {
        $data['csrf_token'] = $req->session()->token();

        return json_encode($data);
    }
}
