@extends('layouts.app')

@section('content')
<div class="container">
  {{-- <h5 class="d-flex fw-bold justify-content-center pb-3">استعراض بيانات المدرب المحدد</h5> --}}
  <table class="table table-bordered">  
    <tr>
      <th class="centered-content" colspan="7">استعراض بيانات المدرب المحدد</th>
    </tr> 
    <tr>
      <th class="centered-content">اسم المدرب</th>
      <th class="centered-content">اسم المدرب باللغة الانكليزية</th>
    </tr>
    <tr class="pt-3 ">
      <td class="centered-content">{{$lists['trainer']-> trainer}}</td>
      <td class="centered-content">{{$lists['trainer']->trainer_en}}</td>
    </tr>
  </table>


  <table class="table table-bordered mt-4">
    <tr>
        <th class="centered-content" colspan="7">الدورات التدريبيبة التي شارك بها</th>
    </tr>
    <tr>
        <th class="centered-content">#</th>
        <th class="centered-content">اسم الدورة</th>
        <th class="centered-content">مكان التدريب</th>
        <th class="centered-content">تاريخ بدء التدريب</th>
        <th class="centered-content">تاريخ نهاية التدريب</th>
        <th class="centered-content">عدد أيام التدريب</th>
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
            <td class="centered-content">{{$trainer -> training_course -> training -> training . ' - ' . $trainer -> training_course -> training -> training_en}}</td>
            <td class="centered-content">{{$trainer -> training_course -> training_place}}</td>
            <td class="centered-content">{{$trainer -> training_course -> training_date_start }}</td>
            <td class="centered-content">{{$trainer -> training_course -> training_date_end }}</td>
            <td class="centered-content">{{$trainer -> training_course -> training_days_number }}</td>
        </tr>
    @endforeach
  </table>
  <div class="form-floating">
    <a href="/const/trainer"><button type="button" class="block">عودة لصفحة جدول المدربين</button></a>
  </div>
</div>
@endsection