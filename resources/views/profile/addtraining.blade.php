@extends('layouts.app')

@section('content')
<div class="container">
    <h5 class="d-flex fw-bold justify-content-center pb-3">إضافة دورة تدريبية جديدة</h5>
    <form action="/mytraining" method="get">
        <div class="row row-cols-lg-1 g-3 align-items-center mb-3">
            <div class="col-12">
                <label class="m-2">اختر الدورة...</label>
                <select class="form-select @error('pr') is-invalid @enderror" id="tr" name="tr" >
                <option>-</option>
                @foreach ($lists['trainings'] as $training)
                    <option value="{{$training -> id}}" {{$lists['training'] == $training -> id  ? 'selected' : ''}}>{{$training -> training . ' - ' . $training -> training_en}}</option>
                @endforeach
                </select>
                @error('pr')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                <input type="hidden" name="pr" value="{{$lists['profile']}}">
            </div>
            <div class="col-12">
                <button type="submit" class="block">عرض الدورات المتاحة</button>
            </div>
        </div>
    </form>
        <table class="table table-bordered mt-3">
            <tr>
                <th class="centered-content" colspan="7">الدورات التدريبيبة المتاحة</th>
            </tr>
            <tr>   
                <th class="centered-content">مكان التدريب</th>
                <th class="centered-content">تاريخ بدء التدريب</th>
                <th class="centered-content">تاريخ نهاية التدريب</th>
                <th class="centered-content">عدد أيام التدريب</th>
                <th class="centered-content"></button></a></th>
            </tr>
            @foreach ($lists['training_courses'] as $training_course)        
                <tr class="pt-3 ">
                    <td class="centered-content">{{$training_course -> training_place}}</td>
                    <td class="centered-content">{{$training_course -> training_date_start }}</td>
                    <td class="centered-content">{{$training_course -> training_date_end }}</td>
                    <td class="centered-content">{{$training_course -> training_days_number }}</td>
                    <td class="centered-content">
                      <form action="/mytraining" method="POST">
                          @csrf
                          <input type="hidden" name="tr" value="{{$training_course -> id}}">
                          <input type="hidden" name="pr" value="{{$lists['profile']}}">
   
                          <button type="submit" class="btn btn-success my-1" onclick ="return confirm('هل تريد بالتأكيد إضافة هذه الدورة إلى الدورات المتبعة ؟')"><i class="fa fa-add"></i></button>  
                      </form>  
                  </td>
                </tr>
            @endforeach
          </table>
</div>
@endsection


