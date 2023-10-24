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
        department::create([
            'department'=>$request -> Input('department'),
            'department_en'=> $request -> input('department_en')
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
        department::where('id', $id)
            ->update([
                'department' => $request -> input('department'),
                'department_en' => $request -> input('department_en')
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
