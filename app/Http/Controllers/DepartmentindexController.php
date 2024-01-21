<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\department;
use App\Models\leave_names;
use App\Models\Profile;

class DepartmentindexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $approve = Profile::where('user_id', auth()->user()->id)->first();
        // $test = 0;
        // $hr_approve = leave_names::where('hr_approve_id', $approve -> id)->get();
        // if (!$hr_approve->isEmpty()) {
        //     $test = 1;
        // }

        // $mang_approve = leave_names::where('mang_approve_id', $approve -> id)->get();
        // if (!$mang_approve->isEmpty()) {
        //     $test = 1;
        // }

        // $coor_approve = department::where('coordinator_id', $approve -> id)->get();
        // if (!$coor_approve->isEmpty()) {
        //     $test = 1;
        // }

        // return view('index')->with('approve', $test);
        return view('index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
