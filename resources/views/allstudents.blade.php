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
    <div class="container">
        <div class="row">
            <div class="col-6">
                <h1>All Students</h1>
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                      <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Age</th>
                        <th scope="col">Email</th>
                        <th scope="col">Address</th>
                        <th scope="col">View</th>
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
                                <td><a class="btn btn-primary btn-sm" href="{{ route('view.user', $student->id) }}">View</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</body>
</html>