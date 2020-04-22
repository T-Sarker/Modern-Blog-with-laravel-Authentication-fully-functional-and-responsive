<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Session;
use Mail;
use DB;

class Signup extends Model
{
    protected $fillable = ['visitorName','visitorEmail','visitorPhone','visitorCity','image','password','joinDate','status'];

    private function uploadImages($image){

    	$imageName = $image->getClientOriginalName();
    	$directory = 'user-images/';
    	$image->move($directory,$imageName);

    	return $directory.$imageName;

    }

    public function saveSignUpDataInDB($request){

    	$dates = date('d-m-Y');

    	$signup = new Signup();

    	$signup->visitorName = $request->visitorName;
    	$signup->visitorEmail = $request->visitorEmail;
    	$signup->visitorPhone = $request->visitorPhone;
    	$signup->visitorCity = $request->visitorCity;
    	$signup->image = $this->uploadImages($request->file('image'));
    	$signup->password = bcrypt($request->password);
    	$signup->joinDate = $dates;
    	$signup->status = 0;

    	$signup->save();

    	Session::put('visitorName',$signup->visitorName);
    	Session::put('email',$signup->visitorEmail);
    	Session::put('visitorId',$signup->id);

    	$data = $signup->toArray();

    	Mail::send('mail/congratulation-mail',$data,function ($message) use ($data){
    		$message->to($data['visitorEmail']);
    		$message->subject('Welcome To My Blog');
    		$message->from('tapos.k.sarker25@gmail.com','My Blog');
    	});

    }

    public static function checkEmailStatusOnDB($email){

        $emailCheck = Signup::where('visitorEmail',$email)->first();
        
        if ($emailCheck) {

            return 'true';
        }elseif (empty($emailCheck)) {
            
            return 'false';
        }

        else{

            return 'Email Blank Or Error!!';
        }
    }


    
}
