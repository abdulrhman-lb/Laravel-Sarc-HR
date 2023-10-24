@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="d-flex fw-bold justify-content-center pb-3">تعديل بيانات القسم المحدد</h4>
    <form action="/const/department/{{$departments -> id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label"> اسم القسم</label>
            <input type="text" class="form-control" id="department" name="department" value="{{$departments -> department}}">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label"> اسم القسم باللغة الانكليزية</label>
            <input type="text" class="form-control" id="department_en" name="department_en" value="{{$departments -> department_en}}">
        </div>
        <div class="form-floating">
            <button type="submit" class="block">حفظ التعديلات</button>
        </div>
    </form>
</div>
@endsection