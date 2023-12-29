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

                  <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                      <input type="text" class="form-control" name="sname">
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Age</label>
                      <input type="text" class="form-control" name="sage">
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Email</label>
                      <input type="email" class="form-control" name="semail">
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Address</label>
                      <input type="text" class="form-control" name="saddress">
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">City</label>
                      <input type="text" class="form-control" name="scity">
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Phone</label>
                      <input type="tel" pattern="[0-9]{10}" required class="form-control" name="sphone">
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Password</label>
                      <input type="text" class="form-control" name="spassword">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
        </div>
    </div>
</body>
</html>