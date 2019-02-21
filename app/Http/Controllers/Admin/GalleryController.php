<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GalleryRequest;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.gallery.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GalleryRequest $request)
    {
        $image = $request->file('image');
        $filename = str_random(10) . '.' . $image->extension();

        $image->move(public_path('uploads/'), $filename);

        Gallery::create([
            'image' => $filename
        ]);

        return redirect(route('dashboard'))->with('status', 'картинка добавлена');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $image = Gallery::find($id);
        Storage::delete(public_path('uploads/') . $image->image);
        $image->delete();
        return redirect()->route('dashboard');
    }
}
