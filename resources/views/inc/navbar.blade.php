<div class="blogHeader" style="width:99%">
  <header class="blog-header py-3">
    <div class="row flex-nowrap justify-content-between align-items-center">
      <div class="col-4 pt-1">
        <!-- <a class="text-muted" href="#">Subscribe</a> -->
      </div>
      <div class="col-4 text-center">
        <a class="blog-header-logo text-dark" href="{{ route('/') }}"><h1>Large</h1></a>
      </div>
      <div class="col-4 d-flex justify-content-end align-items-center">
        <a class="text-muted" href="#" aria-label="Search">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
        </a>
        @if(Session::get('visitorName') && Session::get('visitorId'))

        <div class="dropdown mr-4">
          <button class="btn btn-sm btn-outline-secondary mr-2 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            {{ Session::get('visitorName') }}
          </button>
          <div class="dropdown-menu mr-5" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="#"onclick="
                event.preventDefault();
                document.getElementById('logoutForm').submit();
            ">Logout</a>
            <form action="{{ route('logout-user') }}" method="POST" id="logoutForm">
              @csrf
            </form>
          </div>
        </div>
        @else
        <a class="btn btn-sm btn-outline-secondary mr-2" href="{{ route('user-login') }}">Login</a>
        <a class="btn btn-sm btn-outline-secondary" href="{{ route('sign-up') }}">Sign up</a>
        @endif
      </div>
    </div>
  </header>

  <div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
      @foreach($categories as $category)
      <a class="p-2 text-muted" href="{{ route('all-category-blog',['id'=>$category->id,'name'=>$category->category,'extra'=>$category->category.'-Wise-blog-showing']) }}">{{ $category->category }}</a>

      @endforeach
    </nav>
  </div>
</div>