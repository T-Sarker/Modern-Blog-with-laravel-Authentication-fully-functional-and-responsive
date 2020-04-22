@extends ('admin.master')

@section('title')
	Add Category
@endsection


@section('body')
	
		<div class="page-header">
	        <h3 class="page-title">
	            <span class="page-title-icon bg-gradient-primary text-white mr-2">
	                <i class="mdi mdi-home"></i>
	            </span> Add Category </h3>
	        <nav aria-label="breadcrumb">
	            <ul class="breadcrumb">
	                <li class="breadcrumb-item active" aria-current="page">
	                    <span></span>Fill the Field <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
	                </li>
	            </ul>
	        </nav>
	    </div>
	    
		  <h4 class="text-primary">{{ Session::get('message') }} </h4>
		
	    
		<form action="{{ route ('update-category') }}" method="POST">
		@csrf
			  <div class="form-group">
			    <label for="formGroupExampleInput">Category Name</label>
			    <input type="text" class="form-control" id="formGroupExampleInput" name="category" value="{{ $category->category }}">
			    <input type="hidden" class="form-control" id="formGroupExampleInput" name="id" value="{{ $category->id }}">
			  </div>
			  <div class="form-group">
			    <label for="formGroupExampleInput">Category Description</label>
			    <input type="text" class="form-control" id="formGroupExampleInput" name="description" value="{{ $category->description }}">
			  </div>
			  <div class="form-group">
			    <label for="formGroupExampleInput" class="mr-4">Category Status</label>
			    <input type="radio" name="status" value="0" {{ $category->status ==0 ? 'checked' : '' }}> Published
			    <input type="radio" name="status" value="1" class="ml-3" {{ $category->status ==1 ? 'checked' : '' }}> Un-Published
			  </div>
			  <div class="form-group">
			    <button type="submit" class="btn btn-success" name="submit" >Submit</button>
			  </div>
		</form>
@endsection