<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Auth;
use App\Models\Profile;
use App\Models\branch;
use App\Models\sub_branch;
use App\Models\department;
use App\Models\gener;
use App\Models\jop_title;
use App\Models\marital_status;
use App\Models\certificate;
use App\Models\User;
use Illuminate\Validation\Rule;
 
class ProfilesController extends Controller
{
    public function index()
    {
        if ((auth()->user()-> role == '1')) {
            return view('profile.index')->with('profiles', Profile::all());
        } else {
            return redirect('/')->with('message', 'ليس لديك الصلاحيات لعرض هذه الصفحة');
        }
    }

    public function create()
    {
        if (!auth()->check()) {
            return redirect('/');
        }
        $par = ['branches' => branch::orderBy('branch' , 'ASC')->get(),
        'sub_branches' => sub_branch::orderBy('sub_branch' , 'ASC')->get(), 
        'departments' => department::orderBy('department' , 'ASC')->get(),
        'certificates' => certificate::get(),
        'geners' => gener::get(),
        'jop_titles' => jop_title::get(),
        'marital_statuses' => marital_status::get(),
        ];
        $pro = Profile::where('user_id', auth()->user()->id)->first();
        if ($pro == null) {
            return view('profile.create')->with('lists' , $par);
        } else {
            return view('profile.show')->with('profile' , $pro);
        }
    }

    public function store(Request $request)
    {
        $request -> validate([
            'branch_id' => ['required', 'min_digits:1'],
            'department_id' => ['required', 'min_digits:1'],
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'father_name' => ['required', 'string'],
            'mother_name' => ['required', 'string'],
            'national_number' => ['required', 'digits:11', 'numeric', 'unique:Profiles'],
            'gener_id' => ['required', 'min_digits:1'],
            'birth_place' => ['required', 'string'],
            'birth_date' => ['required', 'date'],
            'blood_group' => ['required', 'string'],
            'marital_status_id' => ['required', 'string'],
            'mobile_phone' => ['required', 'digits:10', 'unique:Profiles'],
            'phone' => ['digits:10'],
            'email' => ['required', 'email', 'unique:Profiles'],
            'certificate_id' => ['required', 'min_digits:1'],
            'jop_title_id' => ['required', 'min_digits:1'],
            'volunteering_date' => ['required', 'date'],
            'full_name_en' => ['required', 'string'],
        ]);
        $slug = Str::slug($request->full_name_en, '-');
        if (is_null($request -> image)) {
            $NewImageName = '';
        } else {
            $NewImageName =uniqid() . $slug . '.' . $request->image->extension();
            $request -> image ->move(public_path('images/profiles'), $NewImageName);
        }
        Profile::create([
            'branch_id'=>$request -> Input('branch_id'),
            'sub_branch_id'=> $request -> input('sub_branch_id'),
            'point' => $request -> input('point'),
            'department_id' => $request -> input('department_id'),
            'first_name' => $request -> input('first_name'),
            'last_name' => $request -> input('last_name'),
            'father_name' => $request -> input('father_name'),
            'mother_name' => $request -> input('mother_name'),
            'national_number' => $request -> input('national_number'),
            'gener_id' => $request -> input('gener_id'),
            'birth_place' => $request -> input('birth_place'),
            'birth_date' => $request -> input('birth_date'),
            'blood_group' => $request -> input('blood_group'),
            'marital_status_id' => $request -> input('marital_status_id'),
            'mobile_phone' => $request -> input('mobile_phone'),
            'phone' => $request -> input('phone'),
            'email' => $request -> input('email'),
            'certificate_id' => $request -> input('certificate_id'),
            'certificate_details' => $request -> input('certificate_details'),
            'jop_title_id' => $request -> input('jop_title_id'),
            'position' => $request -> input('position'),
            'volunteering_date' => $request -> input('volunteering_date'),
            'hire_date' => $request -> input('hire_date'),
            'full_name_en' => $request -> input('full_name_en'),
            'position_en' => $request -> input('position_en'),
            'shoes_size' => $request -> input('shoes_size'),
            'waist_size' => $request -> input('waist_size'),
            'shoulders_size' => $request -> input('shoulders_size'),
            'image' => $NewImageName,
            'user_id' => auth() -> user() -> id,
            'slug' => $slug
        ]);
        user::where('id', auth() -> user()-> id)
            ->update([
                'name' =>  $request -> input('first_name'). ' ' . $request -> input('last_name'),
                'email' =>  $request -> input('email')
            ]);
        return redirect('/profile/'.auth() -> user() -> id);
    }

    public function show(string $id)
    {
        if (!auth()->check()) {
            return redirect('/');
        }
        if ((auth()->user()-> role == '0') && (auth()->user()->id != $id)) {
                return redirect('/');
        } else {
            $pro = Profile::where('user_id', $id)->first();
            if ($pro == null) {
               return view('profile.redi') ;
            } else {
                return view('profile.show')->with('profile' , $pro);
            }
        }
    }

    public function edit(string $id)
    {
        $par = ['branches' => branch::orderBy('branch' , 'ASC')->get(),
        'sub_branches' => sub_branch::orderBy('sub_branch' , 'ASC')->get(), 
        'departments' => department::orderBy('department' , 'ASC')->get(),
        'certificates' => certificate::get(),
        'geners' => gener::get(),
        'jop_titles' => jop_title::get(),
        'marital_statuses' => marital_status::get(),
        'profiles' => Profile::where('user_id', $id)->first()
        ];
        return view('profile.edit')->with('lists', $par);       
        
    }
    
    public function update(Request $request, string $id)
    {
        $pro = Profile::where('user_id', $id)->first();
        $request -> validate([
            'branch_id' => ['required', 'min_digits:1'],
            'department_id' => ['required', 'min_digits:1'],
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'father_name' => ['required', 'string'],
            'mother_name' => ['required', 'string'],
            'national_number' => 'required|digits:11|numeric|unique:Profiles,national_number,' . $pro->id,
            'gener_id' => ['required', 'min_digits:1'],
            'birth_place' => ['required', 'string'],
            'birth_date' => ['required', 'date'],
            'blood_group' => ['required', 'string'],
            'marital_status_id' => ['required', 'string'],
            'mobile_phone' => 'required|digits:10|unique:Profiles,mobile_phone,' . $pro->id,
            'phone' => ['digits:10'],
            'email' => 'required|email|unique:Profiles,email,' . $pro->id,
            'certificate_id' => ['required', 'min_digits:1'],
            'jop_title_id' => ['required', 'min_digits:1'],
            'volunteering_date' => ['required', 'date'],
            'full_name_en' => ['required', 'string'],
        ]);
        $slug = Str::slug($request->full_name_en, '-');
        
        if (is_null($request -> image)) {
            profile::where('user_id', $id)
            ->update([
                'branch_id'=>$request -> Input('branch_id'),
                'sub_branch_id'=> $request -> input('sub_branch_id'),
                'point' => $request -> input('point'),
                'department_id' => $request -> input('department_id'),
                'first_name' => $request -> input('first_name'),
                'last_name' => $request -> input('last_name'),
                'father_name' => $request -> input('father_name'),
                'mother_name' => $request -> input('mother_name'),
                'national_number' => $request -> input('national_number'),
                'gener_id' => $request -> input('gener_id'),
                'birth_place' => $request -> input('birth_place'),
                'birth_date' => $request -> input('birth_date'),
                'blood_group' => $request -> input('blood_group'),
                'marital_status_id' => $request -> input('marital_status_id'),
                'mobile_phone' => $request -> input('mobile_phone'),
                'phone' => $request -> input('phone'),
                'email' => $request -> input('email'),
                'certificate_id' => $request -> input('certificate_id'),
                'certificate_details' => $request -> input('certificate_details'),
                'jop_title_id' => $request -> input('jop_title_id'),
                'position' => $request -> input('position'),
                'volunteering_date' => $request -> input('volunteering_date'),
                'hire_date' => $request -> input('hire_date'),
                'full_name_en' => $request -> input('full_name_en'),
                'position_en' => $request -> input('position_en'),
                'shoes_size' => $request -> input('shoes_size'),
                'waist_size' => $request -> input('waist_size'),
                'shoulders_size' => $request -> input('shoulders_size'),
                'slug' => $slug
            ]);
        } else {
            $NewImageName =uniqid() . $slug . '.' . $request->image->extension();
            $request -> image ->move(public_path('images/profiles'), $NewImageName);
            profile::where('user_id', $id)
            ->update([
                'branch_id'=>$request -> Input('branch_id'),
                'sub_branch_id'=> $request -> input('sub_branch_id'),
                'point' => $request -> input('point'),
                'department_id' => $request -> input('department_id'),
                'first_name' => $request -> input('first_name'),
                'last_name' => $request -> input('last_name'),
                'father_name' => $request -> input('father_name'),
                'mother_name' => $request -> input('mother_name'),
                'national_number' => $request -> input('national_number'),
                'gener_id' => $request -> input('gener_id'),
                'birth_place' => $request -> input('birth_place'),
                'birth_date' => $request -> input('birth_date'),
                'blood_group' => $request -> input('blood_group'),
                'marital_status_id' => $request -> input('marital_status_id'),
                'mobile_phone' => $request -> input('mobile_phone'),
                'phone' => $request -> input('phone'),
                'email' => $request -> input('email'),
                'certificate_id' => $request -> input('certificate_id'),
                'certificate_details' => $request -> input('certificate_details'),
                'jop_title_id' => $request -> input('jop_title_id'),
                'position' => $request -> input('position'),
                'volunteering_date' => $request -> input('volunteering_date'),
                'hire_date' => $request -> input('hire_date'),
                'full_name_en' => $request -> input('full_name_en'),
                'position_en' => $request -> input('position_en'),
                'shoes_size' => $request -> input('shoes_size'),
                'waist_size' => $request -> input('waist_size'),
                'shoulders_size' => $request -> input('shoulders_size'),
                'image' => $NewImageName,
                'slug' => $slug
            ]);
        }
        user::where('id', $id)
            ->update([
            'name' =>  $request -> input('first_name'). ' ' . $request -> input('last_name')
            ]);
        return redirect('/') -> with('message', 'تم التعديل على الملف الشخصي بنجاح');
    }

    public function destroy(string $id)
    {
        $po = Profile::find($id);
        $po -> delete();
        return redirect('profile') -> with('message', 'تم حذف الملف الشخصي بنجاح');
    }

}
