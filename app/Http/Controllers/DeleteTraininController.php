<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\training_trainee;
use App\Models\training;
use App\Models\training_course;

class DeleteTraininController extends Controller
{
    public function index(Request $request)
    {
        $query= training_course::where('training_id', $request->input('tr'))
                        ->with(['training_trainee']);
        $par = ['training_courses' =>  $query -> orderBy('training_date_start' , 'ASC')->get(),
                'training' => $request->tr,
                'profile' => $request->pr,
                'trainings'=> training::get()];
        // dd($par['profile']);
        return view('profile.addtraining')->with('lists', $par);
    }

    public function create(Request $id)
    {
    }

    public function store(Request $request)
    {
        $request -> validate([
            'pr' => 'required|unique:training_trainees,trainee_id,NULL,id,training_course_id,' . request('tr'),
        ]);
        training_trainee::create([
            'training_course_id'=>$request -> Input('tr'),
            'trainee_id'=> $request -> input('pr')
        ]);
        return redirect('profile/'.$request -> input('pr')) -> with('message', 'تم إضافة الدورة التدريبية إلى الدورات المتبعة بنجاح');
    }

    public function show(string $id)
    {

    }

    public function edit(string $id)
    {
    }

    public function update(Request $request, string $id)
    {
    }

    public function destroy(string $id)
    {
        $po = training_trainee::find($id);
        $course = training_trainee::find($id) -> trainee_id; 
        $po -> delete();
        return redirect('profile/'.$course) -> with('message', 'تم حذف الدورة من الدورات المتبعة بنجاح');
    }
}
