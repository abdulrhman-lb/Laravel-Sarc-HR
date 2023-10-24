<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\gener;

class GenerController extends Controller
{
    public function index()
    {
        return view('const.gener.index')->with('geners', gener::all());
    }

    public function create()
    {
        return view('const.gener.create');
    }

    public function store(Request $request)
    {
        gener::create([
            'gener'=>$request -> Input('gener'),
            'gener_en'=> $request -> input('gener_en')
        ]);
        return redirect('const/gener');
    }

    public function show(string $id)
    {   
        return view('const.gener.show')->with('geners', gener::where('id', $id)->first());
    }
    
    public function edit(string $id)
    {
        return view('const.gener.edit')->with('geners', gener::where('id', $id)->first());
    }

    public function update(Request $request, string $id)
    {   
        gener::where('id', $id)
            ->update([
                'gener' => $request -> input('gener'),
                'gener_en' => $request -> input('gener_en')
            ]);
        return redirect('const/gener') -> with('message', 'تم التعديل على الجنس بنجاح');
    }

    public function destroy(string $id)
    {   
        $po = gener::find($id);
        $po -> delete();
        return redirect('const/gener') -> with('message', 'تم حذف الجنس بنجاح');
    }
}
