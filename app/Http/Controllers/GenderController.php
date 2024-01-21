<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\gender;

class GenderController extends Controller
{
    public function index()
    {
        return view('const.gender.index')->with('genders', gender::all());
    }

    public function create()
    {
        return view('const.gender.create');
    }

    public function store(Request $request)
    {
        $request -> validate([
            'gender' => ['required', 'string', 'unique:genders'],
            'gender_en' => ['required', 'string', 'unique:genders'],
        ]);
        gender::create([
            'gender'=>$request -> Input('gender'),
            'gender_en'=> $request -> input('gender_en')
        ]);
        return redirect('const/gender');
    }

    public function show(string $id)
    {
        return view('const.gener.show')->with('genders', gender::where('id', $id)->first());
    }
    
    public function edit(string $id)
    {
        return view('const.gender.edit')->with('genders', gender::where('id', $id)->first());
    }

    public function update(Request $request, string $id)
    {
        $request -> validate([
            'gener' => 'required|string|unique:geners,gener,' . $id,
            'gener_en' => 'required|string|unique:geners,gener_en,' . $id,
        ]);
        gender::where('id', $id)
            ->update([
                'gener' => $request -> input('gener'),
                'gener_en' => $request -> input('gener_en')
            ]);
        return redirect('const/gener') -> with('message', 'تم التعديل على الجنس بنجاح');
    }

    public function destroy(string $id)
    {   
        $po = gender::find($id);
        $po -> delete();
        return redirect('const/gener') -> with('message', 'تم حذف الجنس بنجاح');
    }
}
