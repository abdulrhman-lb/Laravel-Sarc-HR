<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\trainer;

class TrainerController extends Controller
{
    public function index()
    {
        return view('const.trainer.index')->with('trainers', trainer::all());
    }
    
    public function create()
    {
        return view('const.trainer.create');
    }

    public function store(Request $request)
    {
        $request -> validate([
            'trainer' => ['required', 'string', 'unique:trainers'],
            'trainer_en' => ['required', 'string', 'unique:trainers'],
        ]);
        trainer::create([
            'trainer'=>$request -> Input('trainer'),
            'trainer_en'=> $request -> input('trainer_en')
        ]);
        return redirect('const/trainer');    
    }

    public function show(string $id)
    {
        return view('const.trainer.show')->with('trainers', trainer::where('id', $id)->first());
    }

    public function edit(string $id)
    {
        return view('const.trainer.edit')->with('trainers', trainer::where('id', $id)->first());
    }

    public function update(Request $request, string $id)
    {
        $request -> validate([
            'trainer' => 'required|string|unique:trainers,trainer,' . $id,
            'trainer_en' => 'required|string|unique:trainers,trainer_en,' . $id,
        ]);
        trainer::where('id', $id)
            ->update([
                'trainer' => $request -> input('trainer'),
                'trainer_en' => $request -> input('trainer_en')
            ]);
        return redirect('const/trainer') -> with('message', 'تم التعديل على المدرب بنجاح');    
    }    

    public function destroy(string $id)
    {
        $po = trainer::find($id);
        $po -> delete();
        return redirect('const/trainer') -> with('message', 'تم حذف المدرب بنجاح');
    }
}
