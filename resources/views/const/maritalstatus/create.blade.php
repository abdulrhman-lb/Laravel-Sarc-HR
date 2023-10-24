@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="d-flex fw-bold justify-content-center pb-3">إضافة حالة اجتماعية جديدة</h4>
    <form action="/const/maritalstatus" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">أدخل الحالة الاجتماعية</label>
            <input type="text" class="form-control" id="marital_status" name="marital_status">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">أدخل الحالة الاجتماعية باللغة الانكليزية</label>
            <input type="text" class="form-control" id="marital_status_en" name="marital_status_en" >
        </div>
        <div class="form-floating">
            <button type="submit" class="block">حفظ</button>
        </div>
    </form>
</div>
@endsection