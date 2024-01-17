@extends('layouts.app')

@section('content')
<div class="container">
  <h5 class="d-flex fw-bold justify-content-center pb-3">استعراض بيانات المكافئة المحدد</h5>
    <table class="table table-bordered">   
      <tr class="pt-3 ">
        <td class="fw-bold centered-content">الاسم الثلاثي</td>
        <td class="centered-content">{{$rewards -> profile -> first_name . ' ' . $rewards -> profile -> father_name . ' ' . $rewards -> profile -> last_name}}</td>
      </tr>
      <tr class="pt-3 ">
        <td class="fw-bold centered-content">المكافئة</td>
        <td class="centered-content">{{$rewards-> reward_name -> reward_name}}</td>
      </tr>
      <tr class="pt-3 ">
        <td class="fw-bold centered-content">تاريخ المكافئة</td>
        <td class="centered-content">{{$rewards-> reward_date}}</td>
      </tr>
      <tr class="pt-3 ">
        <td class="fw-bold centered-content">مصدر المكافئة</td>
        <td class="centered-content">{{$rewards-> reward_source}}</td>
      </tr>
      <tr class="pt-3 ">
        <td class="fw-bold centered-content">سبب المكافئة</td>
        <td class="centered-content">{{$rewards-> reward_reason}}</td>
      </tr>
    </table>
    <div class="form-floating">
      <a href="/reward"><button type="button" class="block">عودة لصفحة المكافئات</button></a>
  </div>
</div>
@endsection