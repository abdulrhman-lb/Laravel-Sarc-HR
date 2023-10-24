@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="d-flex fw-bold justify-content-center pb-3">تعديل بيانات الصفة الهلالية المحددة</h4>
    <form action="/const/joptitle/{{$jop_titles -> id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label"> الصفة الهلالية</label>
            <input type="text" class="form-control" id="jop_title" name="jop_title" value="{{$jop_titles -> jop_title}}">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label"> الصفة الهلالية باللغة الانكليزية</label>
            <input type="text" class="form-control" id="jop_title_en" name="jop_title_en" value="{{$jop_titles -> jop_title_en}}">
        </div>
        <div class="form-floating">
            <button type="submit" class="block">حفظ التعديلات</button>
        </div>
    </form>
</div>
@endsection