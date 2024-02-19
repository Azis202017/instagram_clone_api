<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PostInstagram;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PostInstagramController extends Controller
{
    public function index(Request $request)
    {
        $data = PostInstagram::with(['user'])->get();

        $post = $data->map(function ($post) {
            $post->foto_url = asset('postingan/' . $post->posting_gambar);

            // $post->user->map(function ($post) {
            //     $post->foto_url = asset('postingan/' . $post->posting_gambar);

            //     return $post;
            // });

            return $post;
        });

        return response()->json([
            'data' => $post,
        ]);
    }

    public function create(Request $request)
    {

        $uploadedFile = $request->file('posting_gambar');
        $imageName = uniqid() . '.' . $uploadedFile->getClientOriginalExtension();

        $uploadedFile->move(public_path('postingan'), $imageName);
        // 'id_user',
        // 'description',
        // 'is_like',
        // 'posting_gambar',
        // 'is_sponsor',
        $user = Auth::user();
        $data = PostInstagram::create([
            'id_user' => $user->id,
            'description' => $request->description,
            'is_like' => $request->is_like,
            'posting_gambar' => $imageName,
            'is_sponsor' => $request->is_sponsor,
        ]);
        return response()->json(['data' => $data, 'status' => 'OK'], 200);
    }
}
