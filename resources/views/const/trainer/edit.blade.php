@extends('layouts.app')

@section('content')
<div class="container">
    <h5 class="d-flex fw-bold justify-content-center pb-3">تعديل بيانات المدرب المحدد</h5>
    <form action="/const/trainer/{{$trainers -> id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label"> اسم المدرب</label>
            <input type="text" class="form-control @error('trainer_name') is-invalid @enderror" id="trainer" name="trainer" value="{{$trainers -> trainer}}">
            @error('trainer_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label"> اسم المدرب باللغة الانكليزية</label>
            <input type="text" class="form-control @error('trainer_en') is-invalid @enderror" id="trainer_en" name="trainer_en" value="{{$trainers -> trainer_en}}">
            @error('trainer_en')
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