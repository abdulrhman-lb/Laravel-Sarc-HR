@extends('layouts.app')

@section('content')
<div class="container">
    <h5 class="d-flex fw-bold justify-content-center pb-3">تعديل بيانات الدورة المحددة</h5>
    <form action="/const/training/{{$trainings -> id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label"> اسم الشعبة</label>
            <input type="text" class="form-control @error('training') is-invalid @enderror" id="training" name="training" value="{{$trainings -> training}}">
            @error('training')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label"> اسم الدورة باللغة الانكليزية</label>
            <input type="text" class="form-control @error('training_en') is-invalid @enderror" id="training_en" name="training_en" value="{{$trainings -> training_en}}">
            @error('training_en')
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