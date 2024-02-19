<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoryController extends Controller
{

    public function index(Request $request)
    {
        $data = User::with(['story'])->get();

        $users = $data->map(function ($user) {
            // $user->foto_url = asset('story/' . $user->foto_story);

            $user->story->map(function ($story) {
                $story->foto_url = asset('foto_story/' . $story->foto_story);

                return $story;
            });

            return $user;
        });

        return response()->json([
            'data' => $users,
        ]);
    }

    public function create(Request $request)
    {
       

        $uploadedFile = $request->file('foto_story');
        $imageName = uniqid() . '.' . $uploadedFile->getClientOriginalExtension();

        $uploadedFile->move(public_path('foto_story'), $imageName);

        $user = Auth::user();
        $data = Story::create([
            'id_user' => $user->id,
            'foto_story' => $imageName,
            'text' => $request->text,
            'caption' => $request->caption,

        ]);
        return response()->json(['data' => $data, 'status' => 'OK'], 200);
    }
}
