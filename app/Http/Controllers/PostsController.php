<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    //
    public function index() {
        //query builders
        // $posts = DB::select("select * from posts where id = :id", ['id' => 1]);
        $posts = DB::table("posts")->where("id", 2)->get();
        dd($posts);
        return view('posts.index', ['posts' => $posts]);
    }
}

