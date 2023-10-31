@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="d-flex fw-bold justify-content-center pb-3">تعديل بيانات الحالة الاجتماعية المحددة</h4>
    <form action="/const/maritalstatus/{{$marital_statuses -> id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label"> الحالة الاجتماعية</label>
            <input type="text" class="form-control @error('marital_status') is-invalid @enderror" id="marital_status" name="marital_status" value="{{$marital_statuses -> marital_status}}">
            @error('marital_status')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label"> الحالة الاجتماعية باللغة الانكليزية</label>
            <input type="text" class="form-control @error('marital_status_en') is-invalid @enderror" id="marital_status_en" name="marital_status_en" value="{{$marital_statuses -> marital_status_en}}">
            @error('marital_status_en')
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