@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="d-flex fw-bold justify-content-center pb-3">إضافة فرع جديد</h4>
    <form action="/const/branch" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">أدخل اسم الفرع</label>
            <input type="text" class="form-control" id="branch" name="branch">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">أدخل اسم الفرع باللغة الانكليزية</label>
            <input type="text" class="form-control" id="branch_en" name="branch_en" >
        </div>
        <div class="form-floating">
            <button type="submit" class="block">حفظ</button>
        </div>
    </form>
</div>
@endsection