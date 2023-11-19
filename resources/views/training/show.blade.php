@extends('layouts.app')

@section('content')
@if (session()->has('message'))
    <div class="container alert alert-warning" role="alert">
        {{session()->get('message')}}
    </div> 
@endif
    <div class="container">
        <table class="table table-bordered ">
            <tr class="containerlist">
                <th class="centered-content" colspan="5">بيانات الدورة التدريبية</th>
            </tr>
            <tr>
                <th class="centered-content">اسم الدورة</th>
                <th class="centered-content">مكان الدورة</th>
                <th class="centered-content">تاريخ بدء الدورة</th>
                <th class="centered-content">تاريخ نهاية الدورة</th>
                <th class="centered-content">عدد أيام التدريب</th>
            </tr>
            <tr>
                <td class="centered-content">{{$lists['training_course'] -> training -> training . ' - ' . $lists['training_course'] -> training -> training_en}}</td>    
                <td class="centered-content">{{$lists['training_course'] -> training_place}}</td>    
                <td class="centered-content">{{$lists['training_course'] -> training_date_start}}</td>    
                <td class="centered-content">{{$lists['training_course'] -> training_date_end}}</td>    
                <td class="centered-content">{{$lists['training_course'] -> training_days_number}}</td>    
            </tr>
        </table>
        <br>
        <div class="container" style="display: flow-root;">
            <div style="width: 47%; float: right;">
                <table class="table table-bordered">
                    <tr class="containerlist">
                        <th class="centered-content " colspan="6">المدربين</th>
                    </tr>
                    <tr>
                        <th class="centered-content">#</th>
                        <th class="centered-content">اسم المدرب</th>
                        <th class="centered-content">اسم المدرب باللغة الانكليزية</th>
                    </tr>
                    @php
                        $count = 0;
                    @endphp
                    @foreach ($lists['trainers'] as $trainer)        
                        <tr class="pt-3 ">
                            @php
                                $count++;
                            @endphp
                            <td class="fw-bold centered-content">{{$count}}</td>
                            <td class="centered-content">{{$trainer -> trainer -> trainer}}</td>
                            <td class="centered-content">{{$trainer -> trainer -> trainer_en}}</td>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
            <div style="width: 47%; float: left;">
                <table class="table table-bordered">
                    <tr class="containerlist">
                        <th class="centered-content " colspan="6">المتدربين</th>
                    </tr>
                    <tr>
                        <th class="centered-content">#</th>
                        <th class="centered-content">اسم المتدرب</th>
                        <th class="centered-content">اسم المتدرب باللغة الانكليزية</th>
                    </tr>
                    @php
                        $count = 0;
                    @endphp
                    @foreach ($lists['trainees'] as $trainee)        
                        <tr class="pt-3 ">
                            @php
                                $count++;
                            @endphp
                            <td class="fw-bold centered-content">{{$count}}</td>
                            <td class="centered-content">{{$trainee -> first_name . ' ' . $trainee -> father_name . ' ' . $trainee -> last_name}}</td>
                            <td class="centered-content">{{$trainee -> full_name_en}}</td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="form-floating">
            <a href="/training?tn=&tp=&td=&sort=&order=asc"><button type="button" class="block">عودة لصفحة جدول الدورات التدريبية</button></a>
        </div>
    </div>
@endsection