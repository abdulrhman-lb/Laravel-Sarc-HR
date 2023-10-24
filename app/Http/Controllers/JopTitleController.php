<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\jop_title;

class JopTitleController extends Controller
{
    public function index()
    {
        return view('const.joptitle.index')->with('joptitles', jop_title::all());
    }

    public function create()
    {
        return view('const.joptitle.create');
    }

    public function store(Request $request)
    {
        jop_title::create([
            'joptitle'=>$request -> Input('joptitle'),
            'joptitle_en'=> $request -> input('joptitle_en')
        ]);
        return redirect('const/joptitle');
    }

    public function show(string $id)
    {   
        return view('const.joptitle.show')->with('jop_titles', jop_title::where('id', $id)->first());
    }
    
    public function edit(string $id)
    {
        return view('const.joptitle.edit')->with('jop_titles', jop_title::where('id', $id)->first());
    }

    public function update(Request $request, string $id)
    {   
        jop_title::where('id', $id)
            ->update([
                'joptitle' => $request -> input('joptitle'),
                'joptitle_en' => $request -> input('joptitle_en')
            ]);
        return redirect('const/joptitle') -> with('message', 'تم التعديل على الصفة الهلالية بنجاح');
    }

    public function destroy(string $id)
    {   
        $po = jop_title::find($id);
        $po -> delete();
        return redirect('const/joptitle') -> with('message', 'تم حذف الصفة الهلالية بنجاح');
    }
}
