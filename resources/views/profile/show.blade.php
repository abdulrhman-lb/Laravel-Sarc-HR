@extends('layouts.app')

@section('content')
@if (session()->has('message'))
<div class="container alert alert-success" role="alert">
    {{session()->get('message')}}
</div> 
@endif
<div class="container containerlist"> 
  <h5 class="d-flex fw-bold justify-content-center px-1 containerlist">المعلومات الشخصية</h5>
  <table class="table">   
    @php
      $image = '';
      if (($lists['profiles'] -> image) == '' ) {
        $image = 'non_m.png';
          if (($lists['profiles'] -> gender) == 'Female-أنثى') {
            $image = 'non_f.png';
          }
          
      } else {
          $image = 'profiles/' . $lists['profiles'] -> image; 
      }
    @endphp
    <tr class="pt-3 ">
        <td class="centered-content pb-3" colspan="4"><img src="/images/{{$image}}" style=" float: none;" class="img-pro" alt="..."></td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">الفرع</td>
      <td class="centered-content">{{$lists['profiles']-> branch->branch}}</td>
      <td class="centered-content">{{$lists['profiles']->branch->branch_en}}</td>
      <td class="fw-bold centered-content">Branch</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">الشعبة</td>
      <td class="centered-content">{{$lists['profiles']->sub_branch->sub_branch}}</td>
      <td class="centered-content">{{$lists['profiles']->sub_branch->sub_branch_en}}</td>
      <td class="fw-bold centered-content">Sub Branch</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">النقطة</td>
      <td class="centered-content">{{$lists['profiles'] -> point}}</td>
      <td class="centered-content">-</td>
      <td class="fw-bold centered-content">Point</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">القسم</td>
      <td class="centered-content">{{$lists['profiles']-> department->department}}</td>
      <td class="centered-content">{{$lists['profiles']->department->department_en. ' - ' . $lists['profiles']->department->department_short}}</td>
      <td class="fw-bold centered-content">Department</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">الاسم الكامل</td>
      <td class="centered-content">{{$lists['profiles'] -> first_name . ' ' . $lists['profiles'] -> last_name}}</td>
      <td class="centered-content">{{$lists['profiles'] -> full_name_en}}</td>
      <td class="fw-bold centered-content">Full Name</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">اسم الأب</td>
      <td class="centered-content">{{$lists['profiles'] -> father_name}}</td>
      <td class="centered-content">-</td>
      <td class="fw-bold centered-content">Father Name</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">اسم الأم</td>
      <td class="centered-content">{{$lists['profiles'] -> mother_name}}</td>
      <td class="centered-content">-</td>
      <td class="fw-bold centered-content">Mother Name</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">الرقم الوطني</td>
      <td class="centered-content">{{$lists['profiles'] -> national_number }}</td>
      <td class="centered-content">-</td>
      <td class="fw-bold centered-content">National Number</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">الجنس</td>
      <td class="centered-content">{{$lists['profiles'] -> gender -> gender}}</td>
      <td class="centered-content">{{$lists['profiles'] -> gender -> gender_en}}</td>
      <td class="fw-bold centered-content">Gender</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">مكان الولادة</td>
      <td class="centered-content">{{$lists['profiles'] -> birth_place}}</td>
      <td class="centered-content">-</td>
      <td class="fw-bold centered-content">Birth Place</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">تاريخ الولادة</td>
      <td class="centered-content">{{$lists['profiles'] -> birth_date}}</td>
      <td class="centered-content">-</td>
      <td class="fw-bold centered-content">Birth Date</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">الحالة الاجتماعية</td>
      <td class="centered-content">{{$lists['profiles'] -> marital_status -> marital_status}}</td>
      <td class="centered-content">{{$lists['profiles'] -> marital_status -> marital_status_en}}</td>
      <td class="fw-bold centered-content">Merital Status</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">رقم الموبايل</td>
      <td class="centered-content">{{$lists['profiles'] -> mobile_phone }}</td>
      <td class="centered-content">-</td>
      <td class="fw-bold centered-content">Mobile Number</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">رقم الهاتف</td>
      <td class="centered-content">{{$lists['profiles'] -> phone}}</td>
      <td class="centered-content">-</td>
      <td class="fw-bold centered-content">Phone Number</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">البريد الالكتروني</td>
      <td class="centered-content">{{$lists['profiles'] -> email }}</td>
      <td class="centered-content">-</td>
      <td class="fw-bold centered-content">E-mail</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">الشهادة العلمية</td>
      <td class="centered-content">{{$lists['profiles']->certificate->certificate}}</td>
      <td class="centered-content">{{$lists['profiles']->certificate->certificate_en }}</td>
      <td class="fw-bold centered-content">Certificate</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">تفاصيل الشهادة العلمية </td>
      <td class="centered-content">{{$lists['profiles'] -> certificate_details}}</td>
      <td class="centered-content">-</td>
      <td class="fw-bold centered-content">Certificate Details</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">الصفة الهلالية</td>
      <td class="centered-content">{{$lists['profiles'] -> jop_title -> jop_title}}</td>
      <td class="centered-content">{{$lists['profiles'] -> jop_title -> jop_title_en}}</td>
      <td class="fw-bold centered-content">Jop Title</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">المنصب</td>
      <td class="centered-content">{{$lists['profiles'] -> position}}</td>
      <td class="centered-content">{{$lists['profiles'] -> position_en}}</td>
      <td class="fw-bold centered-content">Position</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">تاريخ التطوع</td>
      <td class="centered-content">{{$lists['profiles'] -> volunteering_date}}</td>
      <td class="centered-content"></td>
      <td class="fw-bold centered-content">Volunnteering Date</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">تاريخ التوظيف</td>
      <td class="centered-content">{{$lists['profiles'] -> hire_date}}</td>
      <td class="centered-content">-</td>
      <td class="fw-bold centered-content">Hire Date</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">زمرة الدم</td>
      <td class="centered-content">{{$lists['profiles'] -> blood_group}}</td>
      <td class="centered-content">-</td>
      <td class="fw-bold centered-content">Blood Group</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">مقاس الحذاء</td>
      <td class="centered-content">{{$lists['profiles'] -> shoes_size}}</td>
      <td class="centered-content">-</td>
      <td class="fw-bold centered-content">Shoes Size</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">مقاس الخصر</td>
      <td class="centered-content">{{$lists['profiles'] -> waist_size}}</td>
      <td class="centered-content">-</td>
      <td class="fw-bold centered-content">Wist Size</td>
    </tr>
    <tr class="pt-3 ">
      <td class="fw-bold centered-content">مقاس الكتفين</td>
      <td class="centered-content">{{$lists['profiles'] -> shoulders_size}}</td>
      <td class="centered-content">-</td>
      <td class="fw-bold centered-content">Shoulders Size</td>
    </tr>
  </table>
  <div class="form-floating">
    <a href="/profile/{{$lists['profiles'] -> user_id}}/edit"><button type="button" class="block">تعديل الملف الشخصي</button></a>
  </div>

  <table class="table table-bordered mt-3">
    <tr>
        <th class="centered-content" colspan="8">الدورات التدريبيبة المتبعة</th>
    </tr>
    <tr>
        <th class="centered-content">#</th>
        <th class="centered-content">اسم الدورة</th>
        <th class="centered-content">مكان التدريب</th>
        <th class="centered-content">تاريخ بدء التدريب</th>
        <th class="centered-content">تاريخ نهاية التدريب</th>
        <th class="centered-content">عدد أيام التدريب</th>
        <th class="centered-content">المدربين</th>
        <th class="centered-content" colspan="3"><a href="/mytraining?tr=0&pr={{$lists['profiles'] -> id}}"><button type="button" class="btn btn-success my-1">إضافة دورة جديدة</button></a></th>
    </tr>
    @php
        $count = 0;
    @endphp
    @foreach ($lists['trainees'] as $trainee)        
        <tr class="pt-3 ">
            @php
                $count++;
            @endphp
            <td class="fw-bold centered-content">{{$count}}</td>
            <td class="centered-content">{{$trainee -> training_course -> training -> training . ' - ' . $trainee -> training_course -> training -> training_en}}</td>
            <td class="centered-content">{{$trainee -> training_course -> training_place}}</td>
            <td class="centered-content">{{$trainee -> training_course -> training_date_start }}</td>
            <td class="centered-content">{{$trainee -> training_course -> training_date_end }}</td>
            <td class="centered-content">{{$trainee -> training_course -> training_days_number }}</td>
            <td class="centered-content">
            <table class="table table-bordered">
              @foreach ($trainee -> training_course -> training_trainer as $trainer)  
                <tr>
                  <td>
                    {{$trainer -> trainer -> trainer}} 
                    <br>
                    {{$trainer -> trainer -> trainer_en}} 
                  </td>
                </tr>
              @endforeach
            </table>
          </td>
            <td class="centered-content">
              <form action="{{action('DeleteTraininController@destroy', $trainee -> id)}}" method="POST">
                  @csrf
                  @method("DELETE")
                  <button type="submit" class="btn btn-danger my-1" onclick ="return confirm('هل تريد بالتأكيد حذف هذا الدورة من الدورات المتبعة ؟')"><i class="fa fa-trash"></i></button>  
              </form>  
          </td>
        </tr>
    @endforeach
  </table>

  <table class="table table-bordered mt-3">
    <tr>
        <th class="centered-content" colspan="8">العقوبات</th>
    </tr>
    <tr>
        <th class="centered-content">#</th>
        <th class="centered-content">العقوبة</th>
        <th class="centered-content">تاريخ العقوبة</th>
        <th class="centered-content">مصدر العقوبة</th>
        <th class="centered-content">سبب العقوبة</th>
    </tr>
    @php
        $count = 0;
    @endphp
    @foreach ($lists['penalties'] as $penalty)        
        <tr class="pt-3 ">
            @php
                $count++;
            @endphp
            <td class="fw-bold centered-content">{{$count}}</td>
            <td class="centered-content">{{$penalty-> penalty_name -> penalty_name}}</td>
            <td class="centered-content">{{$penalty-> penalty_date}}</td>
            <td class="centered-content">{{$penalty-> penalty_source}}</td>
            <td class="centered-content">{{$penalty-> penalty_reason}}</td>
        </tr>
    @endforeach
  </table>
</div>
@endsection