<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\department;

class TeamController extends Controller
{
    public function index()
    {
        return view('department.index')->with('departments', department::orderBy('department' , 'ASC')->get());

    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(string $id)
    {
        return view('department.show')->with('departments', department::where('id', $id)->first());
    }

    public function edit(string $id)
    {
    }

    public function update(Request $request, string $id)
    {
    }

    public function destroy(string $id)
    {
    }
}
