@extends('layouts.app')

@section('content')
<div class="container">
    <h5 class="d-flex fw-bold justify-content-center pb-3">إضافة متدرب جديد للدورة</h5>
    <form action="{{action('TrainingTraineeController@store')}}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="formGroupExampleInput2" class="form-label">اختر اسم المتدرب</label>
            <input type="hidden" name="training_course_id" value="{{$lists['id']}}">
            <select class="form-select @error('trainee_id') is-invalid @enderror" id="trainee_id" name="trainee_id">
                @foreach ($lists['trainees'] as $trainee)
                    <option value="{{$trainee -> id}} {{ $trainee -> id == old('trainee') ? 'selected' : ''}}">{{$trainee -> first_name . ' ' . $trainee -> father_name . ' ' . $trainee -> last_name . ' - ' . $trainee -> full_name_en}}</option>
                @endforeach
            </select>
            @error('trainee_id')
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


