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

                  <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                      <input type="text" value="{{ old('sname') }}" class="form-control @error('sname') is-invalid @enderror" name="sname">
                      <span class="text-danger"> @error('sname') {{ $message }} @enderror </span>
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Age</label>
                      <input type="text" value="{{ old('sage') }}" class="form-control @error('sage') is-invalid @enderror" name="sage">
                      <span class="text-danger"> @error('sage') {{ $message }} @enderror </span>
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                      <input type="email" value="{{ old('semail') }}" class="form-control @error('semail') is-invalid @enderror" name="semail">
                      <span class="text-danger"> @error('semail') {{ $message }} @enderror </span>
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Address</label>
                      <input type="text" value="{{ old('saddress') }}" class="form-control @error('saddress') is-invalid @enderror" name="saddress">
                      <span class="text-danger"> @error('saddress') {{ $message }} @enderror </span>
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">City</label>
                      <input type="text" value="{{ old('scity') }}" class="form-control @error('scity') is-invalid @enderror" name="scity">
                      <span class="text-danger"> @error('scity') {{ $message }} @enderror </span>
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Phone</label>
                      {{-- <input type="tel" pattern="[0-9]{10}" required class="form-control" name="sphone"> --}}
                      <input type="text" value="{{ old('sphone') }}" class="form-control @error('sphone') is-invalid @enderror" name="sphone">
                      <span class="text-danger"> @error('sphone') {{ $message }} @enderror </span>
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Password</label>
                      <input type="text" value="{{ old('spassword') }}" class="form-control @error('spassword') is-invalid @enderror" name="spassword">
                      <span class="text-danger"> @error('spassword') {{ $message }} @enderror </span>
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
        </div>
    </div>
</body>
</html>