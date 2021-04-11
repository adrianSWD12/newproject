<?php

namespace App\Http\Controllers;


use Illuminate\support\facades\DB;
use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    public function show($slug)
    {
  //      $post = DB::table('posts') ->where('slug', $slug)->first();
        return view('post', [

            'post' => Post::where('slug', $slug) ->firstorfail()

        ]);
    }
}

