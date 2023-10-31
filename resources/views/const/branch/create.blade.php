@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="d-flex fw-bold justify-content-center pb-3">إضافة فرع جديد</h4>
    <form action="/const/branch" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">أدخل اسم الفرع</label>
            <input type="text" class="form-control @error('branch') is-invalid @enderror" id="branch" name="branch" value="{{ old('branch') }}">
            @error('branch')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">أدخل اسم الفرع باللغة الانكليزية</label>
            <input type="text" class="form-control @error('branch_en') is-invalid @enderror" id="branch_en" name="branch_en" value="{{ old('branch_en') }}">
            @error('branch_en')
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