@extends('layouts.app')

@section('content')
<div class="container">
    <h5 class="d-flex fw-bold justify-content-center pb-3">إضافة دورة جديدة</h5>
    <form action="/const/training" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">أدخل اسم الدورة</label>
            <input type="text" class="form-control @error('training') is-invalid @enderror" id="training" name="training" value="{{ old('training') }}">
            @error('training')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">أدخل اسم الدورة باللغة الانكليزية</label>
            <input type="text" class="form-control @error('training_en') is-invalid @enderror" id="training_en" name="training_en" value="{{ old('training_en') }}">
            @error('training_en')
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


