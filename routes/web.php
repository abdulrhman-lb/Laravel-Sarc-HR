<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\SubBranchController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\GenderController;
use App\Http\Controllers\MaritalStatusController;
use App\Http\Controllers\JopTitleController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TrainerController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\TrainingCourseController;
use App\Http\Controllers\DeleteTraininController;
use App\Http\Controllers\Auth\ChangePasswordController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\Auth\ConfController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PenaltyNameController;
use App\Http\Controllers\PenaltyController;
use App\Http\Controllers\TrainingTraineeController;
use App\Http\Controllers\PositionController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\TrainingTrainerController;
use App\Http\Controllers\DepartmentindexController;
use App\Http\Controllers\RewardController;
use App\Http\Controllers\RewardNameController;
use App\Http\Middleware\ActiveMiddleware;


Route::resource('/profile', ProfilesController::class)->middleware('auth', 'isactive', 'isadmin');
Route::resource('/training', TrainingCourseController::class)->middleware('isadmin');
Route::resource('/trainer', TrainingTrainerController::class)->middleware('isadmin');
Route::resource('/trainee', TrainingTraineeController::class)->middleware('isadmin');
Route::resource('/penalty', PenaltyController::class)->middleware('isadmin');
Route::resource('/reward', RewardController::class)->middleware('isadmin');
Route::resource('/position', PositionController::class)->middleware('isadmin');
Route::post('/profile', [ProfilesController::class, 'index'])->middleware('auth', 'isactive', 'isadmin')->name('profile');

Route::resource('/mytraining', DeleteTraininController::class);

route::get('/get-sub', 'SubBranchController@getsub');
route::get('det', 'SubBranchController@det');
Auth::routes();

route::get('conf/{id}',[ConfController::class,'edit'])->middleware('auth', 'isactive', 'isadmin');
route::put('conf/update/{id}',[ConfController::class,'update'])->middleware('auth', 'isactive', 'isadmin');

route::prefix('const')->middleware('auth', 'isadmin')->group(function(){
    route::resource('/branch',BranchController::class);
    route::resource('/penalty',PenaltyNameController::class);
    route::resource('/reward',RewardNameController::class);
    route::resource('/subbranch',SubBranchController::class);
    route::resource('/certificate',CertificateController::class);
    route::resource('/gender',GenderController::class);
    route::resource('/maritalstatus',MaritalStatusController::class);
    route::resource('/joptitle',JopTitleController::class);
    route::resource('/department',DepartmentController::class);
    route::resource('/trainer',TrainerController::class);
    route::resource('/training',TrainingController::class);
});

route::resource('/teams',TeamController::class);

route::get('change-password', 'Auth\ChangePasswordController@change_password') -> name('change_password');
route::post('update-password', 'Auth\ChangePasswordController@update_password') -> name('update_password');

route::get('/', 'DepartmentindexController@index');
route::get('/upload/image', [ImageController::class,'ImageUpload'])->name('ImageUpload');
Route::get('generate-pdf', [App\Http\Controllers\PDFController::class, 'generatePDF']);
Route::get('/export-Profile',[ProfilesController::class,'exportProfile'])->middleware('isadmin')->name('export-Profiles');