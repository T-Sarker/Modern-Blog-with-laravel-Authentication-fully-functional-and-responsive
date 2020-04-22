<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['category','description','status'];

    public static function saveCategoryIntoDB($request){

    	// submitting query into db is done by two methods, 1. query builder 2.elegent query
    	// ----example : query builder
    	// DB::table('categories')-> insert([
    	// 	'category' => $request->category,
    	// 	'description' => $request->description,
    	// 	'status' => $request->status
    	// ]);

    	// return 'success';

    	// Another method.............

    	// $category = new Category();

    	// $category->category = $request->category;
    	// $category->description = $request->description;
    	// $category->status = $request->status;

    	// $category->save();


    	// Another method easiest yet

    	Category::create($request->all());
    }


    public static function updateCategoryIntoDB($request){

        $category = Category::find($request->id);

        $category->category = $request->category;
        $category->description = $request->description;
        $category->status = $request->status;

        $category->save();

    }
}
