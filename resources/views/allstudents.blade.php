<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>All Students</title>
</head>
<body>
   
    <?php
    use App\Models\Artist;
    use App\Models\Album;
    use App\Models\Song;
    use App\Models\Category;
    use App\Models\Comment;
    // dd(Artist::with('albums')->where('id',6)->get());
    // $songs = Artist::find(6);
    // echo gettype($songs);
    echo "<pre>";
        // echo Album::with('FirstSongs')->where('id',1)->get();
    // print_r($songs); 
    echo "</pre>";
    // foreach ($songs as $song) {
    //     echo $song->name . "<br>";
    // }

    // echo Album::with('artist')->where('id',3)->get();
    // echo Category::with('albums')->where('id',3)->get();
    $comment = Comment::find(1);
 
    $commentable = $comment->commentable;
    echo $commentable;

    $song = Song::find(2);
    // echo $song->comments . "hi";
    echo "<pre>";
        // echo Album::with('FirstSongs')->where('id',1)->get();
    // print_r($song->comments); 
    echo "</pre>";
    foreach ($song->comments as $comment) {
        echo $comment->body . "<br>";
    }

    die;
    ?>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1>All Students</h1>

                <a class="btn btn-success btn-sm mb-3" href="{{ route('addnewstudent') }}">Add New</a>

                <table class="table table-bordered table-striped table-hover">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">View</th>
                        <th scope="col">Delete</th>
                        <th scope="col">Update</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $student )
                            <tr>
                                <td>{{ $student->id }}</td>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->age }}</td>
                                <td>{{ $student->email }}</td>
                                <td>{{ $student->address }}</td>
                                <td><a class="btn btn-primary btn-sm" href="{{ route('view.student', $student->id) }}">View</a></td>
                                <td><a class="btn btn-danger btn-sm" href="{{ route('delete.student', $student->id) }}">Delete</a></td>
                                <td><a class="btn btn-warning btn-sm" href="{{ route('update.page', $student->id) }}">Update</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
                  <div class="mt-5">
                      {{-- {{ $data->links('pagination::bootstrap-5') }} --}}
                      {{ $data->links() }}
                  </div>
            </div>
        </div>
    </div>
</body>
</html>