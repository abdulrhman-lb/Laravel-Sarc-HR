@extends('layouts.app')

@section('content')
<div class="container">
    <h5 class="d-flex fw-bold justify-content-center pb-3">تعديل بيانات القسم المحدد</h5>
    <form action="/const/department/{{$departments -> id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label"> اسم القسم</label>
            <input type="text" class="form-control @error('department') is-invalid @enderror" id="department" name="department" value="{{$departments -> department}}">
            @error('department')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label"> اسم القسم باللغة الانكليزية</label>
            <input type="text" class="form-control @error('department_en') is-invalid @enderror" id="department_en" name="department_en" value="{{$departments -> department_en}}">
            @error('department_en')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">اختصار اسم القسم</label>
            <input type="text" class="form-control @error('department_short') is-invalid @enderror" id="department_short" name="department_short" value="{{$departments -> department_short}}">
            @error('department_short')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-floating">
            <button type="submit" class="block">حفظ التعديلات</button>
        </div>
    </form>
</div>
@endsection