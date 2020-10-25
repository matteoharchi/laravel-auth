<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::all();
        return view('guest.index', compact('posts'));
    }

    public function show($slug){
        $post = Post::where('slug', $slug)->first();

        return view('guest.show',compact('post','slug'));
    }
}
