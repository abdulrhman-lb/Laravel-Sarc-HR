@extends('layouts.app')

@section('content')
<div class="container">
    <h5 class="d-flex fw-bold justify-content-center pb-3">استعراض بيانات الجنس المحدد</h5>
    <form action="/const/gender/{{$genders -> id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label"> الجنس</label>
            <input type="text" class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender" value="{{$genders -> gender}}">
            @error('gender')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label"> الجنس باللغة الانكليزية</label>
            <input type="text" class="form-control @error('gender_en') is-invalid @enderror" id="gender_en" name="gender_en" value="{{$genders -> gender_en}}">
            @error('gender_en')
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