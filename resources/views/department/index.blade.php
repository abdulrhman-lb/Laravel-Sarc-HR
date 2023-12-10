@extends('layouts.app')

@section('content')
<div class="container">
    <h5 class="d-flex fw-bold justify-content-center pb-3">الفرق والأقسام في الهلال الأحمر العربي السوري</h5>
    <div class="row row-cols-1 row-cols-md-3 g-4">
        @foreach ($departments as $department)
        <div class="col">
          <div class="card h-100 border-primary">
            <div class="card-header text-bg-light">{{$department -> department}}</div>
            <div class="card-body">
              <h5 class="card-title">{{$department -> department_en}}</h5>
              <p class="card-text">منسق الفريق : {{$department -> coordinator_name}}</p>
            </div>
            <a href="/teams/{{$department -> id}}" class="btn btn-primary">عرض المزيد ...</a>
          </div>
        </div>
        @endforeach
    </div>
</div>
</div>
@endsection

