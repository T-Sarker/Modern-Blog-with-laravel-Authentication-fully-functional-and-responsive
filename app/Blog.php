<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{

	protected $fillable = ['title','category','shortDetail','longDetail','image','publishedAt','status'];


    private function uploadImage($image){

        
        $imageName = $image->getClientOriginalName();
        $directory = 'blog-images/';
        $image->move($directory,$imageName);

        return $directory.$imageName;
    }

    public function insertBloginfo($request){

    	$publishDate = date('Y-m-d');
    	$blog = new Blog();

        // $image = $request->file('image');
        // $imageName = $image->getClientOriginalName();
        // $directory = 'blog-images/';
        // $image->move($directory,$imageName);

    	$blog->title  =   $request->blogTitle;
    	$blog->category  =   $request->category;
    	$blog->shortDetail  =   $request->shortDetail;
    	$blog->longDetail  =   $request->longDetail;
    	$blog->image  =   $this->uploadImage($request->file('image'));
    	$blog->publishedAt  =   $publishDate;
    	$blog->status  =   $request->status;

    	$blog->save();
    }


    public function updateBlogIntoDB($request){

        $blog = Blog::find($request->id);
        $blogImage = $request->file('image');


        $publishDate = date('Y-m-d');

        if ($blogImage) {
            
            

            unlink($blog->image);
            $imagePath = $this->uploadImage($blogImage);
        }

            // $blogImage = $request->file('image');

            // $imageName = $blogImage->getClientOriginalName();

            // $directory ='blog-images/';

            // $blogImage->move($directory,$imageName);

            $blog->title  =   $request->blogTitle;
            $blog->category  =   $request->category;
            $blog->shortDetail  =   $request->shortDetail;
            $blog->longDetail  =   $request->longDetail;
            if (isset($imagePath)) {
                
                $blog->image  =   $imagePath;
            }
            $blog->publishedAt  =   $publishDate;
            $blog->status  =   $request->status;

            $blog->save();


        }
    
}
