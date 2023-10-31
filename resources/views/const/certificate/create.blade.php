@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="d-flex fw-bold justify-content-center pb-3">إضافة شهادة علمية جديدة</h4>
    <form action="/const/certificate" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">أدخل الشهادة العلمية</label>
            <input type="text" class="form-control @error('certificate') is-invalid @enderror" id="certificate" name="certificate" value="{{ old('certificate') }}">
            @error('certificate')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">أدخل الشهادة العلمية باللغة الانكليزية</label>
            <input type="text" class="form-control @error('certificate_en') is-invalid @enderror" id="certificate_en" name="certificate_en" value="{{ old('certificate_en') }}">
            @error('certificate_en')
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