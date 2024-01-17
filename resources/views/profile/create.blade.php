@extends('layouts.app')

@section('content')
<div class="container"> 
  <h5 class="d-flex fw-bold justify-content-center pb-3">المعلومات الشخصية</h5>
  <form action="/profile" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="containerr">
        <img src="/images/non_m.png" class="img-pro my-4" id="image_preview">
        <div class="middle @error('image') is-invalid @enderror">
          <label>
            <span class="block" id="choose-image">تغيير الصورة</span>
            <input type="file" id="image" name="image" class="hidden-image">
          </label>
        </div>
        @error('image')
        <span class="invalid-feedback text-center" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
      </div>

      <div class="row row-cols-lg-3 g-3 align-items-center mb-3">

        <div class="col-12">
          <label class="m-2">اختر الفرع...</label>
          <select class="form-select @error('branch_id') is-invalid @enderror" id="branch_id" name="branch_id" >
            <option>-</option>
            @foreach ($lists['branches'] as $branch)
              <option value="{{$branch -> id}}" {{ $branch -> id == old('branch_id') ? 'selected' : ''}}>{{$branch -> branch . ' - ' . $branch -> branch_en}}</option>
            @endforeach
          </select>
          @error('branch_id')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="col-12">
          <label class="m-2">اختر الشعبة...</label>
          <select class="form-select @error('sub_branch_id') is-invalid @enderror" id="sub_branch_id" name="sub_branch_id">
            <option>-</option>
          </select>
          @error('sub_branch_id')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="col-12">
          <label class="m-2">النقطة</label>
          <input type="text" class="form-control" id="point" name="point" value="{{ old('point') }}">
        </div>

        <div class="col-12">
          <label class="m-2">اختر القسم...</label>
          <select class="form-select @error('department_id') is-invalid @enderror" id="department_id" name="department_id">
            <option>-</option>
            @foreach ($lists['departments'] as $department)
              <option value="{{$department -> id}}" {{ $department -> id == old('department_id') ? 'selected' : ''}}>{{$department -> department . ' - ' . $department -> department_en}}</option>
            @endforeach
          </select>
          @error('department_id')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

      </div>

      <div class="row row-cols-lg-3 g-3 align-items-center mb-3">

        <div class="col-12">
          <label class="m-2">الاسم الأول</label>
          <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name') }}">
          @error('first_name')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="col-12">
          <label class="m-2">الكنية</label>
          <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name') }}">
          @error('last_name')
              <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
              </span>
          @enderror
        </div>

        <div class="col-12">
          <label class="m-2">اسم الأب</label>
          <input type="text" class="form-control @error('father_name') is-invalid @enderror" id="father_name" name="father_name" value="{{ old('father_name') }}">
          @error('father_name')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="col-12">
          <label class="m-2">اسم الأم</label>
          <input type="text" class="form-control @error('mother_name') is-invalid @enderror" id="mother_name" name="mother_name" value="{{ old('mother_name') }}">
          @error('mother_name')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="col-12">
          <label class="m-2">الرقم الوطني</label>
          <input type="text" class="form-control @error('national_number') is-invalid @enderror" id="national_number" name="national_number" value="{{ old('national_number') }}">
          @error('national_number')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="col-12">
          <label class="m-2">اختر الجنس...</label>
          <select class="form-select @error('gender_id') is-invalid @enderror" id="gender_id" name="gender_id">
            <option>-</option>
            @foreach ($lists['genders'] as $gender)
              <option value="{{$gender -> id}}" {{ $gender -> id == old('gender_id') ? 'selected' : ''}}>{{$gender -> gender . ' - ' . $gender -> gender_en}}</option>
            @endforeach
          </select>
          @error('gender_id')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="col-12">
          <label class="m-2">مكان الولادة</label>
          <input type="text" class="form-control @error('birth_place') is-invalid @enderror" id="birth_place" name="birth_place" value="{{ old('birth_place') }}">
          @error('birth_place')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="col-12">
          <label class="m-2">تاريخ الولادة</label>
          <input type="text" class="form-control @error('birth_date') is-invalid @enderror" id="birth_date" name="birth_date" value="{{ old('birth_date') }}">
          @error('birth_date')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="col-12 ">
          <label class="m-2">اختر زمرة الدم...</label>
          <select class="form-select @error('blood_group') is-invalid @enderror" id="blood_group" name="blood_group">
            <option value="">-</option>
            <option value="A+" {{old('blood_group') == 'A+' ? 'selected' : ''}}>A+</option>
            <option value="A-" {{old('blood_group') == 'A-' ? 'selected' : ''}}>A-</option>
            <option value="B+" {{old('blood_group') == 'B+' ? 'selected' : ''}}>B+</option>
            <option value="B-" {{old('blood_group') == 'B-' ? 'selected' : ''}}>B-</option>
            <option value="AB-" {{old('blood_group') == 'AB+' ? 'selected' : ''}}>AB-</option>
            <option value="AB+" {{old('blood_group') == 'AB-' ? 'selected' : ''}}>AB+</option>
            <option value="O+" {{old('blood_group') == 'O+' ? 'selected' : ''}}>O+</option>
            <option value="O-" {{old('blood_group') == 'O-' ? 'selected' : ''}}>O-</option>
          </select>
          @error('blood_group')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="col-12">
          <label class="m-2">اختر الحالة الاجتماعية...</label>
          <select class="form-select @error('marital_status_id') is-invalid @enderror" id="marital_status_id" name="marital_status_id">
            <option selected value="">-</option>
            @foreach ($lists['marital_statuses'] as $marital_status)
              <option value="{{$marital_status -> id}}"  {{ $marital_status -> id == old('marital_status_id') ? 'selected' : ''}}>{{$marital_status -> marital_status . ' - ' . $marital_status -> marital_status_en}}</option>
            @endforeach
          </select>
          @error('marital_status_id')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>

      <div class="row row-cols-lg-3 g-3 align-items-center mb-3">

        <div class="col-12">
          <label class="m-2"> الموبايل</label>
          <input type="text" class="form-control @error('mobile_phone') is-invalid @enderror" id="mobile_phone" name="mobile_phone" value="{{ old('mobile_phone') }}">
          @error('mobile_phone')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="col-12">
          <label class="m-2">الهاتف </label>
          <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
          @error('phone')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="col-12">
          <label class="m-2">البريد الالكتروني</label>
          <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
          @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="col-12">
          <label class="m-2">اختر الشهادة العلمية...</label>
          <select class="form-select @error('certificate_id') is-invalid @enderror" id="certificate_id" name="certificate_id">
            <option selected value="">-</option>
            @foreach ($lists['certificates'] as $certificate)
              <option value="{{$certificate -> id}}" {{ $certificate -> id == old('certificate_id') ? 'selected' : ''}}>{{$certificate -> certificate . ' - ' . $certificate -> certificate_en}}</option>
            @endforeach
          </select>
          @error('certificate_id')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="col-12"> 
          <label class="m-2">تفاصيل الشهادة العلمية</label>
          <input type="text" class="form-control" id="certificate_details" name="certificate_details" value="{{ old('certificate_details') }}">
        </div>

      </div>

      <div class="row row-cols-lg-3 g-3 align-items-center mb-3">

        <div class="col-12">
          <label class="m-2">اختر الصفة الهلالية...</label>
          <select class="form-select @error('jop_title_id') is-invalid @enderror" id="jop_title_id" name="jop_title_id">
            <option selected value="">-</option>
            @foreach ($lists['jop_titles'] as $jop_title)
              <option value="{{$jop_title -> id}}" {{ $jop_title -> id == old('jop_title_id') ? 'selected' : ''}}>{{$jop_title -> jop_title . ' - ' . $jop_title -> jop_title_en}}</option>
            @endforeach
          </select>
          @error('jop_title_id')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="col-12 ">
          <label class="m-2"> المنصب</label>
          <input type="text" class="form-control" id="position" name="position" value="{{ old('position') }}">
        </div>

        <div class="col-12">
          <label class="m-2">تاريخ التطوع</label>
          <input type="text" class="form-control @error('volunteering_date') is-invalid @enderror" id="volunteering_date" name="volunteering_date" value="{{ old('volunteering_date') }}">
          @error('volunteering_date')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="col-12">
          <label class="m-2">تاريخ التوظيف</label>
          <input type="text" class="form-control @error('hire_date') is-invalid @enderror" id="hire_date" name="hire_date" value="{{ old('hire_date') }}">
          @error('hire_date')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="col-12 ">
          <label class="m-2"> الاسم الكامل باللغة الانكليزية</label>
          <input type="text" class="form-control @error('full_name_en') is-invalid @enderror" id="full_name_en" name="full_name_en" value="{{ old('full_name_en') }}">
          @error('full_name_en')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>

        <div class="col-12 ">
          <label class="m-2"> المنصب باللغة الانكليزية</label>
          <input type="text" class="form-control" id="position_en" name="position_en" value="{{ old('position_en') }}">
        </div>

        <div class="col-12 ">
          <label class="m-2"> مقاس الحذاء</label>
          <input type="number" class="form-control" id="shoes_size" name="shoes_size" value="{{ old('shoes_size') }}">
        </div>

        <div class="col-12 ">
          <label class="m-2"> مقاس الخصر</label>
          <input type="number" class="form-control" id="waist_size" name="waist_size" value="{{ old('waist_size') }}">
        </div>

        <div class="col-12 ">
          <label class="m-2">اختر مقاس الكتفين...</label>
          <select class="form-select " id="shoulders_size" name="shoulders_size">
            <option value="">-</option>
            <option value="Small" {{old('shoulders_size') == 'Small' ? 'selected' : ''}}>Small</option>
            <option value="Medium" {{old('shoulders_size') == 'Medium' ? 'selected' : ''}}>Medium</option>
            <option value="Larg" {{old('shoulders_size') == 'Larg' ? 'selected' : ''}}>Larg</option>
            <option value="XLarge" {{old('shoulders_size') == 'XLarge' ? 'selected' : ''}}>XLarge</option>
            <option value="XXLarge" {{old('shoulders_size') == 'XXLarge' ? 'selected' : ''}}>XXLarge</option>
          </select>
        </div>
        
      </div>

      <div class="col-12 mw-100">
        <button type="submit" class="block">حفظ البيانات الشخصية</button>
      </div>
  </form>
</div>
@endsection