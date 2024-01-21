<?php

namespace App\Http\Controllers;
use App\Models\leave_names;
use App\Models\Profile;
use Illuminate\Http\Request;

class LeaveNameController extends Controller
{
    public function index()
    {
        return view('const.leave.index')->with('leave_names', leave_names::all());
    }

    public function create()
    {
        return view('const.leave.create')->with('profiles', Profile::orderby('first_name', 'asc')->orderby('last_name', 'asc')->get());
    }

    public function store(Request $request)
    {
        $request -> validate([
            'leave_name' => ['required', 'string', 'unique:leave_names'],
            'leave_source' => ['required'],
            'hr_approve_id' => ['required'],
            'mang_approve_id' => ['required'],
        ]);
        leave_names::create([
            'leave_name'=>$request -> Input('leave_name'),
            'leave_source'=>$request -> Input('leave_source'),
            'hr_approve_id'=>$request -> Input('hr_approve_id'),
            'mang_approve_id'=>$request -> Input('mang_approve_id'),
            'max_day'=>$request -> Input('max_day'),
        ]);
        return redirect('const/leave');
    }

    public function show(string $id)
    {   
        return view('const.leave.show')->with('leave_names', leave_names::where('id', $id)->first());
    }
    
    public function edit(string $id)
    {
        return view('const.leave.edit')->with('leave_names', leave_names::where('id', $id)->first());
    }

    public function update(Request $request, string $id)
    {
        $request -> validate([
            'leave_name' => 'required|string|unique:leave_names,leave_name,' . $id,
            'leave_source' => ['required'],
            'hr_approve_id' => ['required'],
            'mang_approve_id' => ['required'],
        ]);
        leave_names::where('id', $id)
            ->update([
                'leave_name'=>$request -> Input('leave_name'),
                'leave_source'=>$request -> Input('leave_source'),
                'hr_approve_id'=>$request -> Input('hr_approve_id'),
                'mang_approve_id'=>$request -> Input('mang_approve_id'),
                'max_day'=>$request -> Input('max_day'),
            ]);
        return redirect('const/leave') -> with('message', 'تم التعديل على الإجازة بنجاح');
    }

    public function destroy(string $id)
    {   
        $po = leave_names::find($id);
        $po -> delete();
        return redirect('const/leave') -> with('message', 'تم حذف العقوبة الإجازة');
    }
}
