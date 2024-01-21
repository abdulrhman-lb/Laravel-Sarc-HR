@extends('layouts.app')

@section('content')
<div class="container">
    <h5 class="d-flex fw-bold justify-content-center pb-3">تعديل بيانات القسم المحدد</h5>
    <form action="/const/department/{{$lists['departments'] -> id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label"> اسم القسم</label>
            <input type="text" class="form-control @error('department') is-invalid @enderror" id="department" name="department" value="{{$lists['departments'] -> department}}">
            @error('department')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label"> اسم القسم باللغة الانكليزية</label>
            <input type="text" class="form-control @error('department_en') is-invalid @enderror" id="department_en" name="department_en" value="{{$lists['departments'] -> department_en}}">
            @error('department_en')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">اختصار اسم القسم</label>
            <input type="text" class="form-control @error('department_short') is-invalid @enderror" id="department_short" name="department_short" value="{{$lists['departments'] -> department_short}}">
            @error('department_short')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">معلومات عن القسم</label>
            <textarea type="text" class="form-control @error('department_information') is-invalid @enderror" id="department_information" name="department_information" >{{$lists['departments'] -> department_information}}</textarea>
            @error('department_information')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">الجهة المانحة</label>
            <input type="text" class="form-control @error('donor') is-invalid @enderror" id="donor" name="donor" value="{{$lists['departments'] -> donor}}">
            @error('donor')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">اسم المنسق</label>
            <input type="hidden" class="form-control @error('coordinator_name') is-invalid @enderror" id="coordinator_name" name="coordinator_name" value="{{$lists['departments'] -> coordinator_name}}">
            <select class="form-select @error('coordinator_id') is-invalid @enderror" id="coordinator_id" name="coordinator_id">
                <option value="">-</option>
                @foreach ($lists['profiles'] as $profile)
                    <option value="{{$profile -> id}}" {{ $profile -> id == $lists['departments'] -> coordinator_id ? 'selected' : ''}}>{{$profile -> first_name . '  ' . $profile -> last_name}}</option>
                @endforeach
            </select>
            @error('coordinator_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">رقم جوال المنسق</label>
            <input readonly type="text" class="form-control @error('coordinator_mobile') is-invalid @enderror" id="coordinator_mobile" name="coordinator_mobile" value="{{$lists['departments'] -> coordinator_mobile}}">
            @error('coordinator_mobile')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">البريد الالكتروني للمنسق</label>
            <input readonly type="text" class="form-control @error('coordinator_email') is-invalid @enderror" id="coordinator_email" name="coordinator_email" value="{{$lists['departments'] -> coordinator_email}}">
            @error('coordinator_email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">العنوان</label>
            <input type="text" class="form-control @error('department_address') is-invalid @enderror" id="department_address" name="department_address" value="{{$lists['departments'] -> department_address }}">
            @error('department_address')
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