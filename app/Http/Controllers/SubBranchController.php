<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sub_branch;
use App\Models\branch;

class SubBranchController extends Controller
{
    public function index()
    {
        return view('const.subbranch.index')->with('sub_branches', sub_branch::orderBy('branch_id' , 'ASC')->get());
    }

    public function create()
    {
        return view('const.subbranch.create')->with('branches', branch::get());
    }

    public function store(Request $request)
    {
        sub_branch::create([
            'sub_branch'=>$request -> Input('sub_branch'),
            'sub_branch_en'=> $request -> input('sub_branch_en'),
            'branch_id'=> $request -> input('branch_id'),
        ]);
        return redirect('const/subbranch');
    }

    public function show(string $id)
    {   
        return view('const.subbranch.show')->with('sub_branches', sub_branch::where('id', $id)->first());
    }
    
    public function edit(string $id)
    {
        $par = ['branches' => branch::orderBy('branch' , 'ASC')->get(),
        'sub_branches' => sub_branch::where('id', $id)->first()];
        return view('const.subbranch.edit')->with('list', $par);
    }

    public function update(Request $request, string $id)
    {   
        sub_branch::where('id', $id)
            ->update([
                'sub_branch' => $request -> input('sub_branch'),
                'sub_branch_en' => $request -> input('sub_branch_en'),
                'branch_id' => $request -> input('branch_id'),

            ]);
        return redirect('const/subbranch') -> with('message', 'تم التعديل على الشعبة بنجاح');
    }

    public function destroy(string $id)
    {   
        $po = sub_branch::find($id);
        $po -> delete();
        return redirect('const/subbranch') -> with('message', 'تم حذف الشعبة بنجاح');
    }

    public function getsub(Request $request)
    {
        $branchId = $request->id;
        $sub_branches = sub_branch::where('branch_id', $branchId)->get();
        return response()->json($sub_branches);
    }
       
}