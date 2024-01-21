<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\marital_status;

class MaritalStatusController extends Controller
{
    public function index()
    {
        return view('const.maritalstatus.index')->with('marital_statuses', marital_status::all());
    }

    public function create()
    {
        return view('const.maritalstatus.create');
    }

    public function store(Request $request)
    {
        $request -> validate([
            'marital_status' => ['required', 'string', 'unique:marital_statuses'],
            'marital_status_en' => ['required', 'string', 'unique:marital_statuses'],
        ]);
        marital_status::create([
            'marital_status'=>$request -> Input('marital_status'),
            'marital_status_en' => $request -> input('marital_status_en')
        ]);
        return redirect('const/maritalstatus');
    }

    public function show(string $id)
    {
        return view('const.maritalstatus.show')->with('marital_statuses', marital_status::where('id', $id)->first());
    }
    
    public function edit(string $id)
    {
        return view('const.maritalstatus.edit')->with('marital_statuses', marital_status::where('id', $id)->first());
    }

    public function update(Request $request, string $id)
    {
        $request -> validate([
            'marital_status' => 'required|string|unique:marital_statuses,marital_status,' . $id,
            'marital_status_en' => 'required|string|unique:marital_statuses,marital_status_en,' . $id,
        ]);
        marital_status::where('id', $id)
            ->update([
                'marital_status' => $request -> input('marital_status'),
                'marital_status_en' => $request -> input('marital_status_en')
            ]);
        return redirect('const/maritalstatus') -> with('message', 'تم التعديل على الحالة الاجتماعية بنجاح');
    }

    public function destroy(string $id)
    {
        $po = marital_status::find($id);
        $po -> delete();
        return redirect('const/maritalstatus') -> with('message', 'تم حذف الحالة الاجتماعية بنجاح');
    }
}
