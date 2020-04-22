<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;

class testController extends Controller
{
    public function testFunction(){

    	return view('admin.test.test');
    }


    public function newTestFunction(Request $request){

    	Test::saveTestDataIntoDB($request);

    	return redirect('/test/test-page')->with('message','test Data Inserted Successfully');
    }


    public function manageTestData(){
    	return view('admin.test.manageTest',[
    			'test' => Test::all()
    		]);
    }


    public function editTest($id,$name){

    	return view('admin.test.edit-test',[
    			'test' => Test::find($id)
    		]);
    }

    public function updateTest(Request $request){

    	Test::updateTestValue($request);

    	return redirect('/test/manage-test')->with('message','Successfully Updated');
    }

    public function deleteTest(Request $request){

        $test = Test::find($request->id);
        $test->delete();

        return redirect('/test/manage-test')->with('message','Delete Successful');
    }

}
