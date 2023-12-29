<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function showStudents(){
        // $students = DB::table('students')
        // // ->select('name', 'age')
        // // ->where('id', 1)->orWhere('age',15)->orWhereBetween('age', [15, 19])
        // // ->orderBy('age','desc')
        // ->get();
        
        // $students = DB::table('students')->orderBy('id', "desc")->simplePaginate(4);
        // $students = DB::table('students')->orderBy('id', "asc")->paginate(4,['*'], 'p', 2);  
        // $students = DB::table('students')->paginate(4)->appends(['sort' => 'vote', 'test' => 'abc'])->fragment('students');  
        $students = DB::table('students')->orderBy('id')->cursorPaginate(4);  

        $data['data'] = $students;
        return view('allstudents', $data);
    }
    
    public function singleStudent( string $id){
        $student = DB::table('students')->where('id', $id)->get();
        return view('student', ['data' => $student]);
        
    }
    
    public function addStudent(Request $req){
        $student = DB::table('students')
                ->insert(
                    [
                        'name' => $req->sname,
                        'age' => $req->sage,
                        'email' => $req->semail,
                        'address' => $req->saddress,
                        'city' => $req->scity,
                        'phone' => $req->sphone,
                        'password' => $req->spassword
                    ]
                );
        if($student){
            return redirect()->route('allstudents');
            // echo "<h1>Data Added Successfully.</h1>";
            
        }else{
            echo "<h1>Failed to Add Data.</h1>";

        }
        
    }
    
    public function updatePage(string $id){   
        // $student = DB::table('students')->where('id', $id)->get();
        $student = DB::table('students')->find($id);

        return view('updatestudent', ['data' => $student]);
        
    }
    
    public function updateStudent( Request $req, $id){
        $student = DB::table('students')
        ->where('id', $id)
        ->update(
            [
                'name' => $req->sname,
                'age' => $req->sage,
                'email' => $req->semail,
                'address' => $req->saddress,
                'city' => $req->scity,
                'phone' => $req->sphone,
                'password' => $req->spassword
            ]
        );
        if($student){
            return redirect()->route('allstudents');
            // echo "<h1>Data Updated Successfully.</h1>";
            
        }else{
            echo "<h1>Failed to Update Data.</h1>";

        }
        
    }
    
    public function deleteStudent( string $id){
        $student = DB::table('students')
        ->where('id', $id)
        ->delete();
        if($student){
            return redirect()->route('allstudents');

        }
        
    }
}
