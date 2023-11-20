<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostStoreRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class PostController extends Controller
{
    public function store(PostStoreRequest $request)
    {
        $validated = $request->validated();

        $addedPost = DB::table("posts")->insertGetId([
            'uuid' => Str::uuid(),
            'user_id' => Auth::id(),
            'post_content' => $validated['post_content'],
            'comment_count' => 0,
            'created_at' => now(),
        ]);

        if ($addedPost) {
            return redirect()->route('home')->with('post_success', 'Post successful!');
        } else {
            return redirect()->route('home')->with('post_failed', 'Something went wong! Please try again');
        }
    }

    public function show($uuid): View
    {
        $post = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.*')
            ->where('posts.uuid', $uuid)
            ->first();

        if (!$post) {
            abort(404);
        }

        return view('posts.single', ['post' => $post]);
    }
}
