@extends('layouts.app')

@section('content')
<div class="container containerlist"> 
  <h5 class="d-flex fw-bold justify-content-center px-1 containerlist">المعلومات الشخصية</h5>
  <table class="table">   
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
        <td class="centered-content pb-3" colspan="4"><img src="/images/{{$image}}" style=" float: none;" class="img-pro" alt="..."></td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">الفرع</td>
      <td class="centered-content">{{$profile-> branch->branch}}</td>
      <td class="centered-content">{{$profile->branch->branch_en}}</td>
      <td class="fw-bold centered-content">Branch</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">الشعبة</td>
      <td class="centered-content">{{$profile->sub_branch->sub_branch}}</td>
      <td class="centered-content">{{$profile->sub_branch->sub_branch_en}}</td>
      <td class="fw-bold centered-content">Sub Branch</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">النقطة</td>
      <td class="centered-content">{{$profile -> point}}</td>
      <td class="centered-content">-</td>
      <td class="fw-bold centered-content">Point</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">القسم</td>
      <td class="centered-content">{{$profile-> department->department}}</td>
      <td class="centered-content">{{$profile->department->department_en. ' - ' . $profile->department->department_short}}</td>
      <td class="fw-bold centered-content">Department</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">الاسم الكامل</td>
      <td class="centered-content">{{$profile -> first_name . ' ' . $profile -> last_name}}</td>
      <td class="centered-content">{{$profile -> full_name_en}}</td>
      <td class="fw-bold centered-content">Full Name</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">اسم الأب</td>
      <td class="centered-content">{{$profile -> father_name}}</td>
      <td class="centered-content">-</td>
      <td class="fw-bold centered-content">Father Name</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">اسم الأم</td>
      <td class="centered-content">{{$profile -> mother_name}}</td>
      <td class="centered-content">-</td>
      <td class="fw-bold centered-content">Mother Name</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">الرقم الوطني</td>
      <td class="centered-content">{{$profile -> national_number }}</td>
      <td class="centered-content">-</td>
      <td class="fw-bold centered-content">National Number</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">الجنس</td>
      <td class="centered-content">{{$profile -> gener -> gener}}</td>
      <td class="centered-content">{{$profile -> gener -> gener_en}}</td>
      <td class="fw-bold centered-content">Gener</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">مكان الولادة</td>
      <td class="centered-content">{{$profile -> birth_place}}</td>
      <td class="centered-content">-</td>
      <td class="fw-bold centered-content">Birth Place</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">تاريخ الولادة</td>
      <td class="centered-content">{{$profile -> birth_date}}</td>
      <td class="centered-content">-</td>
      <td class="fw-bold centered-content">Birth Date</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">الحالة الاجتماعية</td>
      <td class="centered-content">{{$profile -> marital_status -> marital_status}}</td>
      <td class="centered-content">{{$profile -> marital_status -> marital_status_en}}</td>
      <td class="fw-bold centered-content">Merital Status</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">رقم الموبايل</td>
      <td class="centered-content">{{$profile -> mobile_phone }}</td>
      <td class="centered-content">-</td>
      <td class="fw-bold centered-content">Mobile Number</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">رقم الهاتف</td>
      <td class="centered-content">{{$profile -> phone}}</td>
      <td class="centered-content">-</td>
      <td class="fw-bold centered-content">Phone Number</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">البريد الالكتروني</td>
      <td class="centered-content">{{$profile -> email }}</td>
      <td class="centered-content">-</td>
      <td class="fw-bold centered-content">E-mail</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">الشهادة العلمية</td>
      <td class="centered-content">{{$profile->certificate->certificate}}</td>
      <td class="centered-content">{{$profile->certificate->certificate_en }}</td>
      <td class="fw-bold centered-content">Certificate</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">تفاصيل الشهادة العلمية </td>
      <td class="centered-content">{{$profile -> certificate_details}}</td>
      <td class="centered-content">-</td>
      <td class="fw-bold centered-content">Certificate Details</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">الصفة الهلالية</td>
      <td class="centered-content">{{$profile -> jop_title -> jop_title}}</td>
      <td class="centered-content">{{$profile -> jop_title -> jop_title_en}}</td>
      <td class="fw-bold centered-content">Jop Title</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">المنصب</td>
      <td class="centered-content">{{$profile -> position}}</td>
      <td class="centered-content">{{$profile -> position_en}}</td>
      <td class="fw-bold centered-content">Position</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">تاريخ التطوع</td>
      <td class="centered-content">{{$profile -> volunteering_date}}</td>
      <td class="centered-content"></td>
      <td class="fw-bold centered-content">Volunnteering Date</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">تاريخ التوظيف</td>
      <td class="centered-content">{{$profile -> hire_date}}</td>
      <td class="centered-content">-</td>
      <td class="fw-bold centered-content">Hire Date</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">زمرة الدم</td>
      <td class="centered-content">{{$profile -> blood_group}}</td>
      <td class="centered-content">-</td>
      <td class="fw-bold centered-content">Blood Group</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">مقاس الحذاء</td>
      <td class="centered-content">{{$profile -> shoes_size}}</td>
      <td class="centered-content">-</td>
      <td class="fw-bold centered-content">Shoes Size</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">مقاس الخصر</td>
      <td class="centered-content">{{$profile -> waist_size}}</td>
      <td class="centered-content">-</td>
      <td class="fw-bold centered-content">Wist Size</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">مقاس الكتفين</td>
      <td class="centered-content">{{$profile -> shoulders_size}}</td>
      <td class="centered-content">-</td>
      <td class="fw-bold centered-content">Shoulders Size</td>
    </tr>
  </table>
  <div class="form-floating">
    <a href="/profile/{{$profile -> user_id}}/edit"><button type="button" class="block">تعديل الملف الشخصي</button></a>
  </div>
</div>
@endsection