<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Category;

class AllNavController extends Controller
{
    public function index()
    {
        return view('home.home',[
        	'blogs'      => Blog::where('status',0)->orderBy('id','desc')->paginate(3),
            'categories' => Category::where('status',0)->orderBy('id','desc')->take(12)->get(),
            'allBlogs'   => Blog::where('status',0)->orderBy('id','desc')->get()
       	]);
    }


    public function allCategoryView($id,$name,$extra){

        return view('category.showCategoryBlog',[
            'blogs'      => Blog::where('category',$name)->where('status',0)->orderBy('id','desc')->get(),
            'categories' => Category::where('status',0)->orderBy('id','desc')->take(12)->get()
        ]);
    }

    public function singleBlogDetailsShow($id,$name){

        return view('details.singleBlog',[
            'blog'      => Blog::find($id),
            'categories' => Category::where('status',0)->orderBy('id','desc')->take(12)->get()
        ]);
    }
}
