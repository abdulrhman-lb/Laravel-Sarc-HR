@extends('layouts.app')

@section('content')
<div class="container"> 
  <h5 class="d-flex fw-bold justify-content-center pb-3">إضافة دورة تدريبية جديدة</h5>
  <form action="/training" method="POST" enctype="multipart/form-data">
      @csrf

      <div class="row row-cols-lg-3 g-3 align-items-center mb-3">

        <div class="col-12">
          <label class="m-2">اختر الدورة </label>
          <select class="form-select @error('training_id') is-invalid @enderror" id="training_id" name="training_id" >
            <option>-</option>
            @foreach ($lists['training'] as $training)
              <option value="{{$training -> id}}" {{ $training -> id == old('training_id') ? 'selected' : ''}}>{{$training -> training . ' - ' . $training -> training_en}}</option>
            @endforeach
          </select>
          @error('training_id')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="col-12">
          <label class="m-2">مكان الدورة</label>
          <input type="text" class="form-control @error('training_place') is-invalid @enderror" id="training_place" name="training_place" value="{{ old('training_place') }}">
          @error('training_place')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="col-12">
          <label class="m-2">تاريخ بدء الدورة</label>
          <input type="text" class="form-control @error('training_date_start') is-invalid @enderror" id="training_date_start" name="training_date_start" value="{{old('training_date_start') != null ? date('d-m-Y', strtotime(old('training_date_start'))) : null}}">
          @error('training_date_start')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="col-12">
          <label class="m-2">تاريخ نهاية الدورة </label>
          <input type="text" class="form-control @error('training_date_end') is-invalid @enderror" id="training_date_end" name="training_date_end" value="{{old('training_date_end') != null ? date('d-m-Y', strtotime(old('training_date_end'))) : null}}">
          @error('training_date_end')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="col-12 ">
          <label class="m-2"> عدد أيام التدريب</label>
          <input min="1" type="number" class="form-control @error('training_days_number') is-invalid @enderror" id="training_days_number" name="training_days_number" value="{{ old('training_days_number') }}">
          @error('training_days_number')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

      </div>

      <div class="col-12 mw-100">
        <button type="submit" class="block">حفظ</button>
      </div>
  </form>
</div>
@endsection