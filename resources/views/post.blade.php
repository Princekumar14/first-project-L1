@extends('layouts.masterlayout')

@section('content')
    <h1>Post page</h1>
    Today Date : @datetime <br>
    <a href="{{ route('home') }}">Home Page</a>

    <a href="/about">About Page</a>
@endsection


@section('sidebar')
    @parent
    <p>show1 Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore quod quis non.</p>

    <p>show2 Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore quod quis non.</p>

@section('sidebar1')
    <p>show3 Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore quod quis non.</p>
    @parent
@endsection
@endsection


@section('title')
Post Page
@endsection
