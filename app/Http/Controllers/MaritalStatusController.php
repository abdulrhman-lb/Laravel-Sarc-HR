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
        marital_status::create([
            'maritalstatus'=>$request -> Input('maritalstatus'),
            'maritalstatus_en'=> $request -> input('maritalstatus_en')
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
        marital_status::where('id', $id)
            ->update([
                'maritalstatus' => $request -> input('maritalstatus'),
                'maritalstatus_en' => $request -> input('maritalstatus_en')
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
