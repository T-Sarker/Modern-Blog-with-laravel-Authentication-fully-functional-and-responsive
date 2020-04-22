<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Category;

class CategoryController extends Controller
{
    public function addCategory(){
    	return view('admin.category.addCategory');
    }


    public function newCategory(Request $request){

    	// saving or talking with db must not be done in controller it should be done in model
        $this->validate($request,[
            'category' => 'required|alpha'
        ]);

        $request->validate([
            'description' => 'required',
            'status' => 'required'
        ]);

    	Category::saveCategoryIntoDB($request);

    	return redirect('/category/add-category')->with('message','Category Inserted Successfully!');
    }


    public function manageCategory(){
    	
    	return view('admin/category/manageCategory',[
    			'categories' => Category::all()
    	]);
    }


    public function editCategory($id,$name){


        return view('admin/category/editCategory',[

                    'category' => Category::find($id)
            ]);
    }


    public function updateCategory(Request $request){

        Category::updateCategoryIntoDB($request);

        return redirect('/category/manage-category')->with('message','Update Successfull');
    }



    public function deleteCategory(Request $request){

        $delTest = Category::find($request->id);
        $delTest->delete();

        return redirect('/category/manage-category')->with('message',"Deleted Successfuly");
    }
}
