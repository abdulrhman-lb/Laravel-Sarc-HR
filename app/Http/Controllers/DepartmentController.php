<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\department;
use App\Models\Profile;

class DepartmentController extends Controller
{
    public function index()
    {
        return view('const.department.index')->with('departments', department::orderBy('department' , 'ASC')->get());
    }
    public function create()
    {
        return view('const.department.create')->with('profiles', Profile::orderby('first_name', 'asc')->orderby('last_name', 'asc')->get());
    }

    public function store(Request $request)
    {
        $request -> validate([
            'department' => ['required', 'string', 'unique:departments'],
            'department_en' => ['required', 'string', 'unique:departments'],
            'department_short' => ['required', 'string', 'unique:departments'],
        ]);
        department::create([
            'department'=>$request -> Input('department'),
            'department_en'=> $request -> input('department_en'),
            'department_short'=> $request -> input('department_short'),
            'department_address'=> $request -> input('department_address'),
            'donor'=> $request -> input('donor'),
            'department_information'=> $request -> input('department_information'),
            'coordinator_name'=> $request -> input('coordinator_name'),
            'coordinator_id'=> $request -> input('coordinator_id'),
            'coordinator_mobile'=> $request -> input('coordinator_mobile'),
            'coordinator_email'=> $request -> input('coordinator_email'),
        ]);
        return redirect('const/department');
    }

    public function show(string $id)
    {
        return view('const.department.show')->with('departments', department::where('id', $id)->first());
    }
    
    public function edit(string $id)
    {
        $par = ['departments' => department::where('id', $id)->first(),
                'profiles' => Profile::where('department_id', $id)->get()];
        return view('const.department.edit')->with('lists', $par);
    }

    public function update(Request $request, string $id)
    {
        $request -> validate([
            'department' => 'required|string|unique:departments,department,' . $id,
            'department_en' => 'required|string|unique:departments,department_en,' . $id,
            'department_short' => 'required|string|unique:departments,department_short,' . $id,
        ]);
        department::where('id', $id)
            ->update([
                'department' => $request -> input('department'),
                'department_en' => $request -> input('department_en'),
                'department_short' => $request -> input('department_short'),
                'department_address'=> $request -> input('department_address'),
                'donor'=> $request -> input('donor'),
                'department_information'=> $request -> input('department_information'),
                'coordinator_name'=> $request -> input('coordinator_name'),
                'coordinator_id'=> $request -> input('coordinator_id'),
                'coordinator_mobile'=> $request -> input('coordinator_mobile'),
                'coordinator_email'=> $request -> input('coordinator_email'),
            ]);
        return redirect('const/department') -> with('message', 'تم التعديل على القسم بنجاح');
    }

    public function destroy(string $id)
    {
        $po = department::find($id);
        $po -> delete();
        return redirect('const/department') -> with('message', 'تم حذف القسم بنجاح');
    }

    public function getcoordinator(Request $request)
    {
        $coordinatorID = $request->id;
        $coordinator = Profile::where('id', $coordinatorID)->first();
        return response()->json($coordinator);
    }
}
