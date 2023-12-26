<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function showStudents(){
        $students = DB::table('students')
        // ->select('name', 'age')
        ->get();
        // return $students;
        // dd($students);

        // return view('allstudents', ['data' => $students]);
        $data['data'] = $students;
        return view('allstudents', $data);
    }
    
    public function singleStudent( string $id){
        $student = DB::table('students')->where('id', $id)->get();
        return view('student', ['data' => $student]);
        
    }
}
