<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\certificate;

class CertificateController extends Controller
{
    public function index()
    {
        return view('const.certificate.index')->with('certificates', certificate::all());
    }

    public function create()
    {
        return view('const.certificate.create');
    }

    public function store(Request $request)
    {
        $request -> validate([
            'certificate' => ['required', 'string', 'unique:certificates'],
            'certificate_en' => ['required', 'string', 'unique:certificates'],
        ]);
        certificate::create([
            'certificate'=>$request -> Input('certificate'),
            'certificate_en'=> $request -> input('certificate_en')
        ]);
        return redirect('const/certificate');
    }

    public function show(string $id)
    {
        return view('const.certificate.show')->with('certificates', certificate::where('id', $id)->first());
    }
    
    public function edit(string $id)
    {
        return view('const.certificate.edit')->with('certificates', certificate::where('id', $id)->first());
    }

    public function update(Request $request, string $id)
    {
        $request -> validate([
            'certificate' => 'required|string|unique:certificates,certificate,' . $id,
            'certificate_en' => 'required|string|unique:certificates,certificate_en,' . $id,
        ]);
        certificate::where('id', $id)
            ->update([
                'certificate' => $request -> input('certificate'),
                'certificate_en' => $request -> input('certificate_en')
            ]);
        return redirect('const/certificate') -> with('message', 'تم التعديل على الشهادة العلمية بنجاح');
    }

    public function destroy(string $id)
    {
        $po = certificate::find($id);
        $po -> delete();
        return redirect('const/certificate') -> with('message', 'تم حذف الشهادة العلمية بنجاح');
    }
}
