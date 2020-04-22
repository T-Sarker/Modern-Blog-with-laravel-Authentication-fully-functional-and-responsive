@extends('master')

@section('title')
	Signup | Blog
@endsection




@section('body')
<meta name="csrf-token" content="{{ csrf_token() }}" />
	<div class="row">
		<div class="col-md-9 col-lg-9 c0l-sm-6 col-xs-12 mt-5">
			<form class="container col-7" action="{{ route('sign-up-user') }}" method="POST" enctype="multipart/form-data">
			@csrf
				  <h3>Sign Up</h3>
				  <div class="form-group">
				    <label for="Name">Name</label>
				    <input type="text" class="form-control" id="Name" name="visitorName" Placeholder="Your Name" required>
				  </div>
				  <div class="form-group">
				    <label for="Email">Email</label>
				    <input type="email" class="form-control" id="Email" name="visitorEmail" Placeholder="Your Email" required>
					<small class="emailValidate"></small>
				  </div>
				  <div class="form-group">
				    <label for="Phone">Phone</label>
				    <input type="tel" class="form-control" id="Phone" name="visitorPhone" placeholder="Your Phone No" required>
				  </div>
				  <div class="form-group">
				    <label for="City">City</label>
				    <input type="text" class="form-control" id="City" name="visitorCity" placeholder="Your City" required>
				  </div>
				  <div class="form-group">
				    <label for="password">Image</label>
				    <input type="file" class="form-control" id="file" name="image"  required>
				  </div>
				  <div class="form-group">
				    <label for="password">Password</label>
				    <input type="password" class="form-control" id="password" name="password" placeholder="Your Password" required>
				  </div>
				  <div class="form-group">
				    <label for="confirmPassword">Confirm Password</label>
				    <input type="password" class="form-control" id="confirmPassword" onkeyup="recheckPassword();" placeholder="Your Password Again">
				    <small id="checkPass"></small>
				  </div>
				  <div class="form-group form-check">
				    <input type="checkbox" class="form-check-input" id="exampleCheck1">
				    <label class="form-check-label" for="exampleCheck1">Accept Terms & Conditions </label>
				  </div>
				  <button type="submit" class="btn btn-primary" id="submitButtonxc">Submit</button>
				</form>
		</div>
		@include('inc.sidebar')
	</div>
@endsection