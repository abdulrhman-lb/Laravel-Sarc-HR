@extends('layouts.app')

@section('content')
<div class="container"> 
  <h5 class="d-flex fw-bold justify-content-center pb-3">تعديل بيانات الدورة التدريبية المحددة</h5>
  <form action="/training/{{$lists['training_courses']->id}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="row row-cols-lg-3 g-3 align-items-center mb-3">

        <div class="col-12">
          <label class="m-2">الدورة</label>
          <select class="form-select @error('training_id') is-invalid @enderror" id="training_id" name="training_id" >
            <option>-</option>
            @foreach ($lists['training'] as $training)
              <option value="{{$training -> id}}" {{$training -> id == $lists['training_courses'] -> training_id ? 'selected' : ''}}>{{$training -> training . ' - ' . $training -> training_en}}</option>
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
          <input type="text" class="form-control @error('training_place') is-invalid @enderror" id="training_place" name="training_place" value="{{$lists['training_courses'] -> training_place}}">
          @error('training_place')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="col-12">
          <label class="m-2">تاريخ بدء الدورة</label>
          <input type="text" class="form-control @error('training_date_start') is-invalid @enderror" id="training_date_start" name="training_date_start" value="{{date('d-m-Y', strtotime($lists['training_courses'] -> training_date_start))}}">
          @error('training_date_start')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="col-12">
          <label class="m-2">تاريخ نهاية الدورة </label>
          <input type="text" class="form-control @error('training_date_end') is-invalid @enderror" id="training_date_end" name="training_date_end" value="{{date('d-m-Y', strtotime($lists['training_courses'] -> training_date_end))}}">
          @error('training_date_end')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="col-12 ">
          <label class="m-2"> عدد أيام التدريب</label>
          <input min="1" type="number" class="form-control @error('training_days_number') is-invalid @enderror" id="training_days_number" name="training_days_number" value="{{$lists['training_courses'] -> training_days_number}}">
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