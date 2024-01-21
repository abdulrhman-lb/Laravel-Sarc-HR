@extends('layouts.app')

@section('content')
<div class="container">
    <h5 class="d-flex fw-bold justify-content-center pb-3">تعديل مكافئة لموظف</h5>
    <form action="/reward/{{$lists['rewards'] -> id}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row row-cols-lg-3 g-3 align-items-center mb-3">

            <div class="col-12">
              <label class="m-2">اختر الموظف...</label>
              <select class="form-select @error('profile_id') is-invalid @enderror" id="profile_id" name="profile_id" >
                <option selected>-</option>
                    @foreach ($lists['Profiles'] as $profile)
                        <option value="{{$profile -> id}}" {{ $profile -> id == $lists['rewards'] -> profile_id ? 'selected' : ''}}>{{$profile -> first_name . ' ' . $profile -> father_name . ' ' . $profile -> last_name}}</option>
                    @endforeach
              </select>
              @error('profile_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="col-12">
              <label class="m-2">اختر مكافئة...</label>
              <select class="form-select @error('reward_id') is-invalid @enderror" id="reward_id" name="reward_id">
                <option selected>-</option>
                @foreach ($lists['reward_names'] as $reward_name)
                    <option value="{{$reward_name -> id}}" {{ $reward_name -> id == $lists['rewards'] -> reward_id ? 'selected' : ''}}>{{$reward_name -> reward_name }}</option>
                @endforeach
              </select>
              @error('reward_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>

            <div class="col-12">
                <label class="m-2">تاريخ مكافئة</label>
                <input type="text" class="form-control @error('reward_date') is-invalid @enderror" id="reward_date" name="reward_date" value="{{date('d-m-Y', strtotime($lists['rewards'] -> reward_date))}}">
                @error('penalty_date')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="col-12">
              <label class="m-2">مصدر المكافئة</label>
              <select class="form-select @error('reward_source') is-invalid @enderror" id="reward_source" name="reward_source">
                  <option value="الفرع">الفرع</option>
                  <option value="المركز الرئيسي" {{ $lists['rewards'] -> reward_source == 'المركز الرئيسي' ? 'selected' : ''}}>المركز الرئيسي</option>
              </select>
              @error('reward_source')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
            <div class="col-12">
                <label class="m-2">سبب مكافئة</label>
                <input type="text" class="form-control @error('reward_reason') is-invalid @enderror" id="reward_reason" name="reward_reason" value="{{$lists['rewards'] -> reward_reason}}">
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