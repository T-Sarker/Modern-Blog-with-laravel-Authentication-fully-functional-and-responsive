@extends('master')


@section('title')
	category | Blog
@endsection


@section('body')
	<main role="main" class="container-fluid">
  <div class="row">
    <div class="col-md-9 blog-main">
      <h3 class="pb-4 mt-5 font-italic border-bottom">
        Related Blogs
      </h3>

      	<div class="row mb-2">
			@foreach($blogs as $blog)
	        <div class="col-md-4 col-sm-6 col-xs-12">
	          <div class="card">
	            <img src="{{ asset($blog->image) }}" style="height:250px" class="card-img-top" alt="...">
	            <div class="card-body">

	              <a href="{{ route('blog-details',['id'=>$blog->id,'name'=>$blog->title]) }}"><h6 style="height:50px;">{{ $blog->title }}</h6></a>

	              <p class="card-text">{!! substr($blog->shortDetail,0,150) !!}</p>

	              <a class="card-link" disabled><small>Published: {{ $blog->publishedAt }}</small></a>

	              <a href="{{ route('blog-details',['id'=>$blog->id,'name'=>$blog->title]) }}" class="card-link p-1 btn-primary">Read More</a>
	            </div>
	          </div>
	        </div>
	        @endforeach
 		</div>

      <nav class="blog-pagination">
        <a class="btn btn-outline-primary" href="#">Older</a>
        <a class="btn btn-outline-secondary disabled" href="#" tabindex="-1" aria-disabled="true">Newer</a>
      </nav>

    </div><!-- /.blog-main -->

    @include('inc.sidebar')

  </div><!-- /.row -->

</main><!-- /.container -->
@endsection