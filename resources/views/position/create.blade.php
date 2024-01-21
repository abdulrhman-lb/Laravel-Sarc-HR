@extends('layouts.app')

@section('content')
<div class="container">
    <h5 class="d-flex fw-bold justify-content-center pb-3">إضافة عمل جديد لموظف</h5>
    <form action="/position" method="POST">
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
              <label class="m-2">اختر القسم...</label>
              <select class="form-select @error('department_id') is-invalid @enderror" id="department_id" name="department_id">
                <option selected>-</option>
                @foreach ($lists['departments'] as $department)
                    <option value="{{$department -> id}}" {{ $department -> id == old('department_id') ? 'selected' : ''}}>{{$department -> department }}</option>
                @endforeach
              </select>
              @error('department_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="col-12">
              <label class="m-2">المنصب</label>
              <input type="text" class="form-control @error('position') is-invalid @enderror" id="position" name="position" value="{{ old('position') }}">
              @error('position')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="col-12">
              <label class="m-2">المنصب باللغة الانكليزية</label>
              <input type="text" class="form-control @error('position_en') is-invalid @enderror" id="position_en" name="position_en" value="{{ old('position_en') }}">
              @error('position_en')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <div class="col-12">
              <label class="m-2">اختر الصفة الهلالية...</label>
              <select class="form-select @error('jop_title_id') is-invalid @enderror" id="jop_title_id" name="jop_title_id" >
                <option selected>-</option>
                    @foreach ($lists['jop_titles'] as $jop_title)
                        <option value="{{$jop_title -> id}}" {{ $jop_title -> id == old('jop_title_id') ? 'selected' : ''}}>{{$jop_title -> jop_title}}</option>
                    @endforeach
              </select>
              @error('jop_title_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="col-12">
                <label class="m-2">تاريخ بدء العمل الجديد</label>
                <input type="text" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{old('start_date') != null ? date('d-m-Y', strtotime(old('start_date'))) : null}}">
                @error('start_date')
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