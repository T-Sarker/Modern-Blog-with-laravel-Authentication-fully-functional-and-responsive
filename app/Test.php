<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $fillable = ['firstName','lastName','age'];

    public static function saveTestDataIntoDB($request){

    	Test::create($request->all());
    }

    public static function updateTestValue($request){

    	$getTest = Test::find($request->id);

    	$getTest->firstName = $request->firstName;
    	$getTest->lastName = $request->lastName;
    	$getTest->age = $request->age;

    	$getTest->save();
    }
}
