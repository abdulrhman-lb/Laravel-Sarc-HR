@extends('layouts.app')

@section('content')
@if (session()->has('message'))
    <div class="container alert alert-warning" role="alert">
        {{session()->get('message')}}
    </div> 
@endif
    <div class="container">
        <h5 class="d-flex fw-bold justify-content-center pb-3">جدول الجنس</h5>
        <table class="table table-bordered">
            <tr>
                <th class="centered-content">#</th>
                <th class="centered-content">الجنس</th>
                <th class="centered-content">الجنس باللغة الانكليزية</th>
                <th class="centered-content" colspan="3"><a href="/const/gender/create"><button type="button" class="btn btn-success my-1">إضافة جنس جديد</button></a></th>
            </tr>
            @php
                $count = 0;
            @endphp
            @foreach ($genders as $gender)        
                <tr class="pt-3 ">
                    @php
                        $count++;
                    @endphp
                    <td class="fw-bold centered-content">{{$count}}</td>
                    <td class="centered-content">{{$gender -> gender}}</td>
                    <td class="centered-content">{{$gender -> gender_en}}</td>
                    <td class="centered-content">
                        <form action="{{action('GenderController@destroy', $gender -> id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <a href="/const/gender/{{$gender -> id}}"><button type="button" class="btn btn-primary my-1"><i class="fa fa-eye"></i></button></a>
                            <a href="/const/gender/{{$gender -> id}}/edit"><button type="button" class="btn btn-success my-1"><i class="fa fa-edit"></i></button></a>
                            <button type="submit" class="btn btn-danger my-1" onclick ="return confirm('هل تريد بالتأكيد حذف هذا الجنس ؟')"><i class="fa fa-trash"></i></button>  
                        </form>  
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection