<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\training_course;
use App\Models\training;
use App\Models\training_trainer;
use App\Models\training_trainee;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


class TrainingCourseController extends Controller
{
    public function index(Request $request)
    {
        $training_name = $request->input('tn');
        $training_place = $request->input('tp');
        $training_date_start1 = date('Y-m-d', strtotime($request->input('td1'))); 
        $training_date_start2 = date('Y-m-d', strtotime($request->input('td2'))); 
        $sort = $request->input('sort');
        $order = $request->input('order');

        $par = [
            'training_selected' => $training_name,
            'training_place_selected' => $training_place,
            'training_date_start1_selected' => $training_date_start1,
            'training_date_start2_selected' => $training_date_start2,
            'sort_selected' => $sort,
            'order_selected' => $order,
            ];
        $lists = $par;
        if ($request->input('td1') || $request->input('td2')) {
            $validator = Validator::make($request->all(), [
                'td1' => 'required',
                'td2' => 'required|after:td1',
            ]);
            if ($validator->fails()) {
                return redirect('training')
                        ->withInput()
                        ->withErrors($validator);
            }
        }
        // $query = training_course::query();

        $query = DB::table('training_courses')
            ->select('training_courses.*','trainings.training','trainings.training_en', DB::raw('COUNT(DISTINCT training_trainers.trainer_id) as trainers_count'), DB::raw('COUNT(DISTINCT training_trainees.trainee_id ) as trainee_count'))
            ->leftJoin('training_trainees', 'training_courses.id', '=', 'training_trainees.training_course_id')
            ->leftJoin('training_trainers', 'training_courses.id', '=', 'training_trainers.training_course_id')
            ->rightJoin('trainings', 'training_courses.training_id', '=', 'trainings.id')
            ->groupBy('training_courses.id',
                      'training_courses.training_id',
                      'training_courses.training_place',
                      'training_courses.training_date_start',
                      'training_courses.training_date_end',
                      'training_courses.training_days_number',
                      'training_courses.created_at',
                      'training_courses.updated_at',
                      'trainings.training',
                      'trainings.training_en');
            // dd($query);          

        if ($training_name) {$query->where('training_id', $training_name);}
        if ($training_place) {$query->where('training_place', 'like' , '%'. $training_place.'%');}
        if ($training_date_start1) {$query->wherebetween('training_date_start',[$training_date_start1, $training_date_start2]);}
        if ($sort) {$query->orderby($sort, $order);}

        $par = ['training' => training::orderBy('training' , 'ASC')->get(),
        'trainings' => $query -> get(),
        'training_selected' => $training_name,
        'training_place_selected' => $training_place,
        'training_date_start1_selected' => $training_date_start1,
        'training_date_start2_selected' => $training_date_start2,
        'sort_selected' => $sort,
        'order_selected' => $order,
        ];
        return view('training.index')->with('lists', $par);

    }

    public function create()
    {
       $par = ['training' => training::orderBy('training' , 'ASC')->get()];
        return view('training.create')->with('lists' , $par);
    }

    public function store(Request $request)
    {
        $request -> validate([
            'training_id' => ['required'],
            'training_place' => ['required'],
            'training_date_start' => ['required'],
            'training_date_end' => ['required','after:training_date_start'],
            'training_days_number' => ['required'],
        ]);
        training_course::create([
            'training_id'=>$request -> Input('training_id'),
            'training_place'=> $request -> input('training_place'),
            'training_date_start' => date('Y-m-d', strtotime($request -> input('training_date_start'))),
            'training_date_end' => date('Y-m-d', strtotime($request -> input('training_date_end'))),
            'training_days_number' => $request -> input('training_days_number'),
        ]);
        return redirect('training');
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

        $par = ['trainers' => training_trainer::where('training_course_id', $id)->get(),
                'trainees' => $trainees->get(),
                'training_course' => training_course::where('id', $id)->first(),

                ];
        return view('training.show')->with('lists', $par);
    }

    public function edit(string $id)
    {
        $par = ['training' => training::orderBy('training' , 'ASC')->get(),
                'training_courses' => training_course::where('id', $id)->first()];
        return view('training.edit')->with('lists', $par);
    }

    public function update(Request $request, string $id)
    {
        $request -> validate([
            'training_id' => ['required'],
            'training_place' => ['required'],
            'training_date_start' => ['required'],
            'training_date_end' => ['required','after:training_date_start'],
            'training_days_number' => ['required'],
        ]);

        training_course::where('id', $id)
            ->update([
                'training_id'=>$request -> Input('training_id'),
                'training_place'=> $request -> input('training_place'),
                'training_date_start' => date('Y-m-d', strtotime($request -> input('training_date_start'))),
                'training_date_end' => date('Y-m-d', strtotime($request -> input('training_date_end'))),
                'training_days_number' => $request -> input('training_days_number'),
            ]);
        return redirect('training') -> with('message', 'تم التعديل على الدورة التدريبية بنجاح');
    }

    public function destroy(string $id)
    {
        $po = training_course::find($id);
        $po -> delete();
        return redirect('training') -> with('message', 'تم حذف الدورة التدريبية بنجاح');
    }

    public function gettraining(Request $request)
    {
        dd($request);
        $training = $request->id;
        $training_course = training_course::where('training_id', $training)->get();
        return response()->json($training_course);
    }
}
