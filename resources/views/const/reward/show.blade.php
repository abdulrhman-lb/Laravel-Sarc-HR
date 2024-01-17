@extends('layouts.app')

@section('content')
<div class="container">
  <h5 class="d-flex fw-bold justify-content-center pb-3">استعراض بيانات المكافئة المحدد</h5>
    <table class="table table-bordered">   
      <tr class="pt-3 ">
        <td class="fw-bold centered-content">المكافئة</td>
        <td class="centered-content">{{$rewards-> reward_name}}</td>
      </tr>
    </table>
    <div class="form-floating">
      <a href="/const/reward"><button type="button" class="block">عودة لصفحة جدول المكافئات</button></a>
  </div>
</div>
@endsection