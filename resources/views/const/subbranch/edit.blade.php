@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="d-flex fw-bold justify-content-center pb-3">تعديل بيانات الشعبة المحددة</h4>
    <form action="/const/subbranch/{{$list['sub_branches'] -> id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label"> اسم الشعبة</label>
            <input type="text" class="form-control" id="sub_branch" name="sub_branch" value="{{$list['sub_branches'] -> sub_branch}}">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label"> اسم الشعبة باللغة الانكليزية</label>
            <input type="text" class="form-control" id="sub_branch_en" name="sub_branch_en" value="{{$list['sub_branches'] -> sub_branch_en}}">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">اختر اسم الفرع التابعة له</label>
            <select class="form-select " id="branch_id" name="branch_id">
                <option value="0">-</option>
                  @foreach ($list['branches'] as $branch)
                    <option value="{{$branch -> id}}" {{$branch->id == $list['sub_branches'] -> branch_id  ? 'selected' : ''}}>{{$branch -> branch . ' - ' . $branch -> branch_en}}</option>
                  @endforeach
              </select>
        </div>
        <div class="form-floating">
            <button type="submit" class="block">حفظ التعديلات</button>
        </div>
    </form>
</div>
@endsection