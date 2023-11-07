@extends('layouts.app')

@section('content')
<div class="container">
  <h5 class="d-flex fw-bold justify-content-center pb-3">استعراض بيانات الحالة الاجتماعية المحددة</h5>
  <table class="table table-bordered">   
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">الحالة الاجتماعية</td>
      <td class="centered-content">{{$marital_statuses-> marital_status}}</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">الحالة الاجتماعية باللغة الانكليزية</td>
      <td class="centered-content">{{$marital_statuses->marital_status_en}}</td>
    </tr>
  </table>
  <div class="form-floating">
    <a href="/const/maritalstatus"><button type="button" class="block">عودة لصفحة جدول الحالات الاجتماعية</button></a>
  </div>
</div>
@endsection