@extends('layouts.app')

@section('content')
<div class="container">
  <h5 class="d-flex fw-bold justify-content-center pb-3">استعراض بيانات العقوبة المحدد</h5>
    <table class="table table-bordered">   
      <tr class="pt-3 ">
        <td class="fw-bold centered-content">الاسم الثلاثي</td>
        <td class="centered-content">{{$penalties -> profile -> first_name . ' ' . $penalties -> profile -> father_name . ' ' . $penalties -> profile -> last_name}}</td>
      </tr>
      <tr class="pt-3 ">
        <td class="fw-bold centered-content">العقوبة</td>
        <td class="centered-content">{{$penalties-> penalty_name -> penalty_name}}</td>
      </tr>
      <tr class="pt-3 ">
        <td class="fw-bold centered-content">تاريخ العقوبة</td>
        <td class="centered-content">{{$penalties-> penalty_date}}</td>
      </tr>
      <tr class="pt-3 ">
        <td class="fw-bold centered-content">مصدر العقوبة</td>
        <td class="centered-content">{{$penalties-> penalty_source}}</td>
      </tr>
      <tr class="pt-3 ">
        <td class="fw-bold centered-content">سبب العقوبة</td>
        <td class="centered-content">{{$penalties-> penalty_reason}}</td>
      </tr>
    </table>
    <div class="form-floating">
      <a href="/penalty"><button type="button" class="block">عودة لصفحة العقوبات</button></a>
  </div>
</div>
@endsection