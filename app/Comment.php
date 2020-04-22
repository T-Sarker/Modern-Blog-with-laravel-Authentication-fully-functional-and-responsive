<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Comment extends Model
{
    public static function makeCommentInPost($request){

    	$comment = new Comment();

    	$comment->userId 	= 	$request->userId;
    	$comment->postId 	= 	$request->postId;
    	$comment->comment 	= 	$request->comment;
    	$comment->status 	= 	0;

    	$comment->save();

    	
    }


    
}
