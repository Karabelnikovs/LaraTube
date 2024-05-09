<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;
use App\Models\User;

class VideoController extends Controller
{
    function index()
    {
        return view("videos.index");
    }


    function fetch()
    {
        $videos = Video::all()->toArray();
        $users = User::all()->toArray();

        return view('videos.videos', compact('videos', 'users'));
    }
    function publicFetch()
    {
        $videos = Video::all()->toArray();
        $users = User::all()->toArray();
        return view('welcome', compact('videos', 'users'));
    }

    function privateFetch()
    {
        $videos = Video::all()->toArray();
        $users = User::all()->toArray();
        return view('dashboard', compact('videos', 'users'));
    }
    function insert(Request $request)
    {
        $userId = auth()->user()->id;
        $request->validate([
            'video' => 'required|mimes:mp4,ogx,oga,ogv,ogg,webm',
            'name' => 'required|max:30',
            'type' => 'required'
        ]);
        $name = $request->input('name');
        $file = $request->file('video');
        $type = $request->input('type');

        $file->move('upload', $file->getClientOriginalName());
        $file_name = $file->getClientOriginalName();

        $insert = new Video();
        $insert->video = $file_name;
        $insert->name = $name;
        $insert->user_id = $userId;
        $insert->type = $type;
        $insert->save();

        return redirect('/fetch_video');
    }
    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('videos.edit', compact('video'));
    }

    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:30',

            'type' => 'required'
        ]);

        $video->update($validatedData);

        return redirect()->route('fetch_video')
            ->with('success', 'Video updated successfully.');
    }

}
