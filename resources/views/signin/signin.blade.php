@extends('master')

@section('title')
	Signin | Blog
@endsection




@section('body')
	<div class="row">
		<div class="col-md-9 col-lg-9 c0l-sm-6 col-xs-12 mt-5">

			<form class="container col-7" action="{{ route('sign-in-user') }}" method="POST">
			<h5>{{ Session::get('message') }}</h5>
			@csrf
				  <h3>Sign In</h3>
				  <div class="form-group">
				    <label for="Email">Email</label>
				    <input type="email" class="form-control" id="Email" name="visitorEmail" Placeholder="Your Email" required>
				  </div>
				  <div class="form-group">
				    <label for="password">Password</label>
				    <input type="password" class="form-control" id="password" name="password" placeholder="Your Password" required>
				  </div>
				  <button type="submit" class="btn btn-primary" >SIGN IN</button>
				</form>
		</div>
		@include('inc.sidebar')
	</div>
@endsection