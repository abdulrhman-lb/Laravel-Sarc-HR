@extends('layouts.app')

@section('content')
<div class="container">
    <h5 class="d-flex fw-bold justify-content-center pb-3">استعراض بيانات الجنس المحدد</h5>
    <form action="/const/gener/{{$geners -> id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label"> الجنس</label>
            <input type="text" class="form-control @error('gener') is-invalid @enderror" id="gener" name="gener" value="{{$geners -> gener}}">
            @error('gener')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label"> الجنس باللغة الانكليزية</label>
            <input type="text" class="form-control @error('gener_en') is-invalid @enderror" id="gener_en" name="gener_en" value="{{$geners -> gener_en}}">
            @error('gener_en')
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