@extends('layouts.app')

@section('content')
<div class="container">
  <h4 class="d-flex fw-bold justify-content-center pb-3">استعراض بيانات الشهادة العلمية المحددة</h4>
    <table class="table table-bordered">   
      <tr class="pt-3 ">
        <td class="fw-bold centered-content">اسم الشهادة العلمية</td>
        <td class="centered-content">{{$certificates-> certificate}}</td>
      </tr>
      <tr class="pt-3 ">
        <td class="fw-bold centered-content">اسم الشهادة باللغة الانكليزية العلمية</td>
        <td class="centered-content">{{$certificates->certificate_en}}</td>
      </tr>
    </table>
    <div class="form-floating">
      <a href="/const/certificate"><button type="button" class="block">عودة لصفحة جدول الشهادات العلمية</button></a>
  </div>
</div>
@endsection