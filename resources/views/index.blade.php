@extends('layouts.app')
@section('content')
@if (session()->has('message'))
    <div class="container alert alert-success" role="alert">
        {{session()->get('message')}}
    </div> 
@endif
{{-- hero --}}
@if ((auth()-> check()) && (auth()->user()-> active == '0'))
    <div class="container containerlist">
        <h5 class="d-flex fw-bold justify-content-center py-3">عذرا هذا المستخدم غير فعال الرجاء مراجعة قسم الموارد البشرية...</h5>
    </div>
@endif
    <div class="hero-bg-image " style="background: url('images/sarc.jpg') no-repeat center center/cover;" >
        {{-- <h1 class="text-block">Welcome To SARC</h1> --}}
    </div>
@endsection