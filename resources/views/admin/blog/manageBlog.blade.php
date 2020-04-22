@extends('admin.master')

@section('title')
	Manage Blog
@endsection


@section('body')

  {{ Session::get('response') }}
	<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <!-- <th scope="col">Short Detail</th> -->
      <!-- <th scope="col">Long Detail</th> -->
      <th scope="col">Date</th>
      <th scope="col">Status</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  @php($i=1)
  	@foreach($blogs as $blog)
    <tr>
      <th scope="row">{{ $i++ }}</th>
      <td><img src="{{ asset($blog->image) }}" alt="" style="width:100px;height:100px;"></td>
      <td>{{ $blog->title }}</td>
      <!-- <td>{{ $blog->shortDetail }}</td> -->
      <!-- <td>{{ $blog->longDetail }}</td> -->
      <td>{{ $blog->publishedAt }}</td>
      <td>{{ $blog->status == 0 ? 'Published' : 'Unpublished' }}</td>
      <td>
      		<a class="btn btn-success" href="{{ route('edit-blog',['id' =>$blog->id,'name'=>$blog->title ]) }}">Edit</a>
      		<a class="btn btn-danger " id="{{ $blog->id }}" href="" onclick="
              event.preventDefault();
              var check = confirm('Are You Sure?');
              if(check){
                document.getElementById('del-form'+'{{ $blog->id }}').submit();
              }
          ">Delete</a>
          <form action="{{ route('delete-blog') }}" method="POST" id="del-form{{ $blog->id }}">
          @csrf
            <input type="hidden" value="{{ $blog->id }}" name="id">
          </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection