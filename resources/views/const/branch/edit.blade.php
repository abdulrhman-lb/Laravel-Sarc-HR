@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="d-flex fw-bold justify-content-center pb-3">تعديل بيانات الفرع المحدد</h4>
    <form action="/const/branch/{{$branches -> id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label"> اسم الفرع</label>
            <input type="text" class="form-control @error('branch') is-invalid @enderror" id="branch" name="branch" value="{{$branches -> branch}}">
            @error('branch')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label"> اسم الفرع باللغة الانكليزية</label>
            <input type="text" class="form-control @error('branch_en') is-invalid @enderror" id="branch_en" name="branch_en" value="{{$branches -> branch_en}}">
            @error('branch_en')
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