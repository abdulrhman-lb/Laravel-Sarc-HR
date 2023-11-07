@extends('layouts.app')

@section('content')
<div class="container">
    <h5 class="d-flex fw-bold justify-content-center pb-3">إضافة حالة اجتماعية جديدة</h5>
    <form action="/const/maritalstatus" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">أدخل الحالة الاجتماعية</label>
            <input type="text" class="form-control @error('marital_status') is-invalid @enderror" id="marital_status" name="marital_status" value="{{ old('marital_status') }}">
            @error('marital_status')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">أدخل الحالة الاجتماعية باللغة الانكليزية</label>
            <input type="text" class="form-control @error('marital_status_en') is-invalid @enderror" id="marital_status_en" name="marital_status_en" value="{{ old('marital_status_en') }}">
            @error('marital_status_en')
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