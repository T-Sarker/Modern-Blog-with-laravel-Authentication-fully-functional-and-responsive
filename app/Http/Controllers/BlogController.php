<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Blog;

class BlogController extends Controller
{
    public function addBlog(){
    	return view('admin.blog.addBlog',[
    		'categories' => Category::where('status',0)->get()
    	]);
    }

    public function addnewBlog(Request $request){
        $blog = new Blog();
    	$blog->insertBloginfo($request);

    	return redirect('/blog/add-blog')->with('message','Blog Added Successfuly');
    }

    public function manageBlog(){

    	return view('admin.blog.manageBlog',[
    			'blogs'  => Blog::all()
    		]);
    }


    public function editBlog($id,$name){
        return view('admin.blog.editBlog',[
                'categories' => Category::where('status',0)->get(),
                'blog'       => Blog::find($id)
        ]);
    }


    public function updateNewBlog(Request $request){

            $blog = new Blog();

            $blog->updateBlogIntoDB($request);

            return redirect('/blog/manage-blog')->with('response','Blog Update Successfuly !');
    }


    public function deleteBlog(Request $request){

            $blog = Blog::find($request->id);

            $image = $blog->image;

            unlink($image);

            $blog->delete();

            return redirect('/blog/manage-blog')->with('response','Blog Update Successfuly !');
    }
}
