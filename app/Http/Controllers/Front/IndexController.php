<?php

namespace App\Http\Controllers\Front;

use App\Models\Gallery;
use App\Models\Meeting;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return view('front.index',
            [
                'meetings' => Meeting::all(),
                'galleries' => Gallery::all()
            ]);
    }

    public function meeting($meeting)
    {
        return view('front.meeting',
            [
                'meeting' => Meeting::where('slug', $meeting)->first()
            ]);
    }
}
