<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function showStudents()
    {
        // $students = DB::table('students')
        // // ->select('name', 'age')
        // // ->where('id', 1)->orWhere('age',15)->orWhereBetween('age', [15, 19])
        // // ->orderBy('age','desc')
        // ->get();

        // $students = DB::table('students')->orderBy('id', "desc")->simplePaginate(4);
        // $students = DB::table('students')->orderBy('id', "asc")->paginate(4,['*'], 'p', 2);
        // $students = DB::table('students')->paginate(4)->appends(['sort' => 'vote', 'test' => 'abc'])->fragment('students');
        $students = DB::table('students')->orderBy('id', 'desc')->cursorPaginate(4);

        $data['data'] = $students;
        return view('allstudents', $data);
    }

    public function showStudents1()
    {
        $students = DB::select('select * from students where age < ? and name like ?', [20, 'p%']);

        // $students = DB::select('select * from students where id = :id', ['id' => 3]);

        // $students = DB::insert('insert into students (name, age, email, address, city, phone, password, created_at, updated_at) values (?,?,?,?,?,?,?,?,?)', ['prince new', 21, 'princenew@gmail.com', 'address line 2', 'Ludhiana', '6284376502', 'passwordnew', now(), now()]);

        // $students = DB::update('UPDATE students SET email= "prince2@gmail.com2" WHERE id = ? ', [10]);

        // $students = DB::delete('DELETE FROM students WHERE id = ? ', [10]);

        return $students;
    }

    public function singleStudent(string $id)
    {
        $student = DB::table('students')->where('id', $id)->get();
        return view('student', ['data' => $student]);

    }

    public function addStudent(StudentRequest $req)
    {
        echo "hi";
        pr($req->all()) ;
        die;
        // $req->validate([
        //     'sname' => 'required',
        //     'sage' => 'required|numeric|min:18',
        //     // 'sage' => 'required|numeric|between:18,60',
        //     'semail' => 'required|email',
        //     'saddress' => 'required',
        //     'scity' => 'required',
        //     'sphone' => 'required|size:10',
        //     'spassword' => 'required|alpha_num|min:6'
        // ],[
        //     'sname.required' => 'Name is must be required.',
        //     'sage.required' => 'Age is must be required.',
        //     'sage.min' => 'Age shopuld not less than 18 years old.',
        //     'semail.required' => 'Email is must be required.',
        //     'semail.email' => 'Please enter valid email id.',
        //     'saddress.required' => 'Address is must be required.',
        //     'scity.required' => 'City is must be required.',
        //     'sphone.required' => 'Phone is must be required.',
        //     'sphone.size' => 'The phone field must be 10 characters.',
        //     'spassword.required' => 'Password is must be required.',
        //     'spassword.min' => 'The password field must be at least 6 characters.',
        //     'spassword.alpha_num' => 'The password field must only contain letters and numbers.'
        // ]);
        // return $req->only(['sname', 'scity']);
        // return $req->except(['sname', 'scity']);

        // return $req->all();
        $student = DB::table('students')
            ->insert(
                [
                    'name' => $req->sname,
                    'age' => $req->sage,
                    'email' => $req->semail,
                    'address' => $req->saddress,
                    'city' => $req->scity,
                    'phone' => $req->sphone,
                    'password' => $req->spassword,
                ]
            );
        if ($student) {
            return redirect()->route('allstudents');
            // echo "<h1>Data Added Successfully.</h1>";

        } else {
            echo "<h1>Failed to Add Data.</h1>";

        }

    }

    public function updatePage(string $id)
    {
        // $student = DB::table('students')->where('id', $id)->get();
        $student = DB::table('students')->find($id);

        return view('updatestudent', ['data' => $student]);

    }

    public function updateStudent(Request $req, $id)
    {
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
                    'password' => $req->spassword,
                ]
            );
        if ($student) {
            return redirect()->route('allstudents');
            // echo "<h1>Data Updated Successfully.</h1>";

        } else {
            echo "<h1>Failed to Update Data.</h1>";

        }

    }

    public function deleteStudent(string $id)
    {
        $student = DB::table('students')
            ->where('id', $id)
            ->delete();
        if ($student) {
            return redirect()->route('allstudents');

        }

    }

    public function showSongsInfo()
    {
        $songInfo = DB::table('artists')
            ->select('artists.*', 'albums.name as album_name')
            ->join('albums', 'artists.id', '=', 'albums.artist_id')
        // ->where('artists.id', '>', '4')
            ->where('albums.name', 'like', 's%')
            ->orderBy('artists.id', 'desc')
            ->get();

        return $songInfo;

    }

    public function uniondata()
    {
        $artistInfo = DB::table('artists')
            ->select('artists.name as artist_name');

        $albumInfo = DB::table('albums')
            ->union($artistInfo)
            ->select('albums.name')
            ->get();

        return $albumInfo;

    }

    public function whendata()
    {
        $test = false;

        $songsInfo = DB::table('songs')
            ->when($test, function ($query) {
                $query->where('album_id', '>', '8'); // Executed when true

            }, function ($query) {
                $query->where('album_id', '<', '3'); // Executed when false

            })
            ->get();

        return $songsInfo;

    }

    public function chunkdata()
    {

        $albumsInfo = DB::table('albums')
            ->orderBy('id')
            ->chunk(3, function ($albums) {
                echo "<div style='border: 1px solid red; margin-bottom:15px;'>";
                foreach ($albums as $album) {
                    echo $album->name . "<br>";
                }
                echo "</div>";
            });

        // return $albumsInfo;

    }

    public function cacheStudents()
    {
        // $json = File::get(path:'../database/json/students.json');

        // $students = collect(json_decode($json));
        // // return student::all();
        // return Cache::get("name", $students);
        // Cache::forget('name');

        return Cache::remember("students", 10, function () {
            // $json = File::get(path:'../database/json/students.json');

            // $students = collect(json_decode($json));
            // return $students;
            return Song::with('comments')->where('id', '=', '1')->get();
        });

        if (Cache::has("students")) {
            return Cache::get("students");
        }
    }
    public function fetch(Request $request)
    {
        if ($request->get('query')) {
            $query = $request->get('query');
            $exists = false;

            if (Cache::has("studentsName")) {
                // Cache::forget('studentsName'); echo "hi";die;
                $cachedData = Cache::get("studentsName");
                // echo gettype($cachedData);die;
                $matchCount = 0;
                $foundData = null;
                foreach ($cachedData as $data) {
                    if (str_contains(strtolower($data->name), strtolower($query))) {
                        $foundData = $data;
                        $matchCount++;
                    }

                }
                if ($foundData !== null) {  
                    $exists = true;
                    
                }

                    
                if($exists)
                {
                    // echo "match count: " . $matchCount;
                    // echo $matchCount;
                    echo "from cache";
                    // echo 
                    $data = $cachedData;
                }
                else{
                    // echo "hi<br>";
                    $data = DB::table('students')
                    ->select('name')
                    ->where('name', 'LIKE', "%{$query}%")
                    ->get();

                    if (sizeof($data) > 0) {
                        $combineData = $data->merge($cachedData);
                        echo "new data added to cache";
                        $data = $combineData;
                        Cache::put("studentsName", $data, now()->addMinutes(5)); //new data added to cache
                    }
                }

                // $dataFromDB = DB::table('students')
                // ->select('name')
                // ->where('name', 'LIKE', "%{$query}%")
                // ->get();
                // if($exists && sizeof($dataFromDB = DB::table('students')
                // ->select('name')
                // ->where('name', 'LIKE', "%{$query}%")
                // ->get()) > $matchCount && $matchCount > 0)
                // {
                //     $oldData = $cachedData;
                //     $filtered = $oldData->filter(function ($data) use ($query) {
                //         return !str_contains(strtolower($data->name), $query);

                //     });
                //     // echo gettype($filtered);die;
                //     // prx($filtered);

                //     $combineData = $dataFromDB->merge($filtered);
                //     echo "newly added";
                //     $data = $combineData;
                //     Cache::put("studentsName", $data, now()->addMinutes(5));
                    
                    
                // }
            } else {
                $data = DB::table('students')
                    ->select('name')
                    ->where('name', 'LIKE', "%{$query}%")
                    ->get();
                    // ->toArray();
                if (sizeof($data) > 0) {
                    Cache::put("studentsName", $data, now()->addMinutes(5));
                    echo "cache created";
                }

            }

            if(sizeof($data)>0){
                $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
                foreach ($data as $row) {
                    if (str_contains(strtolower($row->name), strtolower($query))) {
                        $output .= '
                                <li><a href="#">' . $row->name . '</a></li>
                                ';

                    }
                }
    
                // for ($i = 0; $i < sizeof($data); $i++) {
                //     $allnames = $data[$i]->name;
                //     if (str_contains(strtolower($allnames), strtolower($query))) {
                //         $output .= '
                //             <li><a href="#">' . $data[$i]->name . '</a></li>
                //             ';
    
                //     }
                // }
                $output .= '</ul>';
                echo $output;

            }
        }
    }

    public function upload(Request $request)
    {
        // echo $request->file('simage')->getPathName();
        $fileName = time()."_".$request->file('simage')->getClientOriginalName();

        echo $request->file('simage')->storeAs("/public/uploads", $fileName);  // left you at storage->app

        prx($request->all());
    }
}