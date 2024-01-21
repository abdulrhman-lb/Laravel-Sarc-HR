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
                <th class="centered-content">اسم الموظف</th>
                <th class="centered-content">نوع الإجازة</th>
                <th class="centered-content">من تاريخ</th>
                <th class="centered-content">إلى التاريخ</th>
                <th class="centered-content">موافقة المنسق</th>
                <th class="centered-content">موافقة الموارد البشرية</th>
                <th class="centered-content">موافقة الإدارة </th>
            </tr>
            @php
                $count = 0;
            @endphp
            @foreach ($lists['leaves'] as $leave)        
                <tr class="pt-3 ">
                    @php
                        $count++;
                    @endphp
                    <td class="fw-bold centered-content">{{$count}}</td>
                    <td class="centered-content">{{$leave -> profile -> first_name.' '.$leave -> profile -> last_name}}</td>
                    <td class="centered-content">{{$leave -> leave_names -> leave_name}}</td>
                    <td class="centered-content">{{$leave -> start_date}}</td>
                    <td class="centered-content">{{$leave -> start_date}}</td>
                    <td class="centered-content">
                        @if (is_null($leave -> coor_approved))                  
                            @if ($leave -> coor_approve == $lists['profiles'] -> id)
                                <a href="/leave-done?level=c&leave_id={{$leave -> id}}"><button type="submit" class="btn btn-danger">موافقة</button></a>
                            @else
                                <label class="fw-bold text-danger">لم تتم الموافقة بعد</label>
                            @endif
                        @else
                            <label class="fw-bold text-success">مع الموافقة</label>
                            <br>
                            <label class="fw-bold text-success">{{$leave -> coor -> first_name . ' ' . $leave -> coor -> last_name}}</label>
                        @endif
                    </td>

                    <td class="centered-content">
                        @if (is_null($leave -> hr_approved))                  
                            @if ($leave -> hr_approve == $lists['profiles'] -> id)
                                <a href="/leave-done?level=h&leave_id={{$leave -> id}}"><button type="submit" class="btn btn-danger">موافقة</button></a>
                            @else
                                <label class="fw-bold text-danger">لم تتم الموافقة بعد</label>
                            @endif
                        @else
                            <label class="fw-bold text-success">مع الموافقة</label>
                            <br>
                            <label class="fw-bold text-success">{{$leave -> hr -> first_name . ' ' . $leave -> hr -> last_name}}</label>
                        @endif
                    </td>

                    <td class="centered-content">
                        @if (is_null($leave -> mang_approved))                  
                            @if ($leave -> mang_approve == $lists['profiles'] -> id)
                                <a href="/leave-done?level=m&leave_id={{$leave -> id}}"><button type="submit" class="btn btn-danger">موافقة</button></a>
                            @else
                                <label class="fw-bold text-danger">لم تتم الموافقة بعد</label>
                            @endif
                        @else
                            <label class="fw-bold text-success">مع الموافقة</label>
                            <br>
                            <label class="fw-bold text-success">{{$leave -> mang -> first_name . ' ' . $leave -> mang -> last_name}}</label>
                        @endif
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection