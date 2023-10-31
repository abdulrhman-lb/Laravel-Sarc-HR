<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function ImageUpload(Request $request)
    {   dd($request);
    	 $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images/temp'), $imageName);
        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName); 
    }
}
