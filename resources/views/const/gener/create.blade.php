@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="d-flex fw-bold justify-content-center pb-3">إضافة جنس جديد</h4>
    <form action="/const/gener" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">أدخل الجنس</label>
            <input type="text" class="form-control @error('gener') is-invalid @enderror" id="gener" name="gener" value="{{ old('gener') }}">
            @error('gener')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">أدخل الجنس باللغة الانكليزية</label>
            <input type="text" class="form-control @error('gener_en') is-invalid @enderror" id="gener_en" name="gener_en" value="{{ old('gener_en') }}">
            @error('gener_en')
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