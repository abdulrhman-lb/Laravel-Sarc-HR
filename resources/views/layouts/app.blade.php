<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl" lang="ar">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Tajawal" rel="stylesheet">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js']) 
    <script src="https://kit.fontawesome.com/accc23eac4.js" crossorigin="anonymous"></script>

</head>
<body>
    <div >
        <nav class="navbar navbar-expand-md bg-white shadow-sm " >
            <div class="container  ">
                <a class="navbar-brand text-center" href="{{ url('/') }}">
                    <strong>الهلال الأحمر العربي السوري</strong>
                    <br>
                    <strong>فرع حماة </strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse fw-bold fs-6 " id="navbarSupportedContent">
                    @if (auth()-> check())
                        @if (auth()->user()-> active == '1')
                            <ul class="navbar-nav mr-auto text-center">
                                <li class="nav-item">
                                    <a class="nav-link" href="/profile/{{auth()->user()->id}}" >الملف الشخصي</a>    
                                </li>
                                @if ((auth()->user()-> role == '1') || (auth()->user()-> role == '2') || (auth()->user()-> role == '3'))
                                    <form action="{{route('profile')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="ac">
                                        <li class="nav-item">
                                            <button type="submit" name="clear" class="nav-link">قائمة الموظفين</button>
                                        </li>
                                    </form>
                                @endif
                                @if ((auth()->user()-> role == '1') || $approve == 1 || (auth()->user()-> role == '2') || (auth()->user()-> role == '3') || (auth()->user()-> role == '4'))
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                            الأنشطة والاجراءات
                                        </a>
                                        <ul class="dropdown-menu">
                                            @if ((auth()->user()-> role == '1') || (auth()->user()-> role == '3'))
                                                <li><a class="dropdown-item text-right" href="/training?tn=&tp=&td=&sort=&order=asc">الدورات التدريبية</a></li>
                                            @endif
                                            @if ((auth()->user()-> role == '1') || (auth()->user()-> role == '3'))
                                                <li><hr class="dropdown-divider"></li>
                                            @endif
                                            @if ((auth()->user()-> role == '1') || (auth()->user()-> role == '3'))
                                                <li><a class="dropdown-item" href="/reward">المكافئات</a></li>
                                            @endif
                                            @if ((auth()->user()-> role == '1') || (auth()->user()-> role == '3'))
                                                <li><a class="dropdown-item" href="/penalty">العقوبات</a></li>
                                            @endif
                                            @if ((auth()->user()-> role == '1') || (auth()->user()-> role == '3'))
                                                <li><hr class="dropdown-divider"></li>
                                            @endif
                                            @if ((auth()->user()-> role == '1') || (auth()->user()-> role == '3'))
                                                <li><a class="dropdown-item" href="/position">السيرة الهلال</a></li>
                                            @endif
                                            @if ((auth()->user()-> role == '1') || (auth()->user()-> role == '3'))
                                                <li><hr class="dropdown-divider"></li>
                                            @endif
                                            @if (($approve == 1) || (auth()->user()-> role == '1') || (auth()->user()-> role == '2') || (auth()->user()-> role == '3'))
                                                <li><a class="dropdown-item" href="{{route('leave-approve')}}">الاجازات</a></li>
                                            @endif
                                            @if ((auth()->user()-> role == '1') || (auth()->user()-> role == '4'))
                                                <li><a class="dropdown-item" href="#">الاشتراكات السنوية</a></li>
                                            @endif
                                        </ul> 
                                    </li> 
                                @endif
                                    @if ((auth()->user()-> role == '1') || (auth()->user()-> role == '3'))
                                    <li class="nav-item dropdown">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                          ثوابت البرنامج
                                        </a>
                                        <ul class="dropdown-menu">
                                            @if (auth()->user()-> role == '1')      
                                                <li><a class="dropdown-item text-right" href="/const/branch">جدول الفروع</a></li>
                                                <li><a class="dropdown-item" href="/const/subbranch">جدول الشعب</a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item" href="/const/department">جدول الأقسام</a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item" href="/const/certificate">جدول الشهادات العلمية</a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item" href="/const/maritalstatus">جدول الحالة الاجتماعية</a></li>
                                                <li><a class="dropdown-item" href="/const/gender">جدول الجنس</a></li>
                                                <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item" href="/const/joptitle">جدول الصفة الهلالية</a></li>
                                                <li><hr class="dropdown-divider"></li>
                                            @endif
                                            @if ((auth()->user()-> role == '1') || (auth()->user()-> role == '3'))
                                                <li><a class="dropdown-item" href="/const/trainer">جدول المدربين</a></li>
                                                <li><a class="dropdown-item" href="/const/training">جدول الدورات التدريبية</a></li>
                                            @endif
                                            @if (auth()->user()-> role == '1')
                                            <li><hr class="dropdown-divider"></li>
                                                <li><a class="dropdown-item" href="/const/penalty">جدول العقوبات</a></li>
                                                <li><a class="dropdown-item" href="/const/reward">جدول المكافئات</a></li>
                                                <li><a class="dropdown-item" href="/const/leave">جدول الإجازات</a></li>
                                            @endif

                                        </ul>
                                    </li>
                                @endif
                                <li class="nav-item">
                                    <a class="nav-link" href="/teams" >الفرق والأقسام</a>    
                                </li>
                                {{-- <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        الفرق والأقسام
                                      </a>   
                                      <ul class="dropdown-menu">
                                        @foreach ($departments as $department)
                                            
                                        <li><a class="dropdown-item text-right" href="/const/branch">{{$department -> department}}</a></li>
                                        @endforeach
                                    </ul>
                                </li> --}}
                            </ul>
                        @endif
                    @endif
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav fw-bold me-auto text-center">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item ">
                                    <a class="nav-link " href="{{ route('login') }}">{{ __('تسجيل دخول') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link font-taj" href="{{ route('register') }}">{{ __('تسجيل') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                
                                <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('change_password')}}">
                                        {{ __('تغيير كلمة المرور') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('تسجيل خروج') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
            {{-- @include('layouts.tabs') --}}
        <main class="py-4">
            @yield('content')
        </main>
        <div>
            @include('layouts.footer')
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>/
</body>
</html>
