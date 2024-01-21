@extends('layouts.app')

@section('content')
<div class="container">
    <h5 class="d-flex fw-bold justify-content-center pb-3">إضافة عقوبة لموظف</h5>
    <form action="/penalty" method="POST">
        @csrf
        <div class="row row-cols-lg-3 g-3 align-items-center mb-3">

            <div class="col-12">
              <label class="m-2">اختر الموظف...</label>
              <select class="form-select @error('profile_id') is-invalid @enderror" id="profile_id" name="profile_id" >
                <option selected>-</option>
                    @foreach ($lists['Profiles'] as $profile)
                        <option value="{{$profile -> id}}" {{ $profile -> id == old('profile_id') ? 'selected' : ''}}>{{$profile -> first_name . ' ' . $profile -> father_name . ' ' . $profile -> last_name}}</option>
                    @endforeach
              </select>
              @error('profile_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="col-12">
              <label class="m-2">اختر العقوبة...</label>
              <select class="form-select @error('penalty_id') is-invalid @enderror" id="penalty_id" name="penalty_id">
                <option selected>-</option>
                @foreach ($lists['penalty_names'] as $penalty_name)
                    <option value="{{$penalty_name -> id}}" {{ $penalty_name -> id == old('penalty_id') ? 'selected' : ''}}>{{$penalty_name -> penalty_name }}</option>
                @endforeach
              </select>
              @error('penalty_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="col-12">
                <label class="m-2">تاريخ العقوبة</label>
                <input type="text" class="form-control @error('penalty_date') is-invalid @enderror" id="penalty_date" name="penalty_date" value="{{old('penalty_date') != null ? date('d-m-Y', strtotime(old('penalty_date'))) : null}}">
                @error('penalty_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="col-12">
              <label class="m-2">مصدر العقوبة</label>
              <select class="form-select @error('penalty_source') is-invalid @enderror" id="penalty_source" name="penalty_source">
                  <option value="الفرع">الفرع</option>
                  <option value="المركز الرئيسي">المركز الرئيسي</option>
              </select>
              @error('penalty_source')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="col-12">
                <label class="m-2">سبب العقوبة</label>
                <input type="text" class="form-control @error('penalty_reason') is-invalid @enderror" id="penalty_reason" name="penalty_reason" value="{{ old('penalty_reason') }}">
                @error('penalty_reason')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
          </div>

        <div class="form-floating">
            <button type="submit" class="block">حفظ</button>
        </div>
    </form>
</div>
@endsection