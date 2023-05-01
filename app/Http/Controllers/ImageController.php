<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $filename = time() . '_' . $request->file('image')->getClientOriginalName();
        //$path = $request->file('image')->storeAs('images', $filename, 'public');
        $path = $request->file('image')->move(public_path('images'), $filename);

        return back()->with('success', 'Image uploaded successfully')->with('image', $filename);
    }
}
