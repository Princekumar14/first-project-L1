@extends('layouts.masterlayout')
@section('title')
    Home Page
@endsection

@section('content')
    <h1>Welcome Prince Home Page</h1>

    <a href="{{ route('mypost') }}">Post Page</a>
    <a href="/about">About Page</a>

    @php
        $names = ['first' => 'prince', 'sec' => 'dk', 'thrd' => 'gunnu'];
    @endphp

    <ul>
        @foreach ($names as $key => $name)
            <li>{{ $loop->index }} - {{ $key }} => {{ $name }}</li>
        @endforeach
    </ul>
@endsection
