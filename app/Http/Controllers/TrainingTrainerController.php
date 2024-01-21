<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\training_trainer;
use App\Models\training_course;
use App\Models\trainer;

class TrainingTrainerController extends Controller
{
    public function index(string $id)
    {
        $par = ['trainers' => training_trainer::where('training_course_id', $id)->get(),
                'training_course' => training_course::where('id', $id)->get()            
        ];
        return view('trainer.index')->with('lists', $par);
    }

    public function create(Request $id)
    {
        $par = ['trainers' => trainer::orderBy('trainer' , 'ASC')->get(),
                'id' => $id -> id       
                ];
        return view('trainer.create')->with('lists', $par);
    }

    public function store(Request $request)
    {
        $request -> validate([
            'trainer_id' => 'required|unique:training_trainers,trainer_id,NULL,id,training_course_id,' . request('training_course_id'),
        ]);
        training_trainer::create([
            'training_course_id'=>$request -> Input('training_course_id'),
            'trainer_id'=> $request -> input('trainer_id')
        ]);

        $par = ['trainers' => training_trainer::where('training_course_id', $request -> Input('training_course_id'))->get(),
                'training_course' => training_course::where('id', $request -> Input('training_course_id'))->first()        
                ];
        return view('trainer.show')->with('lists', $par);
    }

    public function show(string $id)
    {
        
        $par = ['trainers' => training_trainer::where('training_course_id', $id)->get(),
                'training_course' => training_course::where('id', $id)->first(),

        ];
        return view('trainer.show')->with('lists', $par);
    }

    public function edit(string $id)
    {
    }

    public function update(Request $request, string $id)
    {
    }

    public function destroy(string $id)
    {
        $po = training_trainer::find($id);
        $course = training_trainer::find($id) -> training_course_id; 
        $po -> delete();
        return redirect('trainer/'.$course) -> with('message', 'تم حذف المدرب من الدورة بنجاح');
    }
}
