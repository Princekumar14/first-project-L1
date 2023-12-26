<?php

namespace Database\Seeders;

use App\Models\student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
 $action =env('INSERT_DATA_ACTION');
 function realData(){
    $json = File::get(path:'database/json/students.json');

    $students = collect(json_decode($json));

    $students->each(function($student){
        student::create([
            'name' => $student->name,
            'age' => $student->age,
            'email' => $student->email,
            'address' => $student->address,
            'city' => $student->city,
            'phone' => $student->phone,
            'password' => $student->password
        ]);
    });
 }
        if( $action== "using_seeder" || $action== "using_both"){
            realData();
        }
        if($action== "using_factory" || $action== "using_both"){
            student::factory()->count(10)->create();
        }
       

    }
}
