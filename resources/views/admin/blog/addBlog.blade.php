@extends('admin.master')

@section('title')
	Add Blog
@endsection


@section('body')
	<h3>Add Blog</h3>
	<b>{{ Session::get('message') }}</b>
	<form class="mt-3" action="{{ route('add-new-blog') }}" method="POST" enctype="multipart/form-data">
	@csrf	  
	  <div class="form-group">
	    <label>Select Category</label>
	      <select name="category" class="form-control" required>
	      	<option value="" selected disabled="true">Choose Category</option>
	      	@foreach($categories as $category)
	      	<option value="{{ $category->category }}">{{ $category->category }}</option>
	      	@endforeach
	      </select>
	  </div>  
	  <div class="form-group">
	    <label for="title">Blog Title</label>
	    <input type="text" class="form-control" id="title" name="blogTitle" placeholder="Blog Title">
	  </div>  
	  <div class="form-group">
	    <label for="description">Short Description</label>
	    <textarea class="form-control" id="description" name="shortDetail" placeholder="Blog Short Discription"></textarea>
	  </div>
	  <div class="form-group">
	    <label for="editor">Long Description</label>
	    <textarea class="form-control" id="editor" name="longDetail" placeholder="Blog Long Discription" rows="5"></textarea>
	  </div>
	  <div class="form-group">
	    <label>Blog Image</label>
	    <input type="file" class="form-control" accept="image/*" name="image">
	  </div> 
	  <div class="form-group">
	    <label for="formGroupExampleInput" class="mr-4">Blog Status</label>
	    <input type="radio" name="status" value="0"> Published
	    <input type="radio" name="status" value="1" class="ml-3"> Un-Published
	  </div>
	  <input type="submit" class="btn btn-success" name="submit" value="Submit">
	</form>
@endsection