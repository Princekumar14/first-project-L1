<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Add Student form</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1>Add New Student</h1>
                <form action="{{ route('addStudent') }}" method="post">
                  
                  @csrf

                  {{-- @if ($errors->any())
                    <ul class="alert alert-danger" role="alert">
                        @foreach ($errors->all() as $error)
                          <li style="list-style-position: inside;">{{$error}}</li>
                        @endforeach
                    </ul> 
                  @endif --}}

                  {{-- @php
                      $demo = 1;
                  @endphp
                  <x-form-inputs type="text" name="sname" label="Name" :demo='$demo'/> --}}
                  
                  <x-form-inputs type="text" name="sname" label="Name"/>
                  <x-form-inputs type="text" name="sage" label="Age"/>
                  <x-form-inputs type="email" name="semail" label="Email"/>
                  <x-form-inputs type="text" name="saddress" label="Address"/>
                  <x-form-inputs type="text" name="scity" label="City"/>
                  <x-form-inputs type="text" name="sphone" label="Phone"/>
                  <x-form-inputs type="text" name="spassword" label="Password"/>

                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
        </div>
    </div>
</body>
</html>