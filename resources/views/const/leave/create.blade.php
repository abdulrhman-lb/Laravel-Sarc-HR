@extends('layouts.app')

@section('content')
<div class="container">
    <h5 class="d-flex fw-bold justify-content-center pb-3">إضافة إجازة جديدة</h5>
    <form action="/const/leave" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">أدخل نوع الإجازة</label>
            <input type="text" class="form-control @error('leave_name') is-invalid @enderror" id="leave_name" name="leave_name" value="{{ old('leave_name') }}">
            @error('leave_name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">اختر دليل الأيام</label>
            <select class="form-select @error('leave_source') is-invalid @enderror" id="leave_source" name="leave_source">
                <option value="ثابتة حسب الايام المحددة" {{ old('leave_source') == 1 ? 'selected' : ''}}>ثابتة حسب الايام المحددة</option>
                <option value="متغيرة حسب الموظف" {{ old('leave_source') == 1 ? 'selected' : ''}}>متغيرة حسب الموظف</option>
            </select>
            @error('leave_source')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">العدد الأعظمي للأيام</label>
            <input type="number" class="form-control" id="max_day" name="max_day" value="{{ old('max_day') }}">
            @error('max_day')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">المفوض بالموافقة عن الموارد البشرية</label>
            <select class="form-select @error('hr_approve_id') is-invalid @enderror" id="hr_approve_id" name="hr_approve_id">
                @foreach ($profiles as $profile)
                <option value="{{$profile -> id}}" {{ $profile -> id == old('hr_approve_id') ? 'selected' : ''}}>{{$profile -> first_name . ' ' . $profile -> last_name}}</option>
                @endforeach
            </select>
            @error('hr_approve_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">المفوض بالموافقة عن الإدارة</label>
            <select class="form-select @error('mang_approve_id') is-invalid @enderror" id="mang_approve_id" name="mang_approve_id">
                @foreach ($profiles as $profile)
                <option value="{{$profile -> id}}" {{ $profile -> id == old('mang_approve_id') ? 'selected' : ''}}>{{$profile -> first_name . ' ' . $profile -> last_name}}</option>
                @endforeach
            </select>
            @error('mang_approve_id')
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


