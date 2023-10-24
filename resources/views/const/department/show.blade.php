@extends('layouts.app')

@section('content')
<div class="container">
  <h4 class="d-flex fw-bold justify-content-center pb-3">استعراض بيانات القسم المحدد</h4>
    <table class="table table-bordered">   
      <tr class="pt-3 ">
        <td class="fw-bold centered-content">اسم القسم</td>
        <td class="centered-content">{{$departments-> department}}</td>
      </tr>
      <tr class="pt-3 ">
        <td class="fw-bold centered-content">اسم القسم باللغة الانكليزية</td>
        <td class="centered-content">{{$departments->department_en}}</td>
      </tr>
      <tr class="pt-3 ">
        <td class="fw-bold centered-content">اختصار اسم القسم</td>
        <td class="centered-content">{{$departments->department_short}}</td>
      </tr>
    </table>
    <div class="form-floating">
      <a href="/const/department"><button type="button" class="block">عودة لصفحة جدول الأقسام</button></a>
  </div>
</div>
@endsection