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


route::get('/get-sub', 'SubBranchController@getsub');

route::resource('/profile',ProfilesController::class);
route::resource('/const/branch',BranchController::class);
Route::get('branch_export',[BranchController::class, 'get_branch_data'])->name('student.export');
route::resource('/const/subbranch',SubBranchController::class);
route::resource('/const/certificate',CertificateController::class);
route::resource('/const/gener',GenerController::class);
route::resource('/const/maritalstatus',MaritalStatusController::class);
route::resource('/const/joptitle',JopTitleController::class);
route::resource('/const/department',DepartmentController::class);

Route::get('/', function () { return view('index'); });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
