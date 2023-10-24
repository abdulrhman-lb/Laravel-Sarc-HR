@extends('layouts.app')

@section('content')
@if (session()->has('message'))
    <div class="container alert alert-warning" role="alert">
        {{session()->get('message')}}
    </div> 
@endif
    <div class="container">
        <h4 class="d-flex fw-bold justify-content-center pb-3">جدول الحالات الاجتماعية</h4>
        <table class="table table-bordered">
            <tr>
                <th class="centered-content">#</th>
                <th class="centered-content">الحالة الاجتماعية</th>
                <th class="centered-content">الحالة الاجتماعية باللغة الانكليزية</th>
                <th class="centered-content" colspan="3"><a href="/const/maritalstatus/create"><button type="button" class="btn btn-success my-1">إضافة حالة اجتماعية جديدة</button></a></th>
            </tr>
            @php
                $count = 0;
            @endphp
            @foreach ($marital_statuses as $marital_status)        
                <tr class="pt-3 ">
                    @php
                        $count++;
                    @endphp
                    <td class="fw-bold centered-content">{{$count}}</td>
                    <td class="centered-content">{{$marital_status -> marital_status}}</td>
                    <td class="centered-content">{{$marital_status -> marital_status_en}}</td>
                    <td class="centered-content">
                        <form action="{{action('MaritalStatusController@destroy', $marital_status -> id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <a href="/const/maritalstatus/{{$marital_status -> id}}"><button type="button" class="btn btn-primary my-1"><i class="fa fa-eye"></i></button></a>
                            <a href="/const/maritalstatus/{{$marital_status -> id}}/edit"><button type="button" class="btn btn-success my-1"><i class="fa fa-edit"></i></button></a>
                            <button type="submit" class="btn btn-danger my-1" onclick ="return confirm('هل تريد بالتأكيد حذف هذا الحالة الاجتماعية؟')"><i class="fa fa-trash"></i></button>  
                        </form>  
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection