@extends('layouts.app')

@section('content')
<div class="container">
    <h5 class="d-flex fw-bold justify-content-center pb-3">تعديل بيانات المكافئة المحدد</h5>
    <form action="/const/reward/{{$rewards -> id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label"> المكافئة</label>
            <input type="text" class="form-control @error('reward_name') is-invalid @enderror" id="reward_name" name="reward_name" value="{{$rewards -> reward_name}}">
            @error('reward_name')
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