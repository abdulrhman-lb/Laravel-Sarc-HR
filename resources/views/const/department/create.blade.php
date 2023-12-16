@extends('layouts.app')

@section('content')
<div class="container">
    <h5 class="d-flex fw-bold justify-content-center pb-3">إضافة قسم جديد</h5>
    <form action="/const/department" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">أدخل اسم القسم</label>
            <input type="text" class="form-control @error('department') is-invalid @enderror" id="department" name="department" value="{{ old('department') }}">
            @error('department')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">أدخل اسم القسم باللغة الانكليزية</label>
            <input type="text" class="form-control @error('department_en') is-invalid @enderror" id="department_en" name="department_en" value="{{ old('department_en') }}">
            @error('department_en')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">أدخل اختصار اسم القسم</label>
            <input type="text" class="form-control @error('department_short') is-invalid @enderror" id="department_short" name="department_short" value="{{ old('department_short') }}">
            @error('department_short')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">معلومات عن القسم</label>
            <textarea type="text" class="form-control @error('department_information') is-invalid @enderror" id="department_information" name="department_information">{{ old('department_information') }}</textarea>
            @error('department_information')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">الجهة المانحة</label>
            <input type="text" class="form-control @error('donor') is-invalid @enderror" id="donor" name="donor" value="{{ old('donor') }}">
            @error('donor')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">اسم المنسق</label>
            <input type="text" class="form-control @error('coordinator_name') is-invalid @enderror" id="coordinator_name" name="coordinator_name" value="{{ old('coordinator_name') }}">
            @error('coordinator_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">رقم جوال المنسق</label>
            <input type="text" class="form-control @error('coordinator_mobile') is-invalid @enderror" id="coordinator_mobile" name="coordinator_mobile" value="{{ old('coordinator_mobile') }}">
            @error('coordinator_mobile')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">البريد الالكتروني للمنسق</label>
            <input type="text" class="form-control @error('coordinator_email') is-invalid @enderror" id="coordinator_email" name="coordinator_email" value="{{ old('coordinator_email') }}">
            @error('coordinator_email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">العنوان</label>
            <input type="text" class="form-control @error('department_address') is-invalid @enderror" id="department_address" name="department_address" value="{{ old('department_address') }}">
            @error('department_address')
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