@extends('admin.master')

@section('title')
	Manage Category
@endsection


@section('body')
	<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Category</th>
      <th scope="col">Description</th>
      <th scope="col">Status</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  @php($i=1)
  	@foreach($categories as $category)
    <tr>
      <th scope="row">{{ $i++ }}</th>
      <td>{{ $category->category }}</td>
      <td>{{ $category->description }}</td>
      <td>{{ $category->status == 0 ? 'Published' : 'Unpublished' }}</td>
      <td>
      		<a class="btn btn-success" href="{{ route ('edit-category',['id' => $category->id,'name'=> $category->category]) }}">Edit</a>
      		<a class="btn btn-danger delete-btn" id="{{ $category->id }}" href="">Delete</a>
          <form action="{{ route('delete-category') }}" method="POST" id="delForm{{ $category->id }}">
          @csrf
            <input type="hidden" name="id" value="{{ $category->id }}">
          </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection