@extends('layouts.app')

@section('content')
@if (session()->has('message'))
    <div class="container alert alert-warning" role="alert">
        {{session()->get('message')}}
    </div> 
@endif
    <div class="container">
        <h4 class="d-flex fw-bold justify-content-center pb-3">جدول الشهادات العلمية</h4>
        <table class="table table-bordered">
            <tr>
                <th class="centered-content">#</th>
                <th class="centered-content">اسم الشهادة العلمية</th>
                <th class="centered-content">اسم الشهادة العلمية باللغة الانكليزية</th>
                <th class="centered-content" colspan="3"><a href="/const/certificate/create"><button type="button" class="btn btn-success my-1">إضافة شهادة علمية جديدة</button></a></th>
            </tr>
            @php
                $count = 0;
            @endphp
            @foreach ($certificates as $certificate)        
                <tr class="pt-3 ">
                    @php
                        $count++;
                    @endphp
                    <td class="fw-bold centered-content">{{$count}}</td>
                    <td class="centered-content">{{$certificate -> certificate}}</td>
                    <td class="centered-content">{{$certificate -> certificate_en}}</td>
                    <td class="centered-content">
                        <form action="{{action('CertificateController@destroy', $certificate -> id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <a href="/const/certificate/{{$certificate -> id}}"><button type="button" class="btn btn-primary my-1"><i class="fa fa-eye"></i></button></a>
                            <a href="/const/certificate/{{$certificate -> id}}/edit"><button type="button" class="btn btn-success my-1"><i class="fa fa-edit"></i></button></a>
                            <button type="submit" class="btn btn-danger my-1" onclick ="return confirm('هل تريد بالتأكيد حذف هذه الشهادة العلمية المحددة؟')"><i class="fa fa-trash"></i></button>  
                        </form>  
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection