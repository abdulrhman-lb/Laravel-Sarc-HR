<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\department;

class DepartmentController extends Controller
{
    public function index()
    {
        return view('const.department.index')->with('departments', department::orderBy('department' , 'ASC')->get());
    }
    public function create()
    {
        return view('const.department.create');
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
            'coordinator_id'=> 0
        ]);
        return redirect('const/department');
    }

    public function show(string $id)
    {
        return view('const.department.show')->with('departments', department::where('id', $id)->first());
    }
    
    public function edit(string $id)
    {
        return view('const.department.edit')->with('departments', department::where('id', $id)->first());
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
                'coordinator_id'=> 0
            ]);
        return redirect('const/department') -> with('message', 'تم التعديل على القسم بنجاح');
    }

    public function destroy(string $id)
    {
        $po = department::find($id);
        $po -> delete();
        return redirect('const/department') -> with('message', 'تم حذف القسم بنجاح');
    }
}
