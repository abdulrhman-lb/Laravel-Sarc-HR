@extends('layouts.app')

@section('content')
<div class="container">
    <h5 class="d-flex fw-bold justify-content-center pb-3">إضافة شعبة جديدة</h5>
    <form action="/const/subbranch" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">أدخل اسم الشعبة</label>
            <input type="text" class="form-control @error('sub_branch') is-invalid @enderror" id="sub_branch" name="sub_branch" value="{{ old('sub_branch') }}">
            @error('sub_branch')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">أدخل اسم الشعبة باللغة الالنكليزية</label>
            <input type="text" class="form-control @error('sub_branch_en') is-invalid @enderror" id="sub_branch_en" name="sub_branch_en" value="{{ old('sub_branch_en') }}">
            @error('sub_branch_en')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">اختر اسم الفرع التابعة له</label>
            <select class="form-select @error('branch_id') is-invalid @enderror" id="branch_id" name="branch_id">
                @foreach ($branches as $branch)
                <option value="{{$branch -> id}} {{ $branch -> id == old('branch_id') ? 'selected' : ''}}">{{$branch -> branch . ' - ' . $branch -> branch_en}}</option>
                @endforeach
            </select>
            @error('branch_id')
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


