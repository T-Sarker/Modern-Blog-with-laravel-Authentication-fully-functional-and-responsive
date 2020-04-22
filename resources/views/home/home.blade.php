@extends ('master')

@section('title')
  home
@endsection

@section('body')

 <!-- Heading Row -->
 
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://jssors8.azureedge.net/demos/image-slider/img/px-beach-daylight-fun-1430675-image.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>First slide label</h5>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://jssors8.azureedge.net/demos/img/gallery/980x380/004.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Second slide label</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="https://jssors8.azureedge.net/demos/image-slider/img/px-beach-daylight-fun-1430675-image.jpg" class="d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Third slide label</h5>
        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

  <h3 class="text-center mt-5 mb-5">Most Popular</h3>
  <div class="row mb-2">
    @foreach($blogs as $blog)
    <div class="col-md-4 mb-4">
    <div class="row">
      <div class="col-4">
        <img src="{{ asset($blog->image) }}" class="img-thumbnail" alt="image">
      </div>
    
        <div class="col-8">
          <div class="media">
          
          <div class="media-body">
            <h5 class="mt-0" style="height:80px;"><a href="{{ route('blog-details',['id'=>$blog->id,'name'=>$blog->title]) }}" style="text-decoration:none;color:#000;font-weight:700;">{{ $blog->title }}</a> <small class="badge badge-warning">New</small></h5>
            <!-- <p>{!! substr($blog->shortDetail,0,235) !!}</p> -->
            <p class="mb-0">D<small class="text-muted">Published: {{ $blog->publishedAt }}</small></p>
          </div>
        </div>
        </div>
      </div>
    </div>

    @endforeach

    {{ $blogs->links() }}
  </div>
</div>

<main role="main" class="container-fluid">
  <div class="row">
    <div class="col-md-9 blog-main">
      <h3 class="pb-4 mt-5 font-italic border-bottom">
        From the Firehose
      </h3>

      <div class="row mb-2">
        @foreach($allBlogs as $allBlog)
        <div class="col-md-4 col-sm-6 col-xs-12 mb-5">
          <div class="card">
            <img src="{{ asset($allBlog->image) }}" class="card-img-top" style="height:200px;" alt="...">
            <div class="card-body">
              <a href="{{ route('blog-details',['id'=>$allBlog->id,'name'=>$allBlog->title]) }}" style="color:#000;Font-weight:600;text-decoration:none;"><p class="card-text" style="height:65px;text-decoration:none;">{{ $allBlog->title }}</p></a>
              <small>Published: {{ $allBlog->publishedAt }}</small>
              <a href="{{ route('blog-details',['id'=>$allBlog->id,'name'=>$allBlog->title]) }}" class="card-link p-1 btn-primary" style="float:right">Read More</a>
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