<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\SubBranchController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\GenerController;
use App\Http\Controllers\MaritalStatusController;
use App\Http\Controllers\JopTitleController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\Auth\ConfController;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\ActiveMiddleware;


Route::resource('/profile', ProfilesController::class)->middleware('isactive');


route::get('/get-sub', 'SubBranchController@getsub');
Auth::routes();

route::get('conf/{id}',[ConfController::class,'edit'])->middleware('auth', 'isactive', 'isadmin');
route::put('conf/update/{id}',[ConfController::class,'update'])->middleware('auth', 'isactive', 'isadmin');

route::prefix('const')->middleware('auth', 'isadmin')->group(function(){
    route::resource('/branch',BranchController::class);
    route::resource('/subbranch',SubBranchController::class);
    route::resource('/certificate',CertificateController::class);
    route::resource('/gener',GenerController::class);
    route::resource('/maritalstatus',MaritalStatusController::class);
    route::resource('/joptitle',JopTitleController::class);
    route::resource('/department',DepartmentController::class);
});


route::get('change-password', 'Auth\ChangePasswordController@change_password') -> name('change_password');
route::post('update-password', 'Auth\ChangePasswordController@update_password') -> name('update_password');

route::get('/', function () { return view('index'); });
route::get('/upload/image', [ImageController::class,'ImageUpload'])->name('ImageUpload');
