@extends('layouts.app')

@section('content')
<style>
  .t-r{
  justify-content: flex-end; 
}
</style>
<div class="container"> 
    <h4 class="d-flex fw-bold justify-content-center pb-3">المعلومات الشخصية</h4>

    {{-- ------------------------------------------------------------------------------- --}}
    <form action="/profile" method="POST" enctype="multipart/form-data">
      @csrf
      <div class="containerr">
        <img src="/images/non_m.png" class="img-pro my-4" id="image_preview">
        <div class="middle">
          <label>
            <span class="block" id="choose-image">تغيير الصورة</span>
            <input type="file" id="image" name="image" class="hidden-image">
          </label>
        </div>
      </div>
      <div class="row row-cols-lg-3 g-3 align-items-center mb-3">
        <div class="col-12">
          <div class="form-floating mb-3">
            <select class="form-select " id="branch_id" name="branch_id">
              <option value="0">-</option>
                @foreach ($lists['branches'] as $branch)
                  <option value="{{$branch -> id}}">{{$branch -> branch . ' - ' . $branch -> branch_en}}</option>
                @endforeach
            </select>
            <label>اختر الفرع...</label>
          </div>
        </div>
        <div class="col-12">
          <div class="form-floating mb-3">
            <select class="form-select " id="sub_branch_id" name="sub_branch_id">
              <option value="0">-</option>
            </select>
            <label>اختر الشعبة...</label>
          </div>
        </div>
        <div class="col-12">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="point" name="point" placeholder="النقطة">
            <label>النقطة</label>
          </div>
        </div>
        <div class="col-12">
          <div class="form-floating mb-3">
            <select class="form-select " id="department_id" name="department_id">
              <option selected value="0">-</option>
              @foreach ($lists['departments'] as $department)
                <option value="{{$department -> id}}">{{$department -> department . ' - ' . $department -> department_en}}</option>
              @endforeach
            </select>
            <label>اختر القسم...</label>
          </div>
        </div>
      </div>
      <div class="row row-cols-lg-3 g-3 align-items-center mb-3">
        <div class="col-12">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="الاسم الأول">
            <label>الاسم الأول</label>
          </div>
        </div>
        <div class="col-12">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="الكنية">
            <label>الكنية</label>
          </div>
        </div>
        <div class="col-12">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="father_name" name="father_name" placeholder="اسم الأب">
            <label>اسم الأب</label>
          </div>
        </div>
        <div class="col-12">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="mother_name" name="mother_name" placeholder="اسم الأم">
            <label>اسم الأم</label>
          </div>
        </div>
        <div class="col-12">
        <div class="form-floating mb-3">
          <input type="text" class="form-control" id="national_number" name="national_number" placeholder="الرقم الوطني">
          <label>الرقم الوطني</label>
        </div>
        </div>
        <div class="col-12">
          <div class="form-floating mb-3">
            <select class="form-select " id="gener_id" name="gener_id">
              <option selected value="0">-</option>
              @foreach ($lists['geners'] as $gener)
                <option value="{{$gener -> id}}">{{$gener -> gener . ' - ' . $gener -> gener_en}}</option>
              @endforeach
            </select>
            <label>اختر الجنس...</label>
          </div>
        </div>
        <div class="col-12">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="birth_place" name="birth_place" placeholder="مكان الولادة">
            <label>مكان الولادة</label>
          </div>
        </div>
        <div class="col-12">
          <div class="form-floating mb-3">
            <input type="date" class="form-control" id="birth_date" name="birth_date" placeholder="تاريخ الولادة">
            <label>تاريخ الولادة</label>
          </div>
        </div>
        <div class="col-12 ">
          <div class="form-floating mb-3">
            <select class="form-select " id="blood_group" name="blood_group">
              <option value="A+">A+</option>
              <option value="A-">A-</option>
              <option value="B+">B+</option>
              <option value="B-">B-</option>
              <option value="AB-">AB-</option>
              <option value="AB+">AB+</option>
              <option value="O+">O+</option>
              <option value="O-">O-</option>
            </select>
            <label>اختر زمرة الدم...</label>
          </div>
        </div>
        <div class="col-12">
          <div class="form-floating mb-3">
            <select class="form-select " id="marital_status_id" name="marital_status_id">
              <option selected value="0">-</option>
              @foreach ($lists['marital_statuses'] as $marital_status)
                <option value="{{$marital_status -> id}}">{{$marital_status -> marital_status . ' - ' . $marital_status -> marital_status_en}}</option>
              @endforeach
            </select>
            <label>اختر الحالة الاجتماعية...</label>
          </div>
        </div>
      </div>
      <div class="row row-cols-lg-3 g-3 align-items-center mb-3">
        <div class="col-12">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="mobile_phone" name="mobile_phone" placeholder=" الموبايل">
            <label> الموبايل</label>
          </div>
        </div>
        <div class="col-12">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="phone" name="phone" placeholder="الهاتف">
            <label>الهاتف </label>
          </div>
        </div>
        <div class="col-12">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="email" name="email" placeholder="البريد الالكتروني">
            <label>البريد الالكتروني</label>
          </div>
        </div>
        <div class="col-12">
          <div class="form-floating mb-3">
            <select class="form-select " id="certificate_id" name="certificate_id">
              <option selected value="0">-</option>
              @foreach ($lists['certificates'] as $certificate)
                <option value="{{$certificate -> id}}">{{$certificate -> certificate . ' - ' . $certificate -> certificate_en}}</option>
              @endforeach
            </select>
            <label>اختر الشهادة العلمية...</label>
          </div>
        </div>
        <div class="col-12"> 
          <div class="form-floating mb-3 ">
            <input type="text" class="form-control " id="certificate_details" name="certificate_details" placeholder="تفاصيل الشهادة العلمية">
            <label>تفاصيل الشهادة العلمية</label>
          </div>
        </div>
      </div>
      <div class="row row-cols-lg-3 g-3 align-items-center mb-3">
        <div class="col-12">
          <div class="form-floating mb-3">
            <select class="form-select " id="jop_title_id" name="jop_title_id">
              <option selected value="0">-</option>
              @foreach ($lists['jop_titles'] as $jop_title)
                <option value="{{$jop_title -> id}}">{{$jop_title -> jop_title . ' - ' . $jop_title -> jop_title_en}}</option>
              @endforeach
            </select>
            <label>اختر الصفة الهلالية...</label>
          </div>
        </div>
        <div class="col-12 ">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="position" name="position" placeholder="المنصب">
            <label> المنصب</label>
          </div>
        </div>
        <div class="col-12">
          <div class="form-floating mb-3">
            <input type="date" class="form-control" id="volunteering_date" name="volunteering_date" placeholder="تاريخ التطوع">
            <label>تاريخ التطوع</label>
          </div>
        </div>
        <div class="col-12">
          <div class="form-floating mb-3">
            <input type="date" class="form-control" id="hire_date" name="hire_date" placeholder="تاريخ التوظيف">
            <label>تاريخ التوظيف</label>
          </div>
        </div>
        <div class="col-12 ">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="full_name_en" name="full_name_en" placeholder="الاسم الكامل باللغة الانكليزية">
            <label> الاسم الكامل باللغة الانكليزية</label>
          </div>
        </div>
        <div class="col-12 ">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="position_en" name="position_en" placeholder="المنصب باللغة الالنكليزية">
            <label> المنصب باللغة الالنكليزية</label>
          </div>
        </div>
        <div class="col-12 ">
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="shoes_size" name="shoes_size" placeholder="مقاس الحذاء">
            <label> مقاس الحذاء</label>
          </div>
        </div>
        <div class="col-12 ">
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="waist_size" name="waist_size" placeholder="مقاس الخصر">
            <label> مقاس الخصر</label>
          </div>
        </div>
        <div class="col-12 ">
          <div class="form-floating mb-3">
            <select class="form-select " id="shoulders_size" name="shoulders_size">
              <option value="Small">Small</option>
              <option value="Medium">Medium</option>
              <option value="Larg">Larg</option>
              <option value="XLarge">XLarge</option>
              <option value="XXLarge">XXLarge</option>
            </select>
            <label>اختر مقاس الكتفين...</label>
          </div>
        </div>
      </div>
        <div class="col-12 mw-100">
          <div class="form-floating mb-3">
            <button type="submit" class="block">حفظ البيانات الشخصية</button>
          </div>
        </div>
  </form>
</div>
    {{-- -------------------------------------------------------------------------------- --}}
</div>
@endsection