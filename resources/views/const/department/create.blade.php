@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="d-flex fw-bold justify-content-center pb-3">إضافة قسم جديد</h4>
    <form action="/const/department" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">أدخل اسم القسم</label>
            <input type="text" class="form-control @error('department') is-invalid @enderror" id="department" name="department" value="{{ old('department') }}">
            @error('department')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">أدخل اسم القسم باللغة الانكليزية</label>
            <input type="text" class="form-control @error('department_en') is-invalid @enderror" id="department_en" name="department_en" value="{{ old('department_en') }}">
            @error('department_en')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">أدخل اختصار اسم القسم</label>
            <input type="text" class="form-control @error('department_short') is-invalid @enderror" id="department_short" name="department_short" value="{{ old('department_short') }}">
            @error('department_short')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-floating">
            <button type="submit" class="block">حفظ</button>
        </div>
    </form>
</div>
@endsection