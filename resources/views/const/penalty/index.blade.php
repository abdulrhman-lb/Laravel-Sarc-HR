@extends('layouts.app')

@section('content')
@if (session()->has('message'))
    <div class="container alert alert-warning" role="alert">
        {{session()->get('message')}}
    </div> 
@endif
    <div class="container">
        <h5 class="d-flex fw-bold justify-content-center pb-3">جدول العقوبات</h5>
        <table class="table table-bordered">
            <tr>
                <th class="centered-content">#</th>
                <th class="centered-content">اسم العقوبة حسب النظام </th>
                <th class="centered-content" colspan="3"><a href="/const/penalty/create"><button type="button" class="btn btn-success my-1">إضافة عقوبة جديد</button></a></th>
            </tr>
            @php
                $count = 0;
            @endphp
            @foreach ($penalties as $penalty)        
                <tr class="pt-3 ">
                    @php
                        $count++;
                    @endphp
                    <td class="fw-bold centered-content">{{$count}}</td>
                    <td class="centered-content">{{$penalty -> penalty_name}}</td>
                    <td class="centered-content">
                        <form action="{{action('PenaltyNameController@destroy', $penalty -> id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <a href="/const/penalty/{{$penalty -> id}}"><button type="button" class="btn btn-primary my-1"><i class="fa fa-eye"></i></button></a>
                            <a href="/const/penalty/{{$penalty -> id}}/edit"><button type="button" class="btn btn-success my-1"><i class="fa fa-edit"></i></button></a>
                            <button type="submit" class="btn btn-danger my-1" onclick ="return confirm('هل تريد بالتأكيد حذف هذا العقوبة ؟')"><i class="fa fa-trash"></i></button>  
                        </form>  
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection