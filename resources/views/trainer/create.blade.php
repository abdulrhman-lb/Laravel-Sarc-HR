@extends('layouts.app')

@section('content')
<div class="container">
    <h5 class="d-flex fw-bold justify-content-center pb-3">إضافة مدرب جديد للدورة</h5>
    <form action="{{action('TrainingTrainerController@store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">اختر اسم المدرب</label>
            <input type="hidden" name="training_course_id" value="{{$lists['id']}}">
            <select class="form-select @error('trainer_id') is-invalid @enderror" id="trainer_id" name="trainer_id">
                @foreach ($lists['trainers'] as $trainer)
                    <option value="{{$trainer -> id}} {{ $trainer -> id == old('trainer') ? 'selected' : ''}}">{{$trainer -> trainer . ' - ' . $trainer -> trainer_en}}</option>
                @endforeach
            </select>
            @error('trainer_id')
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


