@extends('layouts.app')

@section('content')
<div class="container">
  <h5 class="d-flex fw-bold justify-content-center pb-3">استعراض بيانات العقوبة المحدد</h5>
    <table class="table table-bordered">   
      <tr class="pt-3 ">
        <td class="fw-bold centered-content">العقوبة</td>
        <td class="centered-content">{{$penalties-> penalty_name}}</td>
      </tr>
    </table>
    <div class="form-floating">
      <a href="/const/penalty"><button type="button" class="block">عودة لصفحة جدول العقوبات</button></a>
  </div>
</div>
@endsection