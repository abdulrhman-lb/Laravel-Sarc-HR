@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="d-flex fw-bold justify-content-center pb-3">تعديل بيانات الشعبة المحددة</h4>
    <form action="/const/subbranch/{{$sub_branches -> id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label"> اسم الشعبة</label>
            <input type="text" class="form-control" id="sub_branch" name="sub_branch" value="{{$sub_branches -> sub_branch}}">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label"> اسم الشعبة باللغة الانكليزية</label>
            <input type="text" class="form-control" id="sub_branch_en" name="sub_branch_en" value="{{$sub_branches -> sub_branch_en}}">
        </div>
        <div class="form-floating">
            <button type="submit" class="block">حفظ التعديلات</button>
        </div>
    </form>
</div>
@endsection