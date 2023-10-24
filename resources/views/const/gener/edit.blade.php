@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="d-flex fw-bold justify-content-center pb-3">استعراض بيانات الجنس المحدد</h4>
    <form action="/const/gener/{{$geners -> id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label"> الجنس</label>
            <input type="text" class="form-control" id="gener" name="gener" value="{{$geners -> gener}}">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label"> الجنس باللغة الانكليزية</label>
            <input type="text" class="form-control" id="gener_en" name="gener_en" value="{{$geners -> gener_en}}">
        </div>
        <div class="form-floating">
            <button type="submit" class="block">حفظ التعديلات</button>
        </div>
    </form>
</div>
@endsection