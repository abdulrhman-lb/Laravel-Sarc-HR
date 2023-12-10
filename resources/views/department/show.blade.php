@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row row-cols-1 row-cols-md-1 g-4">
        <div class="col">
          <div class="card h-100 border-primary">
            <div class="card-header text-bg-light fw-bold">{{$departments -> department. ' - ' . $departments -> department_en}}</div>
            <div class="card-body">
                <table>
                    <tr>
                        <td class="fw-bold fs-6 p-3" style="width: 20%">الرمز : </td>
                        <td class="fs-6">{{$departments -> department_short}}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold fs-6 p-3">الوصف : </td>
                        <td class="fs-6">{{$departments -> department_information}}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold fs-6 p-3">الجهة المانحة : </td>
                        <td class="fs-6">{{$departments -> donor}}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold fs-6 p-3">اسم المنسق  : </td>
                        <td class="fs-6">{{$departments -> coordinator_name}}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold fs-6 p-3">رقم جوال المنسق : </td>
                        <td class="fs-6">{{$departments -> coordinator_mobile}}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold fs-6 p-3">البريد الالكتروني للمنسق : </td>
                        <td class="fs-6">{{$departments -> coordinator_email}}</td>
                    </tr>
                    <tr>
                        <td class="fw-bold fs-6 p-3">العنوان : </td>
                        <td class="fs-6">{{$departments -> department_address}}</td>
                    </tr>
                </table>
            </div>
            <a href="/teams" class="btn btn-primary">عودة لصفحة الفرق والأقسام</a>
          </div>
        </div>
    </div>
@endsection

