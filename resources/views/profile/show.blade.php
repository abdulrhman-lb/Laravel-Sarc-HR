@extends('layouts.app')

@section('content')
@if (session()->has('message'))
<div class="container alert alert-success" role="alert">
    {{session()->get('message')}}
</div> 
@endif
<div class="container containerlist"> 
  <h5 class="d-flex fw-bold justify-content-center px-1 containerlist header-tables">المعلومات الشخصية</h5>
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

{{-- // الإجازات --}}
<table class="table table-bordered mt-3">
  <tr>
      <th class="centered-content header-tables" colspan="9">الإجازات</th>
  </tr>
  <tr>
      <th class="centered-content">#</th>
      <th class="centered-content">نوع الإجازة</th>
      <th class="centered-content">من تاريخ</th>
      <th class="centered-content">إلى تاريخ</th>
      <th class="centered-content">موافقة المنسق</th>
      <th class="centered-content">موافقة الموارد البشرية</th>
      <th class="centered-content">موافقة الإدارة</th>
      @if ((auth()->user()-> role == '0') || (auth()->user()-> role == '1') || (auth()->user()-> role == '3'))
      <th class="centered-content" colspan="3">
        <form action="/leave/create" method="get">
          <input type="hidden" name="id" value="{{$lists['profiles'] -> id}}">
          <button type="submit" class="btn btn-success my-1">طلب إجازة</button>
        </form>
      </th>
      @endif
  </tr>
  @php
      $count = 0;
  @endphp
  @foreach ($lists['leaves'] as $leave)        
      <tr class="pt-3 ">
          @php
              $count++;
          @endphp
          <td class="fw-bold centered-content ">{{$count}}</td>
          <td class="centered-content">{{$leave -> leave_names -> leave_name}}</td>
          <td class="centered-content">{{$leave -> start_date }}</td>
          <td class="centered-content">{{$leave -> end_date }}</td>
          <td class="centered-content">
            @if ($leave -> coor_approved == null)
              <label class="fw-bold text-danger">انتظار الموافقة</label>
            @else
              <label class="fw-bold text-success">مع الموافقة</label> 
              <br>
              <label class="fw-bold text-success">{{$leave -> coor -> first_name . ' ' . $leave -> coor -> last_name}}</label>
            @endif
          </td>

          <td class="centered-content">
            @if ($leave -> hr_approved == null)
              <label class="fw-bold text-danger">انتظار الموافقة</label>
            @else
              <label class="fw-bold text-success">مع الموافقة</label> 
              <br>
              <label class="fw-bold text-success">{{$leave -> hr -> first_name . ' ' . $leave -> hr -> last_name}}</label>
            @endif
          </td>

          <td class="centered-content">
            @if ($leave -> mang_approved == null)
              <label class="fw-bold text-danger">انتظار الموافقة</label>
            @else
              <label class="fw-bold text-success">مع الموافقة</label> 
              <br>
              <label class="fw-bold text-success">{{$leave -> mang -> first_name . ' ' . $leave -> mang -> last_name}}</label>
            @endif
          </td>
          <td class="centered-content fw-bold {{(($leave -> coor_approved !== null) && ($leave -> hr_approved !== null) && ($leave -> mang_approved !== null)) ? 'text-success' : 'text-danger'}}">{{(($leave -> coor_approved !== null) && ($leave -> hr_approved !== null) && ($leave -> mang_approved !== null)) ? 'تم استكمال الموافقات' : 'لم تستكمل الموافقات بعد' }}</td>
          @if ((auth()->user()-> role == '0') || (auth()->user()-> role == '1') || (auth()->user()->id == $lists['profiles']->user_id))
            <td class="centered-content">
              <form action="/leave/{{$leave -> id}}" method="POST">
                @csrf
                <input type="hidden" name="profile_id" value="{{$lists['profiles'] -> id}}">
                @method("DELETE")
                @if (($leave -> coor_approved == null) || ($leave -> hr_approved == null) || ($leave -> mang_approved == null))
                <button type="submit" class="btn btn-danger my-1 " onclick ="return confirm('هل تريد بالتأكيد حذف هذه الإجازة ؟')"><i class="fa fa-trash"></i></button>  
                @endif
              </form>  
            </td>
          @endif
        </td>
      </tr>
  @endforeach
</table>

{{-- // الدورات التدريبية --}}
  <table class="table table-bordered mt-3">
    <tr>
        <th class="centered-content header-tables" colspan="8">الدورات التدريبيبة المتبعة</th>
    </tr>
    <tr>
        <th class="centered-content">#</th>
        <th class="centered-content">اسم الدورة</th>
        <th class="centered-content">مكان التدريب</th>
        <th class="centered-content">تاريخ بدء التدريب</th>
        <th class="centered-content">تاريخ نهاية التدريب</th>
        <th class="centered-content">عدد أيام التدريب</th>
        <th class="centered-content">المدربين</th>
        @if ((auth()->user()-> role == '0') || (auth()->user()-> role == '1') || (auth()->user()-> role == '3') || (auth()->user()->id == $lists['profiles']->user_id))
          <th class="centered-content" colspan="3"><a href="/mytraining?tr=0&pr={{$lists['profiles'] -> id}}"><button type="button" class="btn btn-success my-1">إضافة دورة جديدة</button></a></th>
        @endif
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
          @if ((auth()->user()-> role == '0') || (auth()->user()-> role == '1') || (auth()->user()-> role == '3') || (auth()->user()->id == $lists['profiles']->user_id))
            <td class="centered-content">
              <form action="{{action('DeleteTraininController@destroy', $trainee -> id)}}" method="POST">
                  @csrf
                  @method("DELETE")
                  <button type="submit" class="btn btn-danger my-1" onclick ="return confirm('هل تريد بالتأكيد حذف هذا الدورة من الدورات المتبعة ؟')"><i class="fa fa-trash"></i></button>  
              </form>  
            </td> 
          @endif
        </tr>
    @endforeach
  </table>


{{-- // المكافئات --}}
  <table class="table table-bordered mt-3">
    <tr>
        <th class="centered-content header-tables" colspan="8">المكافئات</th>
    </tr>
    <tr>
        <th class="centered-content">#</th>
        <th class="centered-content">المكافئة</th>
        <th class="centered-content">تاريخ المكافئة</th>
        <th class="centered-content">مصدر المكافئة</th>
        <th class="centered-content">سبب المكافئة</th>
    </tr>
    @php
        $count = 0;
    @endphp
    @foreach ($lists['rewards'] as $reward)        
        <tr class="pt-3 ">
            @php
                $count++;
            @endphp
            <td class="fw-bold centered-content">{{$count}}</td>
            <td class="centered-content">{{$reward-> reward_name -> reward_name}}</td>
            <td class="centered-content">{{$reward-> reward_date}}</td>
            <td class="centered-content">{{$reward-> reward_source}}</td>
            <td class="centered-content">{{$reward-> reward_reason}}</td>
        </tr>
    @endforeach
  </table>


{{-- // العقوبات --}}
  <table class="table table-bordered mt-3">
    <tr>
        <th class="centered-content header-tables" colspan="8">العقوبات</th>
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


{{-- // السيرة الهلالية --}}
  <table class="table table-bordered mt-3">
    <tr>
        <th class="header-tables centered-content " colspan="8">السيرة الهلالية</th>
    </tr>
    <tr>
        <th class="centered-content">#</th>
        <th class="centered-content">القسم</th>
        <th class="centered-content">المنصب</th>
        <th class="centered-content">المنصب بالانكليزية</th>
        <th class="centered-content">الصفة الهلالية</th>
        <th class="centered-content">تاريخ البدء</th>
        <th class="centered-content">تاريخ الانتهاء</th>
    </tr>
    @php
        $count = 0;
    @endphp
    @foreach ($lists['positions'] as $position)        
        <tr class="pt-3 ">
            @php
                $count++;
                $i = 0;
                if ($position -> end_date == "1900-01-01") {
                          $end_date='حتى الآن';
                          $i = 1;
                        } else {
                            $end_date=$position -> end_date;}
            @endphp
            <td class="fw-bold centered-content">{{$count}}</td>
            <td class="centered-content {{$i == 1 ? 'fw-bold' : ''}}">{{$position-> department -> department}}</td>
            <td class="centered-content {{$i == 1 ? 'fw-bold' : ''}}">{{$position-> position}}</td>
            <td class="centered-content {{$i == 1 ? 'fw-bold' : ''}}">{{$position-> position_en}}</td>
            <td class="centered-content {{$i == 1 ? 'fw-bold' : ''}}">{{$position-> jop_title -> jop_title}}</td>
            <td class="centered-content {{$i == 1 ? 'fw-bold' : ''}}">{{$position-> start_date}}</td>
            <td class="centered-content {{$i == 1 ? 'fw-bold' : ''}}">{{$end_date}}</td>
        </tr>
    @endforeach
  </table>


  <div class="form-floating">
    @if ((auth()->user()-> role == '0') || (auth()->user()-> role == '1') || (auth()->user()-> role == '3') || (auth()->user()->id == $lists['profiles']->user_id))
      <a href="/profile/{{$lists['profiles'] -> user_id}}/edit"><button type="button" class="block">تعديل الملف الشخصي</button></a>          
    @endif
  </div>
</div>
@endsection