<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\reward_names;
use App\Models\rewards;
use Illuminate\Http\Request;

class RewardController extends Controller
{
    public function index()
    {
        return view('reward.index')->with('rewards', rewards::orderBy('profile_id' , 'ASC')->get());
    }

    public function create()
    {
        $par = ['reward_names' => reward_names::orderBy('reward_name' , 'ASC')->get(),
                'Profiles' => Profile::orderBy('first_name' , 'ASC')->orderBy('father_name' , 'ASC')->orderBy('last_name' , 'ASC')->get(), 
                ];
        return view('reward.create')->with('lists' , $par);
    }

    public function store(Request $request)
    {
        $request -> validate([
            'profile_id' => ['required', 'min_digits:1'],
            'reward_id' => ['required', 'min_digits:1'],
            'reward_date' => ['required', 'string'],
            'reward_source' => ['required'],
            'reward_reason' => ['required', 'string'],
        ]);
        rewards::create([
            'profile_id'=>$request -> Input('profile_id'),
            'reward_id'=>$request -> Input('reward_id'),
            'reward_date'=>$request -> Input('reward_date'),
            'reward_source'=>$request -> Input('reward_source'),
            'reward_reason'=>$request -> Input('reward_reason'),
        ]);
        return redirect('reward');
    }

    public function show(string $id)
    {   
        return view('reward.show')->with('rewards', rewards::where('id', $id)->first());
    }
    
    public function edit(string $id)
    {
        $par = ['reward_names' => reward_names::orderBy('reward_name' , 'ASC')->get(),
                'Profiles' => Profile::orderBy('first_name' , 'ASC')->orderBy('father_name' , 'ASC')->orderBy('last_name' , 'ASC')->get(), 
                'rewards'=> rewards::where('id', $id)->first()
                ];
        return view('reward.edit')->with('lists' , $par);
    }

    public function update(Request $request, string $id)
    {
        $request -> validate([
            'profile_id' => ['required', 'min_digits:1'],
            'reward_id' => ['required', 'min_digits:1'],
            'reward_date' => ['required', 'string'],
            'reward_source' => ['required'],
            'reward_reason' => ['required', 'string'],
        ]);
        rewards::where('id', $id)
            ->update([
                'profile_id'=>$request -> Input('profile_id'),
                'reward_id'=>$request -> Input('reward_id'),
                'reward_date'=>$request -> Input('reward_date'),
                'reward_source'=>$request -> Input('reward_source'),
                'reward_reason'=>$request -> Input('reward_reason'),
            ]);
        return redirect('reward') -> with('message', 'تم التعديل على المكافئة بنجاح');
    }

    public function destroy(string $id)
    {   
        $po = rewards::find($id);
        $po -> delete();
        return redirect('reward') -> with('message', 'تم حذف المكافئة بنجاح');
    }

}
