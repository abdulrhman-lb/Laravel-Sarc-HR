@extends('layouts.app')

@section('content')
@if (session()->has('message'))
    <div class="container alert alert-warning" role="alert">
        {{session()->get('message')}}
    </div> 
@endif
    <div class="container">
        <h5 class="d-flex fw-bold justify-content-center pb-3"> المكافئات</h5>
        <table class="table table-bordered">
            <tr>
                <th class="centered-content">#</th>
                <th class="centered-content">الاسم الثلاثي</th>
                <th class="centered-content">المكافئة</th>
                <th class="centered-content">تاريخ المكافئة</th>
                <th class="centered-content">مصدر المكافئة</th>
                <th class="centered-content">سبب المكافئة</th>
                <th class="centered-content" colspan="3"><a href="reward/create"><button type="button" class="btn btn-success my-1">إضافة مكافئة لموظف</button></a></th>
            </tr>
            @php
                $count = 0;
            @endphp
            @foreach ($rewards as $reward)        
                <tr class="pt-3 ">
                    @php
                        $count++;
                    @endphp
                    <td class="fw-bold centered-content">{{$count}}</td>
                    <td class="centered-content">{{$reward -> profile -> first_name . ' ' . $reward -> profile -> father_name . ' ' . $reward -> profile -> last_name}}</td>
                    <td class="centered-content">{{$reward -> reward_name -> reward_name}}</td>
                    <td class="centered-content">{{$reward -> reward_date}}</td>
                    <td class="centered-content">{{$reward -> reward_source}}</td>
                    <td class="centered-content">{{$reward -> reward_reason}}</td>
                    <td class="centered-content">
                        <form action="{{action('PenaltyController@destroy', $reward -> id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <a href="/reward/{{$reward -> id}}"><button type="button" class="btn btn-primary my-1"><i class="fa fa-eye"></i></button></a>
                            <a href="/reward/{{$reward -> id}}/edit"><button type="button" class="btn btn-success my-1"><i class="fa fa-edit"></i></button></a>
                            <button type="submit" class="btn btn-danger my-1" onclick ="return confirm('هل تريد بالتأكيد حذف هذا المكافئة ؟')"><i class="fa fa-trash"></i></button>  
                        </form>  
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection