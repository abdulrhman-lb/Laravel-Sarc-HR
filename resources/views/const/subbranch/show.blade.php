@extends('layouts.app')

@section('content')
<div class="container">
  <h4 class="d-flex fw-bold justify-content-center pb-3">استعراض بيانات الشعبة المحددة</h4>
    <table class="table table-bordered">   
      <tr class="pt-3 ">
        <td class="fw-bold centered-content">اسم الشعبة</td>
        <td class="centered-content">{{$sub_branches-> sub_branch}}</td>
      </tr>
      <tr class="pt-3 ">
        <td class="fw-bold centered-content">اسم الشعبة باللغة الانكليزية</td>
        <td class="centered-content">{{$sub_branches->sub_branch_en}}</td>
      </tr>
      <tr class="pt-3 ">
        <td class="fw-bold centered-content">اسم الفرع التاعبة له</td>
        <td class="centered-content">{{$sub_branches -> branch -> branch . ' - ' . $sub_branches -> branch -> branch_en}}</td>
      </tr>
    </table>
    <div class="form-floating">
      <a href="/const/subbranch"><button type="button" class="block">عودة لصفحة جدول الشعب</button></a>
  </div>
</div>
@endsection