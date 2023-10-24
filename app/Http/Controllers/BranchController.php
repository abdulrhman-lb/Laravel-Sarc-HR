<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\branch;

class BranchController extends Controller
{
    public function index()
    {
        return view('const.branch.index')->with('branches', branch::all());
    }

    public function create()
    {
        return view('const.branch.create');
    }

    public function store(Request $request)
    {
        branch::create([
            'branch'=>$request -> Input('branch'),
            'branch_en'=> $request -> input('branch_en')
        ]);
        return redirect('const/branch');
    }

    public function show(string $id)
    {   
        return view('const.branch.show')->with('branches', branch::where('id', $id)->first());
    }
    
    public function edit(string $id)
    {
        return view('const.branch.edit')->with('branches', branch::where('id', $id)->first());
    }

    public function update(Request $request, string $id)
    {   
        branch::where('id', $id)
            ->update([
                'branch' => $request -> input('branch'),
                'branch_en' => $request -> input('branch_en')
            ]);
        return redirect('const/branch') -> with('message', 'تم التعديل على الفرع بنجاح');
    }

    public function destroy(string $id)
    {   
        $po = branch::find($id);
        $po -> delete();
        return redirect('const/branch') -> with('message', 'تم حذف الفرع بنجاح');
    }
}
