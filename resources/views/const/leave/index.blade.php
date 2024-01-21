@extends('layouts.app')

@section('content')
@if (session()->has('message'))
    <div class="container alert alert-warning" role="alert">
        {{session()->get('message')}}
    </div> 
@endif
    <div class="container">
        <h5 class="d-flex fw-bold justify-content-center pb-3">جدول أنواع الإجازات</h5>
        <table class="table table-bordered">
            <tr>
                <th class="centered-content">#</th>
                <th class="centered-content">نوع الإجازة</th>
                <th class="centered-content">دليل عدد الأيام الأعظمي</th>
                <th class="centered-content">عدد الأيام الأعظمي</th>
                <th class="centered-content">موافقة الموارد البشرية من قبل</th>
                <th class="centered-content">موافقة الإدارة من قبل</th>
                <th class="centered-content" colspan="3"><a href="/const/leave/create"><button type="button" class="btn btn-success my-1">إضافة نوع إجازة جديد</button></a></th>
            </tr>
            @php
                $count = 0;
            @endphp
            @foreach ($leave_names as $leave_name)        
                <tr class="pt-3 ">
                    @php
                        $count++;
                    @endphp
                    <td class="fw-bold centered-content">{{$count}}</td>
                    <td class="centered-content">{{$leave_name -> leave_name}}</td>
                    <td class="centered-content">{{$leave_name -> leave_source}}</td>
                    <td class="centered-content">{{$leave_name -> max_day}}</td>
                    <td class="centered-content">{{$leave_name -> hr_approve -> first_name.' '.$leave_name -> hr_approve -> last_name}}</td>
                    <td class="centered-content">{{$leave_name -> mang_approve -> first_name.' '.$leave_name -> mang_approve -> last_name}}</td>
                    <td class="centered-content">
                        <form action="{{action('LeaveNameController@destroy', $leave_name -> id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <a href="/const/leave/{{$leave_name -> id}}"><button type="button" class="btn btn-primary my-1"><i class="fa fa-eye"></i></button></a>
                            <a href="/const/leave/{{$leave_name -> id}}/edit"><button type="button" class="btn btn-success my-1"><i class="fa fa-edit"></i></button></a>
                            <button type="submit" class="btn btn-danger my-1" onclick ="return confirm('هل تريد بالتأكيد حذف هذا الشعبة ؟')"><i class="fa fa-trash"></i></button>  
                        </form>  
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection