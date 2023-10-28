@extends('layouts.app')

@section('content')
    <div class="container containerlist">
        <h4 class="d-flex fw-bold justify-content-center py-3">هذا المستخدم لا يملك ملف شخصي بعد ...</h4>
        <a href="/profile/create"><button type="submit" class="block my-3">إنشاء ملف شخصي</button></a>
    </div>
@endsection