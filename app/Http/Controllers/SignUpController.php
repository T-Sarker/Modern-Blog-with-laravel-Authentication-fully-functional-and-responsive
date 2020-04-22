<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Category;
use App\Signup;

class SignUpController extends Controller
{
    public function signup(){

    	return view('signup.signup',[
    		'categories' => Category::where('status',0)->orderBy('id','desc')->take(12)->get()
    	]);
    }

    public function userSignUp(Request $request){

    	$signup = new Signup();

    	$signup->saveSignUpDataInDB($request);

    	return redirect('/');
    }

    public function logoutUser(){

    	Session::forget('visitorName');
    	Session::forget('email');
    	Session::forget('visitorId');

    	return redirect('/');
    }

    public function userSignin(){
    	return view('signin.signin',[
    			'categories' => Category::where('status',0)->orderBy('id','desc')->take(12)->get()
    	]);

    }

    public function signInUser(Request $request){

    	$visitor = Signup::where('visitorEmail',$request->visitorEmail)->first();

    	if ($visitor) {
    		
    		if (password_verify($request->password,$visitor->password)) {
    		
	    		Session::put('visitorName',$visitor->visitorName);
		    	Session::put('email',$visitor->visitorEmail);
		    	Session::put('visitorId',$visitor->id);

		    	return redirect('/');

	    	}else{

	    		return redirect('/signin/user-login')->with('message','Incorrect Password! Try Again.');
	    	}
    	}else{

    		return redirect('/signin/user-login')->with('message','Incorrect Information! Try Again.');
    	}
    }

    public function checkEmailStatus(Request $request){

        $email = $request->emailx;

        $response = Signup::checkEmailStatusOnDB($email);

        return $response;
    }
}
