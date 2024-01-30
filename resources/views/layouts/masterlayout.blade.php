<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pirnce - @yield('title')</title>
</head>

<body>
    <h1>master layout</h1>

    @yield('content')
    
    @section('sidebar')
        <li style="color: red">li prince</li>

    @show

    <li style="color: green">li prince2</li>
    {{-- @show('This is a string.') --}}

    @section('sidebar1')
        <li style="color: yellow">li prince</li>
    @show

</body>

</html>
