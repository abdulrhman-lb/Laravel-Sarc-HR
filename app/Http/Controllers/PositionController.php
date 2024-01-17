<?php

namespace App\Http\Controllers;

use App\Models\department;
use Illuminate\Http\Request;
use App\Models\Position;
use App\Models\Profile;
use App\Models\jop_title;

class PositionController extends Controller
{
    public function index()
    {
        return view('position.index')->with('positions', Position::orderBy('profile_id' , 'ASC')->orderBy('start_date' , 'ASC')->get());
    }

    public function create()
    {
        $par = ['departments' => department::orderBy('department' , 'ASC')->get(),
                'Profiles' => Profile::orderBy('first_name' , 'ASC')->orderBy('father_name' , 'ASC')->orderBy('last_name' , 'ASC')->get(), 
                'jop_titles' => jop_title::all(), 
                ];
        return view('position.create')->with('lists' , $par);
    }

    public function store(Request $request)
    {
        $position = Position::where('profile_id' , $request -> Input('profile_id'))->orderBy('end_date' , 'ASC')->first();
        $request -> validate([
            'profile_id' => ['required', 'min_digits:1'],
            'department_id' => ['required', 'min_digits:1'],
            'jop_title_id' => ['required', 'min_digits:1'],
            'start_date' => ['required', 'after:'.$position -> start_date],
            // 'position' => ['required'],
            // 'position_en' => ['required', 'string'],
        ]);
        Position::where('profile_id' , $request -> Input('profile_id'))->orderBy('end_date' , 'ASC')->first()
        ->update([
            'end_date' => $request -> input('start_date'),
        ]);
        Position::create([
            'profile_id'=>$request -> Input('profile_id'),
            'department_id'=>$request -> Input('department_id'),
            'jop_title_id'=>$request -> Input('jop_title_id'),
            'start_date'=>$request -> Input('start_date'),
            'end_date'=>"1900-01-01",
            'position'=>$request -> Input('position'),
            'position_en'=>$request -> Input('position_en'),
        ]);

        profile::where('id', $request -> Input('profile_id'))
            ->update([
                'department_id' => $request -> input('department_id'),
                'jop_title_id' => $request -> input('jop_title_id'),
                'position' => $request -> input('position'),
                'position_en' => $request -> input('position_en'),
            ]);
        return redirect('position');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
