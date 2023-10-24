@extends('layouts.app')

@section('content')
<div class="container">
  <h4 class="d-flex fw-bold justify-content-center pb-3">استعراض بيانات الجنس المحدد</h4>
    <table class="table table-bordered">   
      <tr class="pt-3 ">
        <td class="fw-bold centered-content">الجنس</td>
        <td class="centered-content">{{$geners-> gener}}</td>
      </tr>
      <tr class="pt-3 ">
        <td class="fw-bold centered-content">الجنس باللغة الانكليزية</td>
        <td class="centered-content">{{$geners->gener_en}}</td>
      </tr>
    </table>
    <div class="form-floating">
      <a href="/const/gener"><button type="button" class="block">عودة لصفحة جدول الجنس</button></a>
  </div>
</div>
@endsection