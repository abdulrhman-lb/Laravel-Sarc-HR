@extends('layouts.app')

@section('content')
<div class="container">
    <h5 class="d-flex fw-bold justify-content-center pb-3">تعديل بيانات العقوبة المحدد</h5>
    <form action="/const/penalty/{{$penalties -> id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label"> العقوبة</label>
            <input type="text" class="form-control @error('penalty_name') is-invalid @enderror" id="penalty_name" name="penalty_name" value="{{$penalties -> penalty_name}}">
            @error('penalty_name')
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