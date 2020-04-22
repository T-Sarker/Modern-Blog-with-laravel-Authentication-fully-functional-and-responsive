@extends('admin.master')

@section('title')
	Manage Test
@endsection


@section('body')
  <h4 class="text-primary">{{ Session::get('message') }} </h4>
	<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First Name</th>
      <th scope="col">Last Name</th>
      <th scope="col">Age</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  @php($i =1 )
  	@foreach($test as $showTest)
    <tr>
      <th scope="row">{{ $i++ }}</th>
      <td>{{ $showTest->firstName }}</td>
      <td>{{ $showTest->lastName }}</td>
      <td>{{ $showTest->age }}</td>
      <td>
      	<a href="{{ route('edit-test',['id'=>$showTest->id ,'name'=>$showTest->firstName])}}" class="btn btn-success">Edit</a>

      	<a href="" class="btn btn-warning delete-btn" id="{{ $showTest->id }}">Delete</a>

        <form action="{{ route('delete-test') }}" method="POST" id="delForm{{ $showTest->id }}">
        @csrf
          <input type="hidden" value="{{ $showTest->id }}" name="id">
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
@endsection