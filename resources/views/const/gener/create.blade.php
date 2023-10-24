@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="d-flex fw-bold justify-content-center pb-3">إضافة جنس جديد</h4>
    <form action="/const/gener" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">أدخل الجنس</label>
            <input type="text" class="form-control" id="gener" name="gener">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">أدخل الجنس باللغة الانكليزية</label>
            <input type="text" class="form-control" id="gener_en" name="gener_en" >
        </div>
        <div class="form-floating">
            <button type="submit" class="block">حفظ</button>
        </div>
    </form>
</div>
@endsection