<?php

namespace App\Http\Controllers;

use App\Models\reward_names;
use Illuminate\Http\Request;

class RewardNameController extends Controller
{
    public function index()
    {
        return view('const.reward.index')->with('rewards', reward_names::all());
    }

    public function create()
    {
        return view('const.reward.create');
    }

    public function store(Request $request)
    {
        $request -> validate([
            'reward_name' => ['required', 'string', 'unique:reward_names'],
        ]);
        reward_names::create([
            'reward_name'=>$request -> Input('reward_name'),
        ]);
        return redirect('const/reward');
    }

    public function show(string $id)
    {   
        return view('const.reward.show')->with('rewards', reward_names::where('id', $id)->first());
    }
    
    public function edit(string $id)
    {
        return view('const.reward.edit')->with('rewards', reward_names::where('id', $id)->first());
    }

    public function update(Request $request, string $id)
    {
        $request -> validate([
            'reward_name' => 'required|string|unique:reward_names,reward_name,' . $id,
        ]);
        reward_names::where('id', $id)
            ->update([
                'reward_name' => $request -> input('reward_name'),
            ]);
        return redirect('const/reward') -> with('message', 'تم التعديل على المكافئة بنجاح');
    }

    public function destroy(string $id)
    {   
        $po = reward_names::find($id);
        $po -> delete();
        return redirect('const/reward') -> with('message', 'تم حذف المكافئة بنجاح');
    }
}
