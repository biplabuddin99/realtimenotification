<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Events\PostCreate;


class PostController extends Controller
{
    public function index(){
        $posts =Post::latest()->get();
        return view("posts",compact("posts"));
    }
    public function store(Request $request){
        $request->validate([
            'title' => 'required',
            'body' => 'required'
        ]);
        $post=Post::create([
            'title' =>$request->title,
            'body' =>$request->body
        ]);
        event(new PostCreate($post));
        return redirect()->back();
    }
}
