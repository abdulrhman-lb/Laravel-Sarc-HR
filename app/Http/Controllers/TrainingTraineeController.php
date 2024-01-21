<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\training_trainee;
use App\Models\training_course;
use Illuminate\Support\Facades\DB;
use App\Models\Profile;

class TrainingTraineeController extends Controller
{
    public function index()
    {
    }

    public function create(Request $id)
    {
        $par = ['trainees' => Profile::orderBy('first_name' , 'ASC')->orderBy('father_name' , 'ASC')->orderBy('last_name' , 'ASC')->get(),
                'id' => $id -> id       
                ];
        return view('trainee.create')->with('lists', $par);
    }

    public function store(Request $request)
    {
        $request -> validate([
            'trainee_id' => 'required|unique:training_trainees,trainee_id,NULL,id,training_course_id,' . request('training_course_id'),
        ]);
        training_trainee::create([
            'training_course_id'=>$request -> Input('training_course_id'),
            'trainee_id'=> $request -> input('trainee_id')
        ]);


        $trainees = DB::table('training_trainees')
        ->select(
            'training_trainees.id as id1' ,
            'training_trainees.*',
            'profiles.*',
        )
        ->join('profiles', 'training_trainees.trainee_id', '=', 'profiles.id')
        ->where('training_trainees.training_course_id', $request -> Input('training_course_id'));


        $par = ['trainees' => $trainees->get(),
                'training_course' => training_course::where('id', $request -> Input('training_course_id'))->first(),

        ];
            return view('trainee.show')->with('lists', $par);
    }

    public function show(string $id)
    {
        $trainees = DB::table('training_trainees')
            ->select(
                'training_trainees.id as id1' ,
                'training_trainees.*',
                'profiles.*',
            )
            ->join('profiles', 'training_trainees.trainee_id', '=', 'profiles.id')
            ->where('training_trainees.training_course_id', $id);


        $par = ['trainees' => $trainees->get(),
                'training_course' => training_course::where('id', $id)->first(),

        ];
        return view('trainee.show')->with('lists', $par);
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
        $course = training_trainee::find($id) -> training_course_id; 
        $po -> delete();
        return redirect('trainee/'.$course) -> with('message', 'تم حذف المتدرب من الدورة بنجاح');
    }
}
