<h1>Student Detail</h1>

@foreach ($data as $id => $student )
    <h3>ID: {{ $student->id }}</h3>
    <h3>Name: {{ $student->name }}</h3>
    <h3>Age: {{ $student->age }}</h3>
    <h3>City: {{ $student->city }}</h3>
    <h3>Address: {{ $student->address }}</h3>
    
@endforeach