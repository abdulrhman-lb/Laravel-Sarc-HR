@extends('layouts.app')

@section('content')
<div class="container">
    <h5 class="d-flex fw-bold justify-content-center pb-3">إضافة مكافئة لموظف</h5>
    <form action="/reward" method="POST">
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
              <label class="m-2">اختر المكافئة...</label>
              <select class="form-select @error('reward_id') is-invalid @enderror" id="reward_id" name="reward_id">
                <option selected>-</option>
                @foreach ($lists['reward_names'] as $reward_name)
                    <option value="{{$reward_name -> id}}" {{ $reward_name -> id == old('reward_id') ? 'selected' : ''}}>{{$reward_name -> reward_name }}</option>
                @endforeach
              </select>
              @error('reward_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="col-12">
                <label class="m-2">تاريخ المكافئة</label>
                <input type="text" class="form-control @error('reward_date') is-invalid @enderror" id="reward_date" name="reward_date" value="{{old('reward_date') != null ? date('d-m-Y', strtotime(old('reward_date'))) : null}}">
                @error('reward_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="col-12">
              <label class="m-2">مصدر المكافئة</label>
              <select class="form-select @error('reward_source') is-invalid @enderror" id="reward_source" name="reward_source">
                  <option value="الفرع">الفرع</option>
                  <option value="المركز الرئيسي">المركز الرئيسي</option>
              </select>
              @error('reward_source')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="col-12">
                <label class="m-2">سبب المكافئة</label>
                <input type="text" class="form-control @error('reward_reason') is-invalid @enderror" id="reward_reason" name="reward_reason" value="{{ old('reward_reason') }}">
                @error('reward_reason')
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