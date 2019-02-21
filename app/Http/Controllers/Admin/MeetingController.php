<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MeetingRequest;
use App\Models\Meeting;
use App\User;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    const ROLE_ORGANIZER = 'organizer';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.meeting.index',
            [
                'meetings' => Meeting::all()
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.meeting.create',
            [
                'organizers' => User::where('role', self::ROLE_ORGANIZER)->get()
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MeetingRequest $request)
    {
        Meeting::create([
            'name' => $request->get('name'),
            'user_id' => $request->get('user_id')
        ]);

        return redirect(route('meeting'))->with('status', 'мероприятие создано');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function show(Meeting $meeting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function edit(Meeting $meeting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Meeting  $meeting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meeting $meeting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Meeting::find($id)->delete();
        return redirect()->route('meeting');
    }
}
