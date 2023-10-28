@extends('layouts.app')
@section('content')
@if (session()->has('message'))
    <div class="container alert alert-success" role="alert">
        {{session()->get('message')}}
    </div> 
@endif
{{-- hero --}}
    <div class="hero-bg-image " style="background: url('images/sarc.jpg') no-repeat center center/cover;" >
        {{-- <h1 class="text-block">Welcome To SARC</h1> --}}
    </div>


@endsection