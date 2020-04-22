@extends('admin.master')

@section('title')
	Edit Test
@endsection


@section('body')

	<h3>{{ Session::get('message') }}</h3>
	<form action="{{ route ('update-test') }}" method="POST">
		@csrf
	  <div class="row">
	    <div class="col">
	      <input type="text" class="form-control" name="firstName" value="{{ $test->firstName }}">
	      <input type="hidden" class="form-control" name="id" value="{{ $test->id }}">
	    </div>
	    <div class="col">
	      <input type="text" class="form-control" name="lastName" value="{{ $test->lastName }}">
	    </div>
	  </div>

	  <div class="row mt-4">
	    <div class="col">
	      <input type="number" class="form-control" name="age" value="{{ $test->age }}">
	    </div>
	    <div class="col">
	      <input type="submit" class="btn btn-success" name="submit" value="Update">
	    </div>
	  </div>
	</form>
@endsection