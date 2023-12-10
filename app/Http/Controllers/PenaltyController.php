<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\penalty;
use App\Models\penalty_name;
use App\Models\Profile;

class PenaltyController extends Controller
{
    public function index()
    {
        return view('penalty.index')->with('penalties', penalty::orderBy('profile_id' , 'ASC')->get());
    }

    public function create()
    {
        $par = ['penalty_names' => penalty_name::orderBy('penalty_name' , 'ASC')->get(),
                'Profiles' => Profile::orderBy('first_name' , 'ASC')->orderBy('father_name' , 'ASC')->orderBy('last_name' , 'ASC')->get(), 
                ];
        return view('penalty.create')->with('lists' , $par);
    }

    public function store(Request $request)
    {
        $request -> validate([
            'profile_id' => ['required', 'min_digits:1'],
            'penalty_id' => ['required', 'min_digits:1'],
            'penalty_date' => ['required', 'string'],
            'penalty_source' => ['required'],
            'penalty_reason' => ['required', 'string'],
        ]);
        penalty::create([
            'profile_id'=>$request -> Input('profile_id'),
            'penalty_id'=>$request -> Input('penalty_id'),
            'penalty_date'=>$request -> Input('penalty_date'),
            'penalty_source'=>$request -> Input('penalty_source'),
            'penalty_reason'=>$request -> Input('penalty_reason'),
        ]);
        return redirect('penalty');
    }

    public function show(string $id)
    {   
        return view('penalty.show')->with('penalties', penalty::where('id', $id)->first());
    }
    
    public function edit(string $id)
    {
        $par = ['penalty_names' => penalty_name::orderBy('penalty_name' , 'ASC')->get(),
                'Profiles' => Profile::orderBy('first_name' , 'ASC')->orderBy('father_name' , 'ASC')->orderBy('last_name' , 'ASC')->get(), 
                'penalties'=> penalty::where('id', $id)->first()
                ];
        return view('penalty.edit')->with('lists' , $par);
    }

    public function update(Request $request, string $id)
    {
        $request -> validate([
            'profile_id' => ['required', 'min_digits:1'],
            'penalty_id' => ['required', 'min_digits:1'],
            'penalty_date' => ['required', 'string'],
            'penalty_source' => ['required'],
            'penalty_reason' => ['required', 'string'],
        ]);
        penalty::where('id', $id)
            ->update([
                'profile_id'=>$request -> Input('profile_id'),
                'penalty_id'=>$request -> Input('penalty_id'),
                'penalty_date'=>$request -> Input('penalty_date'),
                'penalty_source'=>$request -> Input('penalty_source'),
                'penalty_reason'=>$request -> Input('penalty_reason'),
            ]);
        return redirect('penalty') -> with('message', 'تم التعديل على العقوبة بنجاح');
    }

    public function destroy(string $id)
    {   
        $po = penalty::find($id);
        $po -> delete();
        return redirect('penalty') -> with('message', 'تم حذف العقوبة بنجاح');
    }
}
