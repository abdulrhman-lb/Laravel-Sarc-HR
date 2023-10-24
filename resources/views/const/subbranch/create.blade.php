@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="d-flex fw-bold justify-content-center pb-3">إضافة شعبة جديدة</h4>
    <form action="/const/subbranch" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">أدخل اسم الشعبة</label>
            <input type="text" class="form-control" id="sub_branch" name="sub_branch">
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">أدخل اسم الشعبة باللغة الالنكليزية</label>
            <input type="text" class="form-control" id="sub_branch_en" name="sub_branch_en" >
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">اختر اسم الفرع التابعة له</label>
            <select class="form-select " id="branch_id" name="branch_id">
                <option value="0">-</option>
                  @foreach ($branches as $branch)
                    <option value="{{$branch -> id}}">{{$branch -> branch . ' - ' . $branch -> branch_en}}</option>
                  @endforeach
              </select>
        </div>
        <div class="form-floating">
            <button type="submit" class="block">حفظ</button>
        </div>
    </form>
</div>
@endsection


