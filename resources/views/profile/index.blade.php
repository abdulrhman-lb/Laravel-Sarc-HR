@extends('layouts.app')

@section('content')
@if (session()->has('message'))
    <div class="container alert alert-success" role="alert">
        {{session()->get('message')}}
    </div> 
@endif

<div class="container">
    <h5 class="d-flex fw-bold justify-content-center pb-1">قائمة الموظفين</h5>
    <div>
        <button type="button" class="fw-bold collapsible">تصفية حسب...</button>
        <div class="content ">    
            <form action="/profile" method="get" class="containerlist">

                <div class="row row-cols-lg-4 g-4 align-items-center mb-3 " style="width: 75%; float: right;">

                    <div class="col-12">
                        <label class="m-1">الفرع</label>
                        <select class="form-select" id="branch_id" name="br" >
                            <option value="" selected>-</option>
                            @foreach ($lists['branches'] as $branch)
                                <option value="{{$branch -> id}}" {{$lists['branch_selected'] == $branch -> id  ? 'selected' : ''}}>{{$branch -> branch . ' - ' . $branch -> branch_en}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="m-1">الشعبة</label>
                        <select class="form-select" id="sub_branch_id" name="sb" >
                        <option value="" selected>-</option>
                        @foreach ($lists['sub_branches'] as $sub_branch)
                            <option value="{{$sub_branch -> id}}" {{$lists['sub_branch_selected'] == $sub_branch -> id  ? 'selected' : ''}}>{{$sub_branch -> sub_branch . ' - ' . $sub_branch -> sub_branch_en}}</option>
                        @endforeach
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="m-1">القسم</label>
                        <select class="form-select " id="department_id" name="dp">
                            <option value="" selected>-</option>
                            @foreach ($lists['departments'] as $department)
                            <option value="{{$department -> id}}" {{$lists['department_selected'] == $department -> id  ? 'selected' : ''}}>{{$department -> department . ' - ' . $department -> department_en}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="m-1"> الاسم </label>
                        <input type="text" class="form-control " id="first_name" name="nm" value="{{$lists['first_name_selected']}}">
                    </div>

                    <div class="col-12">
                        <label class="m-1"> الكنية </label>
                        <input type="text" class="form-control " id="last_name" name="ln" value="{{$lists['last_name_selected']}}">
                    </div>    

                    <div class="col-12">
                        <label class="m-1">الجنس</label>
                        <select class="form-select " id="gender_id" name="gn">
                            <option value="" selected>-</option>
                            @foreach ($lists['genders'] as $gender)
                            <option value="{{$gender -> id}}" {{$lists['gender_selected'] == $gender -> id  ? 'selected' : ''}}>{{$gender -> gender . ' - ' . $gender -> gender_en}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="m-1">الحالة الاجتماعية</label>
                        <select class="form-select" id="marital_status_id" name="ms">
                            <option selected value="">-</option>
                            @foreach ($lists['marital_statuses'] as $marital_status)
                            <option value="{{$marital_status -> id}}" {{$gender -> id}}" {{$lists['marital_status_selected'] == $marital_status -> id  ? 'selected' : ''}}>{{$marital_status -> marital_status . ' - ' . $marital_status -> marital_status_en}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="m-1">الشهادة العلمية</label>
                        <select class="form-select" id="certificate_id" name="cf">
                            <option selected value="">-</option>
                            @foreach ($lists['certificates'] as $certificate)
                            <option value="{{$certificate -> id}}" {{$certificate -> id}}" {{$lists['certificate_selected'] == $certificate -> id  ? 'selected' : ''}}>{{$certificate -> certificate . ' - ' . $certificate -> certificate_en}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12"> 
                        <label class="m-1">تفاصيل الشهادة العلمية</label>
                        <input type="text" class="form-control" id="certificate_details" name="cd" value="{{$lists['certificate_details_selected']}}">  
                    </div>

                    <div class="col-12">
                        <label class="m-1">حسب الصفة الهلالية</label>
                        <select class="form-select" id="jop_title_id" name="jt">
                            <option selected value="">-</option>
                            @foreach ($lists['jop_titles'] as $jop_title)
                            <option value="{{$jop_title -> id}}" {{$lists['jop_title_selected'] == $jop_title -> id  ? 'selected' : ''}}>{{$jop_title -> jop_title . ' - ' . $jop_title -> jop_title_en}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-12">
                        <label class="m-1">الحالة</label>
                        <select class="form-select" id="ac" name="ac">    
                            <option value="-" {{$lists['active_selected'] == '-'  ? 'selected' : ''}}>-</option>
                            <option value="0" {{$lists['active_selected'] == '0'  ? 'selected' : ''}}>غير فعال</option>
                            <option value="1" {{$lists['active_selected'] == '1'  ? 'selected' : ''}}>فعال</option>
                        </select>
                    </div>

                </div>

                <div class="align-items-center mb-3 containerlist" style="width: 25%; float: left;">
                    <div class="col-12">
                        <label class="m-2">فرز حسب</label>
                        <select class="form-select" id="sort" name="sort" >
                            <option value="" selected>-</option>
                            <option value="first_name" {{$lists['sort_selected'] == 'first_name'  ? 'selected' : ''}}>الاسم</option>
                            <option value="last_name" {{$lists['sort_selected'] == 'last_name'  ? 'selected' : ''}}>الكنية</option>
                            <option value="branch_id" {{$lists['sort_selected'] == 'branch_id'  ? 'selected' : ''}}>الفرع</option>
                            <option value="sub_branch_id" {{$lists['sort_selected'] == 'sub_branch_id'  ? 'selected' : ''}}>الشعبة</option>
                            <option value="department_id" {{$lists['sort_selected'] == 'department_id'  ? 'selected' : ''}}>القسم</option>
                            <option value="gender_id" {{$lists['sort_selected'] == 'gender_id'  ? 'selected' : ''}}>الجنس</option>
                            <option value="marital_status_id" {{$lists['sort_selected'] == 'marital_status_id'  ? 'selected' : ''}}>الحالة الاجتماعية</option>
                            <option value="certificate_id" {{$lists['sort_selected'] == 'certificate_id'  ? 'selected' : ''}}>الشهادة العلمية</option>
                            <option value="jop_title_id" {{$lists['sort_selected'] == 'jop_title_id'  ? 'selected' : ''}}>الصفة الهلالية</option>
                            <option value="birth_place" {{$lists['sort_selected'] == 'birth_place'  ? 'selected' : ''}}>تاريخ الميلاد</option>
                            <option value="volunteering_date" {{$lists['sort_selected'] == 'volunteering_date'  ? 'selected' : ''}}>تاريخ التطوع</option>
                            <option value="hire_date" {{$lists['sort_selected'] == 'hire_date'  ? 'selected' : ''}}>تاريخ التوظيف</option>
                        </select>
                    </div>
                    <br>
                    <div class="col-12">
                        <label class="m-2">نوع الفرز</label>
                        <select class="form-select" id="order" name="order" >
                            <option value="asc" {{$lists['order_selected'] == 'asc'  ? 'selected' : ''}}>تصاعدي</option>
                            <option value="desc" {{$lists['order_selected'] == 'desc'  ? 'selected' : ''}}>تنازلي</option>
                        </select>
                    </div>
                    <br>
                </div>

                <div class="row row-cols-lg-2 g-2 align-items-center mb-3" style="width: 100%; float: inline-start; justify-self: center;">
                    
                    <div class="col-12">
                        <button type="submit" class="block">تطبيق عوامل التصفية والفرز</button>
                    </div>

                    <div class="col-12">
                        <a href="/profile?br=&sb=&dp=&nm=&ln=&gn=&ms=&cf=&cd=&jt=&ac=-&sort=&order=asc"><button type="button" class="block">تصفير عوامل التصفية والفرز</button></a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    @foreach ($lists['profiles'] as $profile)  
        @php
            $image = '';
            if (($profile -> image) == '' ) {
                $image = 'non_m.png';
            } else {
                $image = 'profiles/' . $profile -> image; 
            }
        @endphp      
        <div class="container containerlist">
            <img src="/images/{{$image}}" alt="Avatar" class="img-pro-show">
            <div style="display : inline-block;">
                <span class="fw-bold">{{$profile -> first_name . ' ' . $profile -> father_name . ' ' . $profile -> last_name}}</span>
                <div class="activ-button">
                    @if ($profile -> jop_title_id == 1)
                        <a href="/profile?br=&sb=&dp=&nm=&ln=&gn=&ms=&cf=&cd=&jt=1&ac=-&sort=&order=asc"><div class="badge bg-info text-dark">{{$profile-> jop_title -> jop_title}}</div></a>
                    @else
                        <a href="/profile?br=&sb=&dp=&nm=&ln=&gn=&ms=&cf=&cd=&jt=2&ac=-&sort=&order=asc"><div class="badge bg-warning text-dark">{{$profile-> jop_title -> jop_title}}</div></a>
                    @endif 
                    @if ($profile->user->active == '1')
                        <a href="/profile?br=&sb=&dp=&nm=&ln=&gn=&ms=&cf=&cd=&jt=&ac=1&sort=&order=asc"><div class="badge bg-success">فعال</div></a>
                    @else
                        <a href="/profile?br=&sb=&dp=&nm=&ln=&gn=&ms=&cf=&cd=&jt=&ac=0&sort=&order=asc"><div class="badge bg-danger">غير فعال</div></a>
                    @endif 
                    @if ($profile->user->role == '1')
                        <i class="fa fa-star checked" aria-hidden="true"></i>
                    @endif 
                </div>
                <br>
                <span class="fs-6 my-5"> فرع:{{$profile-> branch->branch . ' - الشعبة:' . $profile->sub_branch->sub_branch }}</span>
                <br>
                <span class="fs-6 my-5"> {{$profile-> department->department . ' - ' . $profile->department->department_en . ' - ' . $profile->department->department_short}}</span>
                <br>
                <span class="fs-6"> {{$profile-> position . ' - ' . $profile->position_en}}</span>
            </div>
            <div class="containerbutton" style="display : inline-block;">
                <form action="{{action('ProfilesController@destroy', $profile -> id)}}" method="POST">
                    @csrf
                    @method("DELETE")
                    <a href="/profile/{{$profile -> user_id}}"><button type="button" class="btn btn-primary my-1"><i class="fa fa-eye"></i></button></a>
                    <a href="/profile/{{$profile -> user_id}}/edit"><button type="button" class="btn btn-success my-1"><i class="fa fa-edit"></i></button></a>
                    <button type="submit" class="btn btn-danger my-1" onclick ="return confirm('هل تريد بالتأكيد حذف هذا الملف الشخصي ؟')"><i class="fa fa-trash"></i></button>  
                    <a href="conf/{{$profile -> user_id}}"><button type="button" class="btn btn-info my-1"><i class="fa fa-user"></i></button></a>
                </form> 
            </div>
            {{-- <div class="pe-2"> --}}
            {{-- </div> --}}
        </div>
    @endforeach
</div>
    {{-- <div class="container">
        
        <table class="table table-bordered">
            <tr>
                <th class="centered-content">#</th>
                <th class="centered-content">الصورة الشخصية</th>
                <th class="centered-content">الاسم الكامل</th>
                <th class="centered-content">اسم الأب</th>
                <th class="centered-content">متطوع/موظف</th>
                <th class="centered-content">القسم</th>
                <th class="centered-content">-</th>
            </tr>
            @php
                $count = 0;
            @endphp
            @foreach ($profiles as $profile)        
                <tr class="pt-3 ">
                    @php
                        $count++;
                    @endphp
                    <td class="fw-bold centered-content">{{$count}}</td>
                    @php
                        $image = '';
                        if (($profile -> image) == '' ) {
                            $image = 'non_m.png';
                        } else {
                            $image = 'profiles/' . $profile -> image; 
                        }
                    @endphp
                    <td class="centered-content"><img src="/images/{{$image}}" class="img-pro-list" alt="..."></td>
                    <td class="centered-content">{{$profile -> first_name . ' ' . $profile -> last_name}}</td>
                    <td class="centered-content">{{$profile -> father_name}}</td>
                    <td class="centered-content">{{$profile -> jop_title -> jop_title . ' - ' . $profile -> jop_title -> jop_title_en}}</td>
                    <td class="centered-content">{{$profile-> department->department}} <br> {{$profile->department->department_en . ' - ' . $profile->department->department_short}}</td>
                    <td class="centered-content">
                        <button type="button" class="btn btn-primary my-1"><i class="fa fa-eye"></i></button>
                        <button type="button" class="btn btn-success my-1""><i class="fa fa-edit"></i></button>
                        <button type="button" class="btn btn-danger my-1""><i class="fa fa-trash"></i></button>    
                    </a></td>
                </tr>
            @endforeach
        </table>
    </div> --}}
@endsection