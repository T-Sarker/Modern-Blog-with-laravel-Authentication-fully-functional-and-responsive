<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use DB;

class CommentController extends Controller
{
   	public function makeAcomment(Request $request){

   		Comment::makeCommentInPost($request);

   		return redirect('/details/blog-details/'.$request->postId.'/'.$request->postName)->with('message','Comment Saved.');
   	}


   	public function showComments(Request $request){

   		// return "<script>alert(".$request->postid.") </script";
   		// return $request->postid;
   		$comments = DB::table('comments')
            ->join('signups', 'comments.userId', '=', 'signups.id')
            ->select('comments.*', 'signups.visitorName','signups.image')
            ->where ('comments.postId','=',$request->postid)
            ->orderBy('comments.id','desc')
            ->get();

            $comm = json_decode($comments);

            return $comm;
   	}
}
