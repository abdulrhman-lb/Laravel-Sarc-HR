@extends('layouts.app')

@section('content')
@if (session()->has('message'))
    <div class="container alert alert-warning" role="alert">
        {{session()->get('message')}}
    </div> 
@endif
    <div class="container">
        <h4 class="d-flex fw-bold justify-content-center pb-3">جدول الصفات الهلالية</h4>
        <table class="table table-bordered">
            <tr>
                <th class="centered-content">#</th>
                <th class="centered-content">الصفة الهلالية</th>
                <th class="centered-content">الصفة الهلالية باللغة الانكليزية</th>
                <th class="centered-content" colspan="3"><a href="/const/joptitle/create"><button type="button" class="btn btn-success my-1">إضافة صفة هلالية جديدة</button></a></th>
            </tr>
            @php
                $count = 0;
            @endphp
            @foreach ($jop_titles as $jop_title)        
                <tr class="pt-3 ">
                    @php
                        $count++;
                    @endphp
                    <td class="fw-bold centered-content">{{$count}}</td>
                    <td class="centered-content">{{$jop_title -> jop_title}}</td>
                    <td class="centered-content">{{$jop_title -> jop_title_en}}</td>
                    <td class="centered-content">
                        <form action="{{action('JopTitleController@destroy', $joptitle -> id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <a href="/const/joptitle/{{$jop_title -> id}}"><button type="button" class="btn btn-primary my-1"><i class="fa fa-eye"></i></button></a>
                            <a href="/const/joptitle/{{$jop_title -> id}}/edit"><button type="button" class="btn btn-success my-1"><i class="fa fa-edit"></i></button></a>
                            <button type="submit" class="btn btn-danger my-1" onclick ="return confirm('هل تريد بالتأكيد حذف هذا الصفة الهلالية؟')"><i class="fa fa-trash"></i></button>  
                        </form>  
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection