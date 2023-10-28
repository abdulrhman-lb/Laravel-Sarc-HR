@extends('layouts.app')

@section('content')
<div class="container"> 
    <h4 class="d-flex fw-bold justify-content-center pb-3">المعلومات الشخصية</h4>
    @php
      $image = '';
      if (($lists['profiles'] -> image) == '' ) {
        $image = 'non_m.png';    
      } else {
          $image = 'profiles/' . $lists['profiles'] -> image; 
      }
    @endphp
    <form action="/profile/{{$lists['profiles'] -> id}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div class="containerr">
        <img src="/images/{{$image}}" class="img-pro my-4" id="image_preview">
        <div class="middle">
          <label>
            <span class="block" id="choose-image">تغيير الصورة</span>
            <input type="file" id="image" name="image" class="hidden-image">
          </label>
        </div>
      </div>
      <div class="row row-cols-lg-3 g-3 align-items-center mb-3">
        <div class="col-12">
          <label class="m-2">اختر الفرع...</label>
          <select class="form-select " id="branch_id" name="branch_id">
            <option value="0" {{$lists['profiles'] -> branch_id == 0 ? 'selected' : ''}}>-</option>
            @foreach ($lists['branches'] as $branch)
              <option value="{{$branch -> id}}" {{$lists['profiles'] -> branch_id == $branch -> id  ? 'selected' : ''}}>{{$branch -> branch . ' - ' . $branch -> branch_en}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-12">
          <label class="m-2">اختر الشعبة...</label>
          <select class="form-select " id="sub_branch_id" name="sub_branch_id">
            <option selected value="0">-</option>
          </select>
        </div>
        <div class="col-12">
          <label class="m-2">النقطة</label>
          <input type="text" class="form-control" id="point" name="point" value="{{$lists['profiles'] -> point}}">
        </div>
        <div class="col-12">
          <label class="m-2">اختر القسم...</label>
          <select class="form-select " id="department_id" name="department_id">
            <option value="0" {{$lists['profiles'] -> department_id == 0  ? 'selected' : ''}}>-</option>
            @foreach ($lists['departments'] as $department)
              <option value="{{$department -> id}}" {{$lists['profiles']->department_id == $department -> id  ? 'selected' : ''}}>{{$department -> department . ' - ' . $department -> department_en}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="row row-cols-lg-3 g-3 align-items-center mb-3">
        <div class="col-12">
          <label class="m-2">الاسم الأول</label>
          <input type="text" class="form-control" id="first_name" name="first_name" value="{{$lists['profiles'] -> first_name}}">
        </div>
        <div class="col-12">
          <label class="m-2">الكنية</label>
          <input type="text" class="form-control" id="last_name" name="last_name" value="{{$lists['profiles'] -> last_name}}">
        </div>
        <div class="col-12">
          <label class="m-2">اسم الأب</label>
          <input type="text" class="form-control" id="father_name" name="father_name" value="{{$lists['profiles'] -> father_name}}">
        </div>
        <div class="col-12">
          <label class="m-2">اسم الأم</label>
          <input type="text" class="form-control" id="mother_name" name="mother_name" value="{{$lists['profiles'] -> mother_name}}">
        </div>
        <div class="col-12">
          <label class="m-2">الرقم الوطني</label>
          <input type="text" class="form-control" id="national_number" name="national_number" value="{{$lists['profiles'] -> national_number}}">
        </div>
        <div class="col-12">
          <label class="m-2">اختر الجنس...</label>
          <select class="form-select " id="gener_id" name="gener_id">
            <option value="0" {{$lists['profiles'] -> gener_id == 0 ? 'selected' : ''}}>-</option>
            @foreach ($lists['geners'] as $gener)
              <option value="{{$gener -> id}}" {{$lists['profiles'] -> gener_id == $gener -> id  ? 'selected' : ''}}>{{$gener -> gener . ' - ' . $gener -> gener_en}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-12">
          <label class="m-2">مكان الولادة</label>
          <input type="text" class="form-control" id="birth_place" name="birth_place" value="{{$lists['profiles'] -> birth_place}}">
        </div>
        <div class="col-12">
          <label class="m-2">تاريخ الولادة</label>
          <input type="date" class="form-control" id="birth_date" name="birth_date" value="{{$lists['profiles'] -> birth_date}}">
        </div>
        <div class="col-12 ">
          <label class="m-2">اختر زمرة الدم...</label>
          <select class="form-select " id="blood_group" name="blood_group">
            <option value="-" {{$lists['profiles']-> blood_group == '-'  ? 'selected' : ''}}>-</option>
            <option value="A+" {{$lists['profiles']-> blood_group == 'A+'  ? 'selected' : ''}}>A+</option>
            <option value="A-" {{$lists['profiles']-> blood_group == 'A-'  ? 'selected' : ''}}>A-</option>
            <option value="B+" {{$lists['profiles']-> blood_group == 'B+'  ? 'selected' : ''}}>B+</option>
            <option value="B-" {{$lists['profiles']-> blood_group == 'B-'  ? 'selected' : ''}}>B-</option>
            <option value="AB+" {{$lists['profiles']-> blood_group == 'AB+'  ? 'selected' : ''}}>AB+</option>
            <option value="AB-" {{$lists['profiles']-> blood_group == 'AB-'  ? 'selected' : ''}}>AB-</option>
            <option value="O+" {{$lists['profiles']-> blood_group == 'O+'  ? 'selected' : ''}}>O+</option>
            <option value="O-" {{$lists['profiles']-> blood_group == 'O-'  ? 'selected' : ''}}>O-</option>
          </select>
        </div>
        <div class="col-12">
          <label class="m-2">اختر الحالة الاجتماعية...</label>
          <select class="form-select " id="marital_status_id" name="marital_status_id">
            <option value="0" {{$lists['profiles'] -> marital_status_id == 0 ? 'selected' : ''}}>-</option>
            @foreach ($lists['marital_statuses'] as $marital_status)
              <option value="{{$marital_status -> id}}" {{$lists['profiles'] -> marital_status_id == $marital_status -> id  ? 'selected' : ''}}>{{$marital_status -> marital_status . ' - ' . $marital_status -> marital_status_en}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div class="row row-cols-lg-3 g-3 align-items-center mb-3">
        <div class="col-12">
          <label class="m-2"> الموبايل</label>
          <input type="text" class="form-control" id="mobile_phone" name="mobile_phone" value="{{$lists['profiles'] -> mobile_phone}}">
        </div>
        <div class="col-12">
          <label class="m-2">الهاتف </label>
          <input type="text" class="form-control" id="phone" name="phone" value="{{$lists['profiles'] -> phone}}">
        </div>
        <div class="col-12">
          <label class="m-2">البريد الالكتروني</label>
          <input type="text" class="form-control" id="email" name="email" value="{{$lists['profiles'] -> email}}">
        </div>
        <div class="col-12">
          <label class="m-2">اختر الشهادة العلمية...</label>
          <select class="form-select " id="certificate_id" name="certificate_id">
            <option value="0" {{$lists['profiles'] -> certificate_id == 0 ? 'selected' : ''}}>-</option>
            @foreach ($lists['certificates'] as $certificate)
              <option value="{{$certificate -> id}}" {{$lists['profiles'] -> certificate_id == $certificate -> id  ? 'selected' : ''}}>{{$certificate -> certificate . ' - ' . $certificate -> certificate_en}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-12"> 
          <label class="m-2">تفاصيل الشهادة العلمية</label>
          <input type="text" class="form-control " id="certificate_details" name="certificate_details" value="{{$lists['profiles'] -> certificate_details}}">
        </div>
      </div>
      <div class="row row-cols-lg-3 g-3 align-items-center mb-3">
        <div class="col-12">
          <label class="m-2">اختر الصفة الهلالية...</label>
          <select class="form-select " id="jop_title_id" name="jop_title_id">
            <option value="0" {{$lists['profiles'] -> jop_title_id == 0 ? 'selected' : ''}}>-</option>
            @foreach ($lists['jop_titles'] as $jop_title)
              <option value="{{$jop_title -> id}}" {{$lists['profiles'] -> jop_title_id == $jop_title -> id  ? 'selected' : ''}}>{{$jop_title -> jop_title . ' - ' . $jop_title -> jop_title_en}}</option>
            @endforeach
          </select>
        </div>
        <div class="col-12 ">
          <label class="m-2"> المنصب</label>
          <input type="text" class="form-control" id="position" name="position" value="{{$lists['profiles'] -> position}}">
        </div>
        <div class="col-12">
          <label class="m-2">تاريخ التطوع</label>
          <input type="date" class="form-control" id="volunteering_date" name="volunteering_date" value="{{$lists['profiles'] -> volunteering_date}}">
        </div>
        <div class="col-12">
          <label class="m-2">تاريخ التوظيف</label>
          <input type="date" class="form-control" id="hire_date" name="hire_date" value="{{$lists['profiles'] -> hire_date}}">
        </div>
        <div class="col-12 ">
          <label class="m-2"> الاسم الكامل باللغة الانكليزية</label>
          <input type="text" class="form-control" id="full_name_en" name="full_name_en" value="{{$lists['profiles'] -> full_name_en}}">
        </div>
        <div class="col-12 ">
          <label class="m-2"> المنصب باللغة الالنكليزية</label>
          <input type="text" class="form-control" id="position_en" name="position_en" value="{{$lists['profiles'] -> position_en}}">
        </div>
        <div class="col-12 ">
          <label class="m-2"> مقاس الحذاء</label>
          <input type="number" class="form-control" id="shoes_size" name="shoes_size" value="{{$lists['profiles'] -> shoes_size}}">
        </div>
        <div class="col-12 ">
          <label class="m-2"> مقاس الخصر</label>
          <input type="number" class="form-control" id="waist_size" name="waist_size" value="{{$lists['profiles'] -> waist_size}}">
        </div>
        <div class="col-12 ">
          <label class="m-2">اختر مقاس الكتفين...</label>
          <select class="form-select " id="shoulders_size" name="shoulders_size">
            <option value="-" {{$lists['profiles']-> shoulders_size == '-'  ? 'selected' : ''}}>-</option>
            <option value="Small" {{$lists['profiles']-> shoulders_size == 'Small'  ? 'selected' : ''}}>Small</option>
            <option value="Medium" {{$lists['profiles']-> shoulders_size == 'Medium'  ? 'selected' : ''}}>Medium</option>
            <option value="Larg" {{$lists['profiles']-> shoulders_size == 'Larg'  ? 'selected' : ''}}>Larg</option>
            <option value="XLarge" {{$lists['profiles']-> shoulders_size == 'XLarge'  ? 'selected' : ''}}>XLarge</option>
            <option value="XXLarge" {{$lists['profiles']-> shoulders_size == 'XXLarge'  ? 'selected' : ''}}>XXLarge</option>
          </select>
        </div>
      </div>
        <div class="col-12 mw-100">
            <button type="submit" class="block">حفظ التعديلات</button>
          </div>
        </div>
  </form>
</div>
</div>
@endsection