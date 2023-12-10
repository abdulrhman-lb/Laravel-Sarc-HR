@extends('layouts.app')

@section('content')
<div class="container">
    <h5 class="d-flex fw-bold justify-content-center pb-3">إضافة عقوبة جديدة</h5>
    <form action="/const/penalty" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">أدخل اسم العقوبة</label>
            <input type="text" class="form-control @error('penalty_name') is-invalid @enderror" id="penalty_name" name="penalty_name" value="{{ old('penalty_name') }}">
            @error('penalty_name')
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