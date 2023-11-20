<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $posts = DB::table('posts')
            ->join('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.username', 'users.first_name', 'users.last_name')
            ->orderBy('posts.created_at', 'desc')
            ->paginate(5);
        return view('home', ['posts' => $posts]);
    }
}
