@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="d-flex fw-bold justify-content-center pb-3">إضافة صفة هلالية جديدة</h4>
    <form action="/const/joptitle" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">أدخل الصفة الهلالية</label>
            <input type="text" class="form-control" id="jop_title" name="jop_title">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">أدخل الصفة الهلالية باللغة الالنكليزية</label>
            <input type="text" class="form-control" id="jop_title_en" name="jop_title_en" >
        </div>
        <div class="form-floating">
            <button type="submit" class="block">حفظ</button>
        </div>
    </form>
</div>
@endsection