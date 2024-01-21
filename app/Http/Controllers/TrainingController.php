<?php

namespace App\Http\Controllers;
use App\Models\training;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    public function index()
    {
        return view('const.training.index')->with('trainings', training::all());
    }

    public function create()
    {
        return view('const.training.create');
    }

    public function store(Request $request)
    {
        $request -> validate([
            'training' => ['required', 'string', 'unique:trainings'],
            'training_en' => ['required', 'string', 'unique:trainings'],
        ]);
        training::create([
            'training'=>$request -> Input('training'),
            'training_en'=> $request -> input('training_en')
        ]);
        return redirect('const/training');     
    }

    public function show(string $id)
    {
        return view('const.training.show')->with('trainings', training::where('id', $id)->first());
    }

    public function edit(string $id)
    {
        return view('const.training.edit')->with('trainings', training::where('id', $id)->first());
    }

    public function update(Request $request, string $id)
    {
        $request -> validate([
            'training' => 'required|string|unique:trainings,training,' . $id,
            'training_en' => 'required|string|unique:trainings,training_en,' . $id,
        ]);
        training::where('id', $id)
            ->update([
                'training' => $request -> input('training'),
                'training_en' => $request -> input('training_en')
            ]);
        return redirect('const/training') -> with('message', 'تم التعديل على الدورة بنجاح');   
    }

    public function destroy(string $id)
    {
        $po = training::find($id);
        $po -> delete();
        return redirect('const/training') -> with('message', 'تم حذف الدورة بنجاح');
    }
}
