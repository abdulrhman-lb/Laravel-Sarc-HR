@extends('layouts.app')

@section('content')
<div class="container">
    <h5 class="d-flex fw-bold justify-content-center pb-3">إضافة مدرب جديد</h5>
    <form action="/const/trainer" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">أدخل اسم المدرب</label>
            <input type="text" class="form-control @error('trainer') is-invalid @enderror" id="trainer" name="trainer" value="{{ old('trainer') }}">
            @error('trainer')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">أدخل اسم المدرب باللغة الانكليزية</label>
            <input type="text" class="form-control @error('trainer_en') is-invalid @enderror" id="trainer_en" name="trainer_en" value="{{ old('trainer_en') }}">
            @error('trainer_en')
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


