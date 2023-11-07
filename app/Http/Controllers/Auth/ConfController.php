<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ConfController extends Controller
{
    public function edit(string $id)
    {
        return view('auth.edit')->with('users', User::where('id', $id)->first());
    }

    public function update(Request $request, string $id)
    {
        if ($request->password = null ) {
            $request -> validate(['password' => ['min:8']]);
    } 
        if ($request->password = null ) {
            user::where('id', $id)
                ->update([
                    'active' => $request -> active,
                    'role' => $request -> role,
                ]);
        } else {
            user::where('id', $id)
            ->update([
                'active' => $request -> active,
                'role' => $request -> role,
                'password' => Hash::make($request['password']),
            ]);
            return redirect('/profile') -> with('message', 'تم تعديل بيانات المستخدم بنجاح');
        }
    }
}
