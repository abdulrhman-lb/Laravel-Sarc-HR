@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="d-flex fw-bold justify-content-center pb-3">تعديل بيانات المستخدم</h4>
    <h4 class="d-flex fw-bold justify-content-center pb-3">{{$users -> username}}</h4>
    <form action="/conf/update/{{$users -> id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">صلاحيات المستخدم</label>
            <select class="form-select" id="role" name="role">
                <option value="0" {{$users -> role == '0'  ? 'selected' : ''}}>مستخدم عادي</option>
                <option value="1" {{$users -> role == '1'  ? 'selected' : ''}}>مستخدم مدير</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">حالة المستخدم</label>
            <select class="form-select" id="active" name="active">
                <option value="0" {{$users -> active == '0'  ? 'selected' : ''}}>غير فعال</option>
                <option value="1" {{$users -> active == '1'  ? 'selected' : ''}}>فعال</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label"> إعادة تعيين كلمة المرور</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
            @error('password')
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