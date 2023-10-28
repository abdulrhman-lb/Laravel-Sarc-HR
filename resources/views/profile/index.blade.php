@extends('layouts.app')

@section('content')

<div class="container">
    <h4 class="d-flex fw-bold justify-content-center pb-3">قائمة الموظفين</h4>
</div>
@foreach ($profiles as $profile)  
@php
    $image = '';
    if (($profile -> image) == '' ) {
        $image = 'non_m.png';
    } else {
        $image = 'profiles/' . $profile -> image; 
    }
@endphp      
<div class="container containerlist">
    <img src="/images/{{$image}}" alt="Avatar" class="img-pro-show">
    <div>
        <span class="fw-bold">{{$profile -> first_name . ' ' . $profile -> father_name . ' ' . $profile -> last_name}}</span>
        @if ($profile -> jop_title_id == 1)
            <div class="badge bg-info text-dark">{{$profile-> jop_title -> jop_title}}</div>
        @else
            <div class="badge bg-warning text-dark">{{$profile-> jop_title -> jop_title}}</div>
        @endif 
        <div class="badge bg-success">فعال</div>
        <div class="badge bg-danger">غير فعال</div>
        <br>
        <span class="fs-6 my-5"> {{$profile-> department->department . ' - ' . $profile->department->department_en . ' - ' . $profile->department->department_short}}</span>
        <br>
        <span class="fs-6"> {{$profile-> position . ' - ' . $profile->position_en}}</span>
    </div>
    <div>
        <form action="{{action('ProfilesController@destroy', $profile -> id)}}" method="POST">
            @csrf
            @method("DELETE")
            <a href="/profile/{{$profile -> id}}"><button type="button" class="btn btn-primary my-1"><i class="fa fa-eye"></i></button></a>
            <a href="/profile/{{$profile -> id}}/edit"><button type="button" class="btn btn-success my-1"><i class="fa fa-edit"></i></button></a>
            <button type="submit" class="btn btn-danger my-1" onclick ="return confirm('هل تريد بالتأكيد حذف هذا الملف الشخصي ؟')"><i class="fa fa-trash"></i></button>  
        </form> 
    </div>
    {{-- <div class="pe-2"> --}}
    {{-- </div> --}}
</div>
@endforeach

    {{-- <div class="container">
        
        <table class="table table-bordered">
            <tr>
                <th class="centered-content">#</th>
                <th class="centered-content">الصورة الشخصية</th>
                <th class="centered-content">الاسم الكامل</th>
                <th class="centered-content">اسم الأب</th>
                <th class="centered-content">متطوع/موظف</th>
                <th class="centered-content">القسم</th>
                <th class="centered-content">-</th>
            </tr>
            @php
                $count = 0;
            @endphp
            @foreach ($profiles as $profile)        
                <tr class="pt-3 ">
                    @php
                        $count++;
                    @endphp
                    <td class="fw-bold centered-content">{{$count}}</td>
                    @php
                        $image = '';
                        if (($profile -> image) == '' ) {
                            $image = 'non_m.png';
                        } else {
                            $image = 'profiles/' . $profile -> image; 
                        }
                    @endphp
                    <td class="centered-content"><img src="/images/{{$image}}" class="img-pro-list" alt="..."></td>
                    <td class="centered-content">{{$profile -> first_name . ' ' . $profile -> last_name}}</td>
                    <td class="centered-content">{{$profile -> father_name}}</td>
                    <td class="centered-content">{{$profile -> jop_title -> jop_title . ' - ' . $profile -> jop_title -> jop_title_en}}</td>
                    <td class="centered-content">{{$profile-> department->department}} <br> {{$profile->department->department_en . ' - ' . $profile->department->department_short}}</td>
                    <td class="centered-content">
                        <button type="button" class="btn btn-primary my-1"><i class="fa fa-eye"></i></button>
                        <button type="button" class="btn btn-success my-1""><i class="fa fa-edit"></i></button>
                        <button type="button" class="btn btn-danger my-1""><i class="fa fa-trash"></i></button>    
                    </a></td>
                </tr>
            @endforeach
        </table>
    </div> --}}
@endsection