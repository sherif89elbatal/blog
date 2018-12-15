<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Post;
use App\Comment;

class CommentsController extends Controller
{
    

    public function store(Request $request,Post $post){

    	$comment = new Comment;

    	$comment->body = request('body');

    	$comment->post_id = $post->id ;

    	$comment->user_id = Auth::id() ;

    	$comment->save();

    	return back();

    }
}
