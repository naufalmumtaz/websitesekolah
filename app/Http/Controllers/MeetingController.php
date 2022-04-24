<?php

namespace App\Http\Controllers;

use App\Meeting;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    public function create()
    {
        $meeting = Meeting::all();
    	return view('page.meeting.create', compact('meeting'));
    }
 
    public function store(Request $request)
    {
        $request->validate([
            'link' => 'required|max:300',
    	]);

        Meeting::create([
    		'link' => $request->link,
            'user_id' => auth()->user()->id
    	]);
 
    	return redirect('/meeting');
    }

    public function index()
    {
        $meeting = Meeting::all();
        return view('page.meeting.index', compact('meeting'));
    }

    public function show($id)
    {
        $meeting = Meeting::find($id);
        return view('page.meeting.show', compact('meeting'));
    }

    public function edit($id)
    {
        $meeting = Meeting::find($id);

        return view('page.meeting.edit', compact('meeting'));
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'link' => 'required|max:300',
    	]);

        $meeting = Meeting::find($id);

        $meeting->link = $request->link;
        $meeting->user_id = auth()->user()->id;
        
        $meeting->update();
        return redirect('/meeting');
    }

    public function destroy($id)
    {
        $meeting = Meeting::find($id);

        $meeting->delete();
        return redirect('/meeting');
    }
}
