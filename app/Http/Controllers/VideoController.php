<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\video;
use App\Models\User;

class VideoController extends Controller
{
    function index()
    {
        return view("videos.index");
    }


    function fetch()
    {
        $videos = video::all()->toArray();
        $users = User::all()->toArray();

        return view('videos.videos', compact('videos', 'users'));
    }
    function publicFetch()
    {
        $videos = video::all()->toArray();
        $users = User::all()->toArray();
        return view('welcome', compact('videos', 'users'));
    }

    function privateFetch()
    {
        $videos = video::all()->toArray();
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

        $insert = new video();
        $insert->video = $file_name;
        $insert->name = $name;
        $insert->user_id = $userId;
        $insert->type = $type;
        $insert->save();

        return redirect('/fetch_video');
    }
}
