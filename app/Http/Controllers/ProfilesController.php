<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Auth;
use App\Models\Profile;
use App\Models\branch;
use App\Models\sub_branch;
use App\Models\department;
use App\Models\gender;
use App\Models\jop_title;
use App\Models\marital_status;
use App\Models\certificate;
use App\Models\User;
use App\Models\penalty;
use App\Models\Position;
use App\Models\training_course;
use App\Models\training;
use App\Models\training_trainee;
use Illuminate\Validation\Rule;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\table;

class ProfilesController extends Controller
{
    public function index(Request $request)
    {
        if ((auth()->user()-> role == '1')) {
            $active = $request->input('ac');
            $query = Profile::query(); 
            if ($active != '-') $query->whereHas('user', function ($query) use ($active)
                {
                    $query->where('active', $active);
                });
                if ($request->input('br')) {$query->where('branch_id', $request->input('br'));}
                if ($request->input('sb')) {$query->where('sub_branch_id', $request->input('sb'));}
                if ($request->input('dp')) {$query->where('department_id', $request->input('dp'));}
                if ($request->input('nm')) {$query->where('first_name', 'like' , '%'.$request->input('nm').'%');}
                if ($request->input('ln')) {$query->where('last_name', 'like' , '%'.$request->input('ln').'%');}
                if ($request->input('gn')) {$query->where('gender_id', $request->input('gn'));}
                if ($request->input('ms')) {$query->where('marital_status_id', $request->input('ms'));}
                if ($request->input('cf')) {$query->where('certificate_id', $request->input('cf'));}
                if ($request->input('cd')) {$query->where('certificate_details', $request->input('cd'));}
                if ($request->input('jt')) {$query->where('jop_title_id', $request->input('jt'));}
                if ($request->input('sort')) {$query->orderby($request->input('sort'), $request->input('order'));}

            $par = ['branches' => branch::orderBy('branch' , 'ASC')->get(),
            'sub_branches' => sub_branch::orderBy('sub_branch' , 'ASC')->get(), 
            'departments' => department::orderBy('department' , 'ASC')->get(),
            'certificates' => certificate::get(),
            'genders' => gender::get(),
            'jop_titles' => jop_title::get(),
            'marital_statuses' => marital_status::get(),
            'profiles' => $query -> get(),
            'branch_selected' => $request->br,
            'sub_branch_selected' => $request->sb,
            'department_selected' => $request->dp,
            'first_name_selected' => $request->nm,
            'last_name_selected' => $request->ln,
            'gender_selected' => $request->gn,
            'marital_status_selected' => $request->ms,
            'certificate_selected' => $request->cf,
            'certificate_details_selected' => $request->cd,
            'jop_title_selected' => $request->jt,
            'sort_selected' => $request->sort,
            'order_selected' => $request->order,
            'active_selected' => $request->ac,
            ];
            return view('profile.index')->with('lists', $par);
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
        'genders' => gender::get(),
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
            'sub_branch_id' => ['required', 'min_digits:1'],
            'department_id' => ['required', 'min_digits:1'],
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'father_name' => ['required', 'string'],
            'mother_name' => ['required', 'string'],
            'national_number' => ['required', 'digits:11', 'numeric', 'unique:Profiles'],
            'gender_id' => ['required', 'min_digits:1'],
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
            'gender_id' => $request -> input('gender_id'),
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
            $pro = ['profiles' => Profile::where('user_id', $id)->first()];
            if ($pro['profiles'] == null) {
                return view('profile.redi') ;
             } else {
                $profileID = Profile::where('user_id', $id)->first();
                $trainees = training_trainee::where('trainee_id', ($profileID->id))
                            ->with(['training_course', 'training_course.training', 'training_course.training_trainer.trainer']);
                $penalties = penalty::where('profile_id', ($profileID->id))
                            ->with(['penalty_name']);
                $positions = Position::where('profile_id', ($profileID->id))
                            ->with(['department','jop_title']);

                $pro = ['profiles' => Profile::where('user_id', $id)->first(),
                        'trainees' => $trainees->get(),
                        'penalties' => $penalties->get(),
                        'positions' => $positions->orderBy('start_date' , 'ASC')->get(),
                        ];
                return view('profile.show')->with('lists' , $pro);
            }
        }
    }

    public function edit(string $id)
    {
        $par = ['branches' => branch::orderBy('branch' , 'ASC')->get(),
        'sub_branches' => sub_branch::orderBy('sub_branch' , 'ASC')->get(), 
        'departments' => department::orderBy('department' , 'ASC')->get(),
        'certificates' => certificate::get(),
        'genders' => gender::get(),
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
            'sub_branch_id' => ['required', 'min_digits:1'],
            'department_id' => ['required', 'min_digits:1'],
            'first_name' => ['required', 'string'],
            'last_name' => ['required', 'string'],
            'father_name' => ['required', 'string'],
            'mother_name' => ['required', 'string'],
            'national_number' => 'required|digits:11|numeric|unique:Profiles,national_number,' . $pro->id,
            'gender_id' => ['required', 'min_digits:1'],
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
                'gender_id' => $request -> input('gender_id'),
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
                'gender_id' => $request -> input('gender_id'),
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
