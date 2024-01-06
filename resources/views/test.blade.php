<?php
    $session = session()->all();
    echo "<pre>";
    print_r($session); 
    echo "</pre>";
  ?> 
   
@php
use App\Models\Artist;
use App\Models\Album;
use App\Models\Song;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Tag;
use App\Models\student;
// dd(Artist::with('albums')->where('id',6)->get());
// $songs = Artist::find(6);
// echo gettype($songs);
// echo "<pre>";
    // $art = Album::with('artist')->where('id',1)->first();
    // echo $art->artist->name;
// print_r($songs); 
// echo "</pre>";
// foreach ($songs as $song) {
//     echo $song->name . "<br>";
// }

// echo Album::with('artist')->where('id',3)->get();
// echo Category::with('albums')->where('id',3)->get();

// $comment = Comment::find(1);

// $commentable = $comment->commentable;
// echo $commentable;

// $song = Song::find(1);

// foreach ($song->comments as $comment) {
//     echo $comment->body . "<br>";
// }
//----------- polymorphic relationshps  start ----------------------------
// $song = Song::with('comments')->where('name', 'like', '%evin%')->first();  // Add ->first() to retrieve the song
// $tag = Tag::with('albums')->whereIn('id', [1, 2])->first();  // Add ->first() to retrieve the Album


// echo "<h4 style='font-weight: bold'>Commets : using ONETOMANY</h4>";
// foreach ($song->comments as $comment) {
//     echo "<li>".$comment->body . "</li>";
// }
// echo "<br><h4 style='font-weight: bold'>Tags :using MANYTOMANY</h4>";
// foreach ($song->tags as $songtag) {
//     echo "<li>".$songtag->name . "</li>";
// }
// echo "<br><h4 style='font-weight: bold'>Tag's album :using MANYTOMANY</h4>";
// foreach ($tag->albums as $tagalbum) {
//     echo "<li>".$tagalbum->name . "</li>";
// }
//----------- polymorphic relationshps  end ----------------------------   

//-----------------------------  Accessor start --------------------------
    // echo $user = student::find(19)->name;
//-----------------------------  Accessor end --------------------------

//-----------------------------  Mutator start --------------------------
    // $studentModel = new student();
    // $studentModel->name  = "MutAtor SinGh";
    // $studentModel->age  = 26;
    // $studentModel->email  = "mutator@gmail.singh";
    // $studentModel->address  = "mutator address";
    // $studentModel->city  = "MUTATORCITY";
    // $studentModel->phone  = "2563256323";
    // $studentModel->password  = "mutatorPassword213";
    // $studentModel->save();
//-----------------------------  Mutator end --------------------------

// die;
@endphp

@php
    $user = "prince";
    $fruits = ['apple', 'mango', 'grapes', 'banana']
@endphp

<script>
    // var data = @json($fruits);

    var data = {{ Js::from($fruits) }};
    

    data.forEach(function(enrty){
        console.log(enrty);
        
    });

</script>