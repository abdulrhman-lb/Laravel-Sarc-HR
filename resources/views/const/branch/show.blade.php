@extends('layouts.app')

@section('content')
<div class="container">
  <h4 class="d-flex fw-bold justify-content-center pb-3">استعراض بيانات الفرع المحدد</h4>
    <table class="table table-bordered">   
      <tr class="pt-3 ">
        <td class="fw-bold centered-content">اسم الفرع</td>
        <td class="centered-content">{{$branches-> branch}}</td>
      </tr>
      <tr class="pt-3 ">
        <td class="fw-bold centered-content">اسم الفرع باللغة الانكليزية</td>
        <td class="centered-content">{{$branches->branch_en}}</td>
      </tr>
    </table>
    <div class="form-floating">
      <a href="/const/branch"><button type="button" class="block">عودة لصفحة جدول الفروع</button></a>
  </div>
</div>
@endsection