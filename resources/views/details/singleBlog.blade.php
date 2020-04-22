@extends('master')

@section('title')
	Single | blog
@endsection


@section('body')
	<div class="row">
	<div class="col-lg-9">
		<div class="container">
        <!-- Title -->
        <h1 class="mt-4">{{ $blog->title }}</h1>

        <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="{{ asset($blog->image) }}" alt="">

        <hr>

        <!-- Date/Time -->
        <p>Posted on {{ $blog->publishedAt }}</p>

        <hr>

        <!-- Post Content -->
        <p class="lead">{!! $blog->shortDetail !!}</p>

         <hr>

        <!-- Preview Image -->
        <img class="img-fluid rounded" src="https://steemitimages.com/0x0/https://cl.ly/mdV1/Screen%20Recording%202017-09-21%20at%2012.45%20pm.gif" alt="">

        <hr>

        <p>{!! $blog->longDetail !!}</p>

        <hr>
        
        @if(Session::get('visitorName') && Session::get('visitorId'))
        <!-- Comments Form -->
              <div class="card my-4">
                <h5 class="card-header">Leave a Comment:</h5>
                <small>{{ Session::get('message') }}</small>
                <div class="card-body">
                  <form action="{{ route('visitor-comment') }}" method="POST">
                  @csrf
                    <div class="form-group">
                    <input type="hidden" value="{{ Session::get('visitorId') }}" name="userId">
                    <input type="hidden" value="{{ $blog->id }}" name="postId" id="postId">
                    <input type="hidden" value="{{ $blog->title }}" name="postName">
                      <textarea class="form-control" rows="3" name="comment"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
        @else
          <div class="card my-4">
           <p>You Must <a href="{{ route('user-login') }}">Login</a> Or <a href="{{ route('sign-up') }}">Signup</a> To make a Comment</p>
          </div>
        @endif

        <!-- Single Comment -->
        <div class="commentWraper">
          
        </div>

        
		</div>
      </div>
      @include('inc.sidebar')
      </div>

      
@endsection