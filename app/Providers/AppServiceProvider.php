<?php

namespace App\Providers;

use App\Models\department;
use App\Models\leave_names;
use App\Models\Profile;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            if (auth()->check()) {
                $approve = Profile::where('user_id', auth()->user()->id)->first();
                if ($approve) {
                    $test = 0;
                    $hr_approve = leave_names::where('hr_approve_id', $approve -> id)->get();
                    if (!$hr_approve->isEmpty()) {
                        $test = 1;
                    }
            
                    $mang_approve = leave_names::where('mang_approve_id', $approve -> id)->get();
                    if (!$mang_approve->isEmpty()) {
                        $test = 1;
                    }
            
                    $coor_approve = department::where('coordinator_id', $approve -> id)->get();
                    if (!$coor_approve->isEmpty()) {
                        $test = 1;
                    }
                    } else {
                        $test = 0;
                    }
        
                    $view->with('approve', $test);
                }
        });






        if (!is_null(auth()->user())){
        $approve = Profile::where('user_id', auth()->user()->id)->first();
        $test = 0;
        $hr_approve = leave_names::where('hr_approve_id', $approve -> id)->get();
        if (!$hr_approve->isEmpty()) {
            $test = 1;
        }

        $mang_approve = leave_names::where('mang_approve_id', $approve -> id)->get();
        if (!$mang_approve->isEmpty()) {
            $test = 1;
        }

        $coor_approve = department::where('coordinator_id', $approve -> id)->get();
        if (!$coor_approve->isEmpty()) {
            $test = 1;
        }
        } else {
            $test = 0;
        }
        View::share('approve', $test);

    }
}
