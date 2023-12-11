@extends('layouts.app')

@section('content')
@if (session()->has('message'))
    <div class="container alert alert-warning" role="alert">
        {{session()->get('message')}}
    </div> 
@endif
    <div class="container">
        <h5 class="d-flex fw-bold justify-content-center pb-3"> السيرة الهلالية للموظفين</h5>
        <table class="table table-bordered">
            <tr>
                <th class="centered-content">#</th>
                <th class="centered-content">الاسم الثلاثي</th>
                <th class="centered-content">القسم</th>
                <th class="centered-content">المنصب</th>
                <th class="centered-content">المنصب باللغة الانكليزية</th>
                <th class="centered-content">الصفة الهلالية</th>
                <th class="centered-content">بدء العمل بتاريخ</th>
                <th class="centered-content">أنهى العمل بتاريخ</th>
                <th class="centered-content" colspan="3"><a href="position/create"><button type="button" class="btn btn-success my-1">إضافة تنقل لموظف</button></a></th>
            </tr>
            @php
                $count = 0;
            @endphp
            @foreach ($positions as $position)        
                <tr class="pt-3 ">
                    @php
                        $count++;
                        $i = 0;
                        if ($position -> end_date == "1900-01-01") {
                            $end_date='حتى الآن';
                            $i = 1;
                        } else {
                            $end_date=$position -> end_date;}
                    @endphp
                    <td class="fw-bold centered-content">{{$count}}</td>
                    <td class="centered-content {{$i == 1 ? 'fw-bold' : ''}}">{{$position -> profile -> first_name . ' ' . $position -> profile -> father_name . ' ' . $position -> profile -> last_name}}</td>
                    <td class="centered-content {{$i == 1 ? 'fw-bold' : ''}}">{{$position -> department -> department}}</td>
                    <td class="centered-content {{$i == 1 ? 'fw-bold' : ''}}">{{$position -> position}}</td>
                    <td class="centered-content {{$i == 1 ? 'fw-bold' : ''}}">{{$position -> position_en}}</td>
                    <td class="centered-content {{$i == 1 ? 'fw-bold' : ''}}">{{$position -> jop_title -> jop_title}}</td>
                    <td class="centered-content {{$i == 1 ? 'fw-bold' : ''}}">{{$position -> start_date}}</td>
                    <td class="centered-content {{$i == 1 ? 'fw-bold' : ''}}">{{$end_date}}</td>
                    <td class="centered-content">
                        {{-- {{action('PenaltyController@destroy', $penalty -> id)}} --}}
                        <form action="" method="POST">
                            @csrf
                            @method("DELETE")
                            <a href="/position/{{$position -> id}}"><button type="button" class="btn btn-primary my-1"><i class="fa fa-eye"></i></button></a>
                            {{-- <a href="/position/{{$position -> id}}/edit"><button type="button" class="btn btn-success my-1"><i class="fa fa-edit"></i></button></a> --}}
                            {{-- <button type="submit" class="btn btn-danger my-1" onclick ="return confirm('هل تريد بالتأكيد حذف هذا العقوبة ؟')"><i class="fa fa-trash"></i></button>   --}}
                        </form>  
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection