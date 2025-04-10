<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Post;


class CommentController extends Controller
{
    public function index(){

        $post=Post::all();
        return view('dashboard',compact('post'));
    }
    
}
