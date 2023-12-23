<h1>Post page</h1>

<a href="{{ route('home') }}">Home Page</a>

<a href="/about">About Page</a>

@extends('layouts.masterlayout')

@section('sidebar')
@parent
<p>show1 Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore quod quis non.</p>

<p>show2 Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore quod quis non.</p>

@section('sidebar1')
<p>show3 Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempore quod quis non.</p>
@parent
@endsection

@endsection