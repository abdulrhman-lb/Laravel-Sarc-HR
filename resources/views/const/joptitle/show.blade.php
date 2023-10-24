@extends('layouts.app')

@section('content')
<div class="container">
  <h4 class="d-flex fw-bold justify-content-center pb-3">استعراض بيانات الصفة الهلالية المحددة</h4>
    <table class="table table-bordered">   
      <tr class="pt-3 ">
        <td class="fw-bold centered-content">الصفة الهلالية</td>
        <td class="centered-content">{{$jop_title-> jop_title}}</td>
      </tr>
      <tr class="pt-3 ">
        <td class="fw-bold centered-content">الصفة الهلالية باللغة الانكليزية</td>
        <td class="centered-content">{{$jop_titles->jop_title_en}}</td>
      </tr>
    </table>
    <div class="form-floating">
      <a href="/const/joptitle"><button type="button" class="block">عودة لصفحة جدول الصفات الهلالية</button></a>
  </div>
</div>
@endsection