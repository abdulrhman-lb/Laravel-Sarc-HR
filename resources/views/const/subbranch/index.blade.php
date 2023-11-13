@extends('layouts.app')

@section('content')
@if (session()->has('message'))
    <div class="container alert alert-warning" role="alert">
        {{session()->get('message')}}
    </div> 
@endif
    <div class="container">
        <h5 class="d-flex fw-bold justify-content-center pb-3">جدول الشعب</h5>
        <table class="table table-bordered">
            <tr>
                <th class="centered-content">#</th>
                <th class="centered-content">اسم الشعبة</th>
                <th class="centered-content">اسم الشعبة باللغة الانكليزية</th>
                <th class="centered-content">اسم الفرع التابعة له</th>
                <th class="centered-content" colspan="3"><a href="/const/subbranch/create"><button type="button" class="btn btn-success my-1">إضافة شعبة جديدة</button></a></th>
            </tr>
            @php
                $count = 0;
            @endphp
            @foreach ($sub_branches as $sub_branch)        
                <tr class="pt-3 ">
                    @php
                        $count++;
                    @endphp
                    <td class="fw-bold centered-content">{{$count}}</td>
                    <td class="centered-content">{{$sub_branch -> sub_branch}}</td>
                    <td class="centered-content">{{$sub_branch -> sub_branch_en}}</td>
                    <td class="centered-content">{{$sub_branch -> branch -> branch . ' - ' . $sub_branch -> branch -> branch_en}}</td>
                    <td class="centered-content">
                        <form action="{{action('SubBranchController@destroy', $sub_branch -> id)}}" method="POST">
                            @csrf
                            @method("DELETE")
                            <a href="/const/subbranch/{{$sub_branch -> id}}"><button type="button" class="btn btn-primary my-1"><i class="fa fa-eye"></i></button></a>
                            <a href="/const/subbranch/{{$sub_branch -> id}}/edit"><button type="button" class="btn btn-success my-1"><i class="fa fa-edit"></i></button></a>
                            <button type="submit" class="btn btn-danger my-1" onclick ="return confirm('هل تريد بالتأكيد حذف هذا الشعبة ؟')"><i class="fa fa-trash"></i></button>  
                        </form>  
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection