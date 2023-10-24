@extends('layouts.app')

@section('content')
<style>
  .t-r{
  justify-content: flex-end; 
}
</style>
<div class="container"> 
    <h4 class="d-flex fw-bold justify-content-center pb-3">المعلومات الشخصية</h4>
    {{-- <div class="containerr">
      <img src="/images/1.jpg" class="img-pro my-4" alt="...">
    </div> --}}
    {{-- ------------------------------------------------------------------------------- --}}
    <table class="table table-borderless">   
          @php
            $image = '';
            if (($profile -> image) == '' ) {
              $image = 'non_m.png';
                if (($profile -> gener) == 'Female-أنثى') {
                  $image = 'non_f.png';
                }
                
            } else {
                $image = 'profiles/' . $profile -> image; 
            }
          @endphp
        <tr class="pt-3 ">
            <td class="centered-content" colspan="2"><img src="/images/{{$image}}" class="img-pro" alt="..."></td>
        </tr>
        <tr class="pt-3 ">
          <td class="fw-bold centered-content">الفرع</td>
          <td class="centered-content">{{$profile-> branch->branch . ' - ' . $profile->branch->branch_en}}</td>
        </tr>
        <tr class="pt-3 ">
          <td class="fw-bold centered-content">الشعبة</td>
          <td class="centered-content">{{$profile->sub_branch->sub_branch . ' - ' . $profile->sub_branch->sub_branch_en}}</td>
        </tr>
        <tr class="pt-3 ">
          <td class="fw-bold centered-content">النقطة</td>
          <td class="centered-content">{{$profile -> point}}</td>
        </tr>
        <tr class="pt-3 ">
          <td class="fw-bold centered-content">القسم</td>
          <td class="centered-content">{{$profile-> department->department}} <br> {{$profile->department->department_en . ' - ' . $profile->department->department_short}}</td>
        </tr>
        <tr class="pt-3 ">
          <td class="fw-bold centered-content">الاسم الكامل</td>
          <td class="centered-content">{{$profile -> first_name . ' ' . $profile -> last_name}}</td>
        </tr>
        <tr class="pt-3 ">
          <td class="fw-bold centered-content">اسم الأب</td>
          <td class="centered-content">{{$profile -> father_name}}</td>
        </tr>
        <tr class="pt-3 ">
          <td class="fw-bold centered-content">اسم الأم</td>
          <td class="centered-content">{{$profile -> mother_name}}</td>
        </tr>
        <tr class="pt-3 ">
          <td class="fw-bold centered-content">الرقم الوطني</td>
          <td class="centered-content">{{$profile -> national_number }}</td>
        </tr>
        <tr class="pt-3 ">
          <td class="fw-bold centered-content">الجنس</td>
          <td class="centered-content">{{$profile -> gener -> gener . ' - ' . $profile -> gener -> gener_en}}</td>
        </tr>
        <tr class="pt-3 ">
          <td class="fw-bold centered-content">مكان الولادة</td>
          <td class="centered-content">{{$profile -> birth_place}}</td>
        </tr>
        <tr class="pt-3 ">
          <td class="fw-bold centered-content">تاريخ الولادة</td>
          <td class="centered-content">{{$profile -> birth_date}}</td>
        </tr>
        <tr class="pt-3 ">
          <td class="fw-bold centered-content">الحالة الاجتماعية</td>
          <td class="centered-content">{{$profile -> marital_status -> marital_status . ' - ' . $profile -> marital_status -> marital_status_en}}</td>
        </tr>
        <tr class="pt-3 ">
          <td class="fw-bold centered-content">رقم الموبايل</td>
          <td class="centered-content">{{$profile -> mobile_phone }}</td>
        </tr>
        <tr class="pt-3 ">
          <td class="fw-bold centered-content">رقم الهاتف</td>
          <td class="centered-content">{{$profile -> phone}}</td>
        </tr>
        <tr class="pt-3 ">
          <td class="fw-bold centered-content">البريد الالكتروني</td>
          <td class="centered-content">{{$profile -> email }}</td>
        </tr>
        <tr class="pt-3 ">
          <td class="fw-bold centered-content">الشهادة العلمية</td>
          <td class="centered-content">{{$profile->certificate->certificate . ' - ' . $profile->certificate->certificate_en }}</td>
        </tr>
        <tr class="pt-3 ">
          <td class="fw-bold centered-content">تفاصيل الشهادة العلمية </td>
          <td class="centered-content">{{$profile -> certificate_details}}</td>
        </tr>
        <tr class="pt-3 ">
          <td class="fw-bold centered-content">الصفة الهلالية</td>
          <td class="centered-content">{{$profile -> jop_title -> jop_title . ' - ' . $profile -> jop_title -> jop_title_en}}</td>
        </tr>
        <tr class="pt-3 ">
          <td class="fw-bold centered-content">المنصب</td>
          <td class="centered-content">{{$profile -> position}}</td>
        </tr>
        <tr class="pt-3 ">
          <td class="fw-bold centered-content">تاريخ التطوع</td>
          <td class="centered-content">{{$profile -> volunteering_date}}</td>
        </tr>
        <tr class="pt-3 ">
          <td class="fw-bold centered-content">تاريخ التوظيف</td>
          <td class="centered-content">{{$profile -> hire_date}}</td>
        </tr>
        <tr class="pt-3 ">
          <td class="fw-bold centered-content">زمرة الدم</td>
          <td class="centered-content">{{$profile -> blood_group}}</td>
        </tr>
        <tr class="pt-3 ">
          <td class="fw-bold centered-content">الاسم الكامل باللغة الالنكليزية</td>
          <td class="centered-content">{{$profile -> full_name_en}}</td>
        </tr>
        <tr class="pt-3 ">
          <td class="fw-bold centered-content">المنصف باللغة الانكليزية</td>
          <td class="centered-content">{{$profile -> position_en}}</td>
        </tr>
        <tr class="pt-3 ">
          <td class="fw-bold centered-content">مقاس الحذاء</td>
          <td class="centered-content">{{$profile -> shoes_size}}</td>
        </tr>
        <tr class="pt-3 ">
          <td class="fw-bold centered-content">مقاس الخصر</td>
          <td class="centered-content">{{$profile -> waist_size}}</td>
        </tr>
        <tr class="pt-3 ">
          <td class="fw-bold centered-content">مقاس الكتفين</td>
          <td class="centered-content">{{$profile -> shoulders_size}}</td>
        </tr>
    </table>
    {{-- -------------------------------------------------------------------------------- --}}
</div>
@endsection