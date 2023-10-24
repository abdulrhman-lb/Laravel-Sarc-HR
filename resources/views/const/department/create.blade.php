@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="d-flex fw-bold justify-content-center pb-3">إضافة قسم جديد</h4>
    <form action="/const/department" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">أدخل اسم القسم</label>
            <input type="text" class="form-control" id="department" name="department">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">أدخل اسم القسم باللغة الانكليزية</label>
            <input type="text" class="form-control" id="department_en" name="department_en" >
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">أدخل اختصار اسم القسم</label>
            <input type="text" class="form-control" id="department_short" name="department_short" >
        </div>
        <div class="form-floating">
            <button type="submit" class="block">حفظ</button>
        </div>
    </form>
</div>
@endsection