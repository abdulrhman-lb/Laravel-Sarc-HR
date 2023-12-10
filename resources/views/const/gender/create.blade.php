@extends('layouts.app')

@section('content')
<div class="container">
    <h5 class="d-flex fw-bold justify-content-center pb-3">إضافة جنس جديد</h5>
    <form action="/const/gender" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">أدخل الجنس</label>
            <input type="text" class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender" value="{{ old('gender') }}">
            @error('gender')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">أدخل الجنس باللغة الانكليزية</label>
            <input type="text" class="form-control @error('gender_en') is-invalid @enderror" id="gender_en" name="gender_en" value="{{ old('gender_en') }}">
            @error('gender_en')
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