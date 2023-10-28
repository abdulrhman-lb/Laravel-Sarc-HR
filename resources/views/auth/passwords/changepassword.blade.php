@extends('layouts.app')

@section('content')
@if (session()->has('message'))
    <div class="container alert alert-danger" role="alert">
        {{session()->get('message')}}
    </div> 
@endif
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('إعادة تعيين كلمة المرور') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('update_password') }}">
                        @csrf
                        @method('POST')
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('كلمة المرور الحالية') }}</label>

                            <div class="col-md-6">
                                <input id="curent_password" type="password" class="form-control @error('curent_password') is-invalid @enderror" name="curent_password" autocomplete="new-password">

                                @error('curent_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="new_password" class="col-md-4 col-form-label text-md-end">{{ __('كلمة المرور الجديدة') }}</label>

                            <div class="col-md-6">
                                <input id="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" name="new_password" autocomplete="new-password">

                                @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password_confirm" class="col-md-4 col-form-label text-md-end">{{ __('تأكيد كلمة المرور الجديدة') }}</label>

                            <div class="col-md-6">
                                <input id="password_confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" autocomplete="new-password">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('تغيير كلمة المرور') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
