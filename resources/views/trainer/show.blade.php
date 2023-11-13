@extends('layouts.app')

@section('content')
@if (session()->has('message'))
    <div class="container alert alert-warning" role="alert">
        {{session()->get('message')}}
    </div> 
@endif
    <div class="container">
        <table class="table table-bordered ">
            <tr class="containerlist">
                <th class="centered-content" colspan="5">بيانات الدورة التدريبية</th>
            </tr>
            <tr>
                <th class="centered-content">اسم الدورة</th>
                <th class="centered-content">مكان الدورة</th>
                <th class="centered-content">تاريخ بدء الدورة</th>
                <th class="centered-content">تاريخ نهاية الدورة</th>
                <th class="centered-content">عدد أيام التدريب</th>
            </tr>
            <tr>
                <td class="fw-bold centered-content">{{$lists['training_course'] -> training -> training . ' - ' . $lists['training_course'] -> training -> training_en}}</td>    
                <td class="fw-bold centered-content">{{$lists['training_course'] -> training_place}}</td>    
                <td class="fw-bold centered-content">{{$lists['training_course'] -> training_date_start}}</td>    
                <td class="fw-bold centered-content">{{$lists['training_course'] -> training_date_end}}</td>    
                <td class="fw-bold centered-content">{{$lists['training_course'] -> training_days_number}}</td>    
            </tr>
        </table>
<br>
        <table class="table table-bordered">
            <tr class="containerlist">
                <th class="centered-content " colspan="6">المدربين</th>
            </tr>
            <tr>
                <th class="centered-content">#</th>
                <th class="centered-content">اسم المدرب</th>
                <th class="centered-content">اسم المدرب باللغة الانكليزية</th>
                <th class="centered-content" colspan="3"><a href="/trainer/create?id={{$lists['training_course'] -> id}}"><button type="button" class="btn btn-success my-1">إضافة مدرب جديد للدورة</button></a></th>
            </tr>
            @php
                $count = 0;
            @endphp
            @foreach ($lists['trainers'] as $trainer)        
                <tr class="pt-3 ">
                    @php
                        $count++;
                    @endphp
                    <td class="fw-bold centered-content">{{$count}}</td>
                    <td class="centered-content">{{$trainer -> trainer -> trainer}}</td>
                    <td class="centered-content">{{$trainer -> trainer -> trainer_en}}</td>
                    <td class="centered-content">
                        <form action="{{action('TrainingTrainerController@destroy', $trainer -> id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger my-1" onclick ="return confirm('هل تريد بالتأكيد حذف هذا المدرب من الدورة ؟')"><i class="fa fa-trash"></i></button>  
                        </form>  
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection