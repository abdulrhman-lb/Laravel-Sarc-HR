<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function change_password()
    {
        return view('auth.passwords.changepassword');
    }

    public function update_password(Request $request)
    {
        $request -> validate([
            'curent_password' => ['required', 'string', 'min:8'],
            'new_password' => ['required', 'string', 'min:8'], 
            'password_confirmation' => ['required', 'string', 'min:8', 'same:new_password'], 
        ]);
        if (Hash::check($request->curent_password, Auth::user()->password)) {
            user::where('id', Auth::user()-> id)
                ->update([
                'password' => bcrypt($request->new_password)
            ]);
            return redirect('/') -> with('message', 'تم تغيير كلمة المرور بنجاح');
        } else {
            return redirect() -> back() -> with('message', 'لم يتم تغيير كلمة المرور .. كلمة المرور الحالية غير صحيحة');
        }
        

        // return view('auth.passwords.changepassword');
    }



    

}
