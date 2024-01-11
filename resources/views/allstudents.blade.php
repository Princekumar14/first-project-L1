<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <title>All Students</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <h1>All Students</h1>

                <a class="btn btn-success btn-sm mb-3" href="{{ route('addnewstudent') }}">Add New</a>
                <div class="form-group">
                    <input type="text" name="student_name" id="student_name" class="form-control input-lg" placeholder="Enter Student Name" />
                    <div id="studentList">
                    </div>
                </div>
                {{ csrf_field() }}

                <table class="table table-bordered table-striped table-hover mt-5">
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
    <script>
        $(document).ready(function(){
         $('#student_name').on('keyup',function(){ 
                var query = $(this).val();
                if(query != '' && query.length > 2)
                {
                 var _token = $('input[name="_token"]').val();
                 $.ajax({
                  url:"{{ route('student.fetch') }}",
                  method:"POST",
                  data:{query:query, _token:_token},
                  success:function(data){
                   $('#studentList').fadeIn();  
                            $('#studentList').html(data);
                  }
                 });
                }else{
                    $('#studentList').html('');

                }
            });
        
            $(document).on('click', 'li', function(){  
                $('#student_name').val($(this).text());  
                $('#studentList').fadeOut();  
            });  
        
        });
    </script>
</body>
</html>
