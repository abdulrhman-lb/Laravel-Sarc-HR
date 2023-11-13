@extends('layouts.app')

@section('content')
<div class="container">
  <h5 class="d-flex fw-bold justify-content-center pb-3">استعراض بيانات المدرب المحدد</h5>
  <table class="table table-bordered">   
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">اسم المدرب</td>
      <td class="centered-content">{{$trainers-> trainer}}</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">اسم المدرب باللغة الانكليزية</td>
      <td class="centered-content">{{$trainers->trainer_en}}</td>
    </tr>
  </table>
  <div class="form-floating">
    <a href="/const/trainer"><button type="button" class="block">عودة لصفحة جدول المدربين</button></a>
  </div>
</div>
@endsection