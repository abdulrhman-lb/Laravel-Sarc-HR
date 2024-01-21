<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\jop_title;

class JopTitleController extends Controller
{
    public function index()
    {
        return view('const.joptitle.index')->with('jop_titles', jop_title::all());
    }

    public function create()
    {
        return view('const.joptitle.create');
    }

    public function store(Request $request)
    {
        $request -> validate([
            'jop_title' => ['required', 'string', 'unique:jop_titles'],
            'jop_title_en' => ['required', 'string', 'unique:jop_titles'],
        ]);
        jop_title::create([
            'jop_title'=>$request -> Input('jop_title'),
            'jop_title_en'=> $request -> input('jop_title_en')
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
        $request -> validate([
            'jop_title' => 'required|string|unique:jop_titles,jop_title,' . $id,
            'jop_title_en' => 'required|string|unique:jop_titles,jop_title_en,' . $id,
        ]);
        jop_title::where('id', $id)
            ->update([
                'jop_title' => $request -> input('jop_title'),
                'jop_title_en' => $request -> input('jop_title_en')
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
