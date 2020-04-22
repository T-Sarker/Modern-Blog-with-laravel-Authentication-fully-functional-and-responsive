@extends('admin.master')

@section('title')
	Test Page
@endsection


@section('body')

	<h3>{{ Session::get('message') }}</h3>
	<form action="{{ route ('new-test-page') }}" method="POST">
		@csrf
	  <div class="row">
	    <div class="col">
	      <input type="text" class="form-control" name="firstName" placeholder="First name">
	    </div>
	    <div class="col">
	      <input type="text" class="form-control" name="lastName" placeholder="Last name">
	    </div>
	  </div>

	  <div class="row mt-4">
	    <div class="col">
	      <input type="number" class="form-control" name="age" placeholder="First name">
	    </div>
	    <div class="col">
	      <input type="submit" class="btn btn-success" name="submit" value="submit">
	    </div>
	  </div>
	</form>
@endsection