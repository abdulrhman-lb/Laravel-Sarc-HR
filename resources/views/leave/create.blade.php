@extends('layouts.app')

@section('content')
@if (session()->has('message'))
    <div class="container alert alert-warning" role="alert"> 
        {{session()->get('message')}}
    </div> 
@endif
<div class="container">
    <h5 class="d-flex fw-bold justify-content-center pb-1 pt-1">طلب إجازة للموظف {{$lists['profiles'] -> first_name.' '.$lists['profiles'] -> father_name.' '.$lists['profiles'] -> last_name}}</h5>
    <form action="/leave" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" id="profile_id" name="profile_id" value="{{ old('profile_id', $lists['profiles']->id) }}">

        <div class="mb-3">
            <label class="form-label">أدخل نوع الإجازة</label>
            <select class="form-select @error('leave_name_id') is-invalid @enderror" id="leave_name_id" name="leave_name_id">
                <option value="">-</option>
                @foreach ($lists['leave_names'] as $leave_name)
                    <option value="{{$leave_name -> id}}" {{ $leave_name -> id == old('leave_name_id') ? 'selected' : ''}}>{{$leave_name -> leave_name}}</option>
                @endforeach
            </select>
            @error('leave_name_id')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <label for="leave_detaile" id="leave_detaile" class="fw-bold pt-3 text-danger"></label>
        </div>

        <div class="mb-3">
            <label class="form-label">تاريخ بدء الإجازة</label>
            <input type="text" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{old('start_date') != null ? date('d-m-Y', strtotime(old('start_date'))) : null}}">
            @error('start_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">تاريخ نهاية الإجازة</label>
            <input type="text" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{old('end_date') != null ? date('d-m-Y', strtotime(old('end_date'))) : null}}">
            @error('end_date')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="document" class="form-label">إضافة وثائق خاصة بالإجازة مثل تقرير طبي أو أي نوع وثائق معتمد من قبل الإدارة بتنسيق pdf</label>
            <input class="form-control @error('document') is-invalid @enderror" type="file" id="document" name="document" value="{{ old('document') }}>
            @error('document')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-floating">
            <button type="submit" class="block">طلب الإجازة</button>
        </div>
    </form>
</div>
@endsection


