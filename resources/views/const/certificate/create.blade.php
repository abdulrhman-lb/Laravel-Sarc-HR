@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="d-flex fw-bold justify-content-center pb-3">إضافة شهادة علمية جديدة</h4>
    <form action="/const/certificate" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">أدخل الشهادة العلمية</label>
            <input type="text" class="form-control" id="certificate" name="certificate">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">أدخل الشهادة العلمية باللغة الانكليزية</label>
            <input type="text" class="form-control" id="certificate_en" name="certificate_en" >
        </div>
        <div class="form-floating">
            <button type="submit" class="block">حفظ</button>
        </div>
    </form>
</div>
@endsection