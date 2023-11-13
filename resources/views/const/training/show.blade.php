@extends('layouts.app')

@section('content')
<div class="container">
  <h5 class="d-flex fw-bold justify-content-center pb-3">استعراض بيانات الدورة المحددة</h5>
  <table class="table table-bordered">   
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">اسم الدورة</td>
      <td class="centered-content">{{$trainings-> training}}</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">اسم الدورة باللغة الانكليزية</td>
      <td class="centered-content">{{$trainings->training_en}}</td>
    </tr>
  </table>
  <div class="form-floating">
    <a href="/const/training"><button type="button" class="block">عودة لصفحة جدول الدورات</button></a>
  </div>
</div>
@endsection