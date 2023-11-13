@extends('layouts.app')

@section('content')
@if (session()->has('message'))
    <div class="container alert alert-warning" role="alert">
        {{session()->get('message')}}
    </div> 
@endif
    <div class="container">
        <h5 class="d-flex fw-bold justify-content-center pb-3">جدول الدورات التدريبية</h5>
        <div>
            <button type="button" class="fw-bold collapsible"> تصفية حسب...  </button>
            <div class="content ">    
                <form action="/training" method="get" class="containerlist">
    
                    <div class="row row-cols-lg-5 g-5 align-items-center mb-3 ">
    
                        <div class="col-12">
                            <label class="m-1">اسم الدورة</label>
                            <select class="form-select" id="training_id" name="tn" >
                                <option value="" selected>-</option>
                                @foreach ($lists['training'] as $training)
                                    <option value="{{$training -> id}}" {{$lists['training_selected'] == $training -> id  ? 'selected' : ''}}>{{$training -> training  . ' - ' . $training -> training_en}}</option>
                                @endforeach
                            </select>
                        </div>
    
                        <div class="col-12">
                            <label class="m-1"> مكان التدريب </label>
                            <input type="text" class="form-control " id="training_place" name="tp" value="{{$lists['training_place_selected']}}">
                        </div>
                        <div class="col-12">
                            <label class="m-2">التاريخ من</label>
                            <input type="text" class="form-control  @error('td1') is-invalid @enderror" id="training_date_start1" name="td1" value="{{$lists['training_date_start1_selected']}}">
                            @error('td1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
 
                        <div class="col-12">
                            <label class="m-2">التاريخ إلى</label>
                            <input type="text" class="form-control @error('td2') is-invalid @enderror" id="training_date_start2" name="td2" value="{{$lists['training_date_start2_selected']}}">
                            @error('td2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        
    
                        <div class="col-12 ">
                            <label class="m-2">فرز حسب</label>
                            <select class="form-select" id="sort" name="sort" >
                                <option value="" selected>-</option>
                                <option value="training_id" {{$lists['sort_selected'] == 'training_id'  ? 'selected' : ''}}>اسم الدورة</option>
                                <option value="training_place" {{$lists['sort_selected'] == 'training_place'  ? 'selected' : ''}}>مكان التدريب</option>
                                <option value="training_date_start" {{$lists['sort_selected'] == 'training_date_start'  ? 'selected' : ''}}>تاريخ بداية الدورة</option>
                                <option value="training_days_number" {{$lists['sort_selected'] == 'training_days_number'  ? 'selected' : ''}}>عدد أيام التدريب</option>
                            </select>
                        {{-- </div>
                        <br>
                        <div class="col-12"> --}}
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
                            <a href="/training?tn=&tp=&td=&sort=&order=asc"><button type="button" class="block">تصفير عوامل التصفية والفرز</button></a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <table class="table table-bordered mt-3">
            <tr>
                <th class="centered-content">#</th>
                <th class="centered-content">اسم الدورة</th>
                <th class="centered-content">مكان التدريب</th>
                <th class="centered-content">تاريخ التدريب</th>
                <th class="centered-content" colspan="3"><a href="/training/create"><button type="button" class="btn btn-success my-1">إضافة دورة جديدة</button></a></th>
            </tr>
            @php
                $count = 0;
            @endphp
            @foreach ($lists['trainings'] as $training)        
                <tr class="pt-3 ">
                    @php
                        $count++;
                    @endphp
                    <td class="fw-bold centered-content">{{$count}}</td>
                    <td class="centered-content">{{$training -> training  . ' - '. $training -> training_en}}</td>
                    <td class="centered-content">{{$training -> training_place}}</td>
                    <td class="centered-content">{{$training -> training_date_start}}</td>
                    <td class="centered-content">
                        <form action="{{action('TrainingCourseController@destroy', $training -> id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <a href="/const/training/{{$training -> id}}"><button type="button"  title="عرض تفاصيل الدورة" class="btn btn-primary my-1 "><i class="fa fa-eye"></i></button></a>
                            <a href="/const/training/{{$training -> id}}/edit"><button type="button"  title="تعديل بيانات الدورة" class="btn btn-success my-1"><i class="fa fa-edit"></i></button></a>
                            <button type="submit" class="btn btn-danger my-1" onclick ="return confirm('هل تريد بالتأكيد حذف هذا الدورة التدريبية ؟')"><i class="fa fa-trash"></i></button>  
                            <span class="m-2">|</span>
                            <a href="trainee/{{$training -> id}}"><button type="button" title="المتدربين" class="btn btn-info my-1 notification"><i class="fas fa-book-reader"></i><span class="badge">{{$training -> trainee_count}}</span></button></a>
                            <a href="trainer/{{$training -> id}}"><button type="button" title="المدربين" class="btn btn-warning my-1 notification"><i class="fas fa-chalkboard-teacher"></i><span class="badge">{{$training -> trainers_count}}</span></button></a>
                        </form>  
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection