<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\penalty_name;

class PenaltyNameController extends Controller
{
    public function index()
    {
        return view('const.penalty.index')->with('penalties', penalty_name::all());
    }

    public function create()
    {
        return view('const.penalty.create');
    }

    public function store(Request $request)
    {
        $request -> validate([
            'penalty_name' => ['required', 'string', 'unique:penalty_names'],
        ]);
        penalty_name::create([
            'penalty_name'=>$request -> Input('penalty_name'),
        ]);
        return redirect('const/penalty');
    }

    public function show(string $id)
    {   
        return view('const.penalty.show')->with('penalties', penalty_name::where('id', $id)->first());
    }
    
    public function edit(string $id)
    {
        return view('const.penalty.edit')->with('penalties', penalty_name::where('id', $id)->first());
    }

    public function update(Request $request, string $id)
    {
        $request -> validate([
            'penalty_name' => 'required|string|unique:penalty_names,penalty_name,' . $id,
        ]);
        penalty_name::where('id', $id)
            ->update([
                'penalty_name' => $request -> input('penalty_name'),
            ]);
        return redirect('const/penalty') -> with('message', 'تم التعديل على العقوبة بنجاح');
    }

    public function destroy(string $id)
    {   
        $po = penalty_name::find($id);
        $po -> delete();
        return redirect('const/penalty') -> with('message', 'تم حذف العقوبة بنجاح');
    }
}
