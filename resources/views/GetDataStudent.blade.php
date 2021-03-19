@extends('layout')
@section('content')

<a href="{{ route('Studentadd') }}">View Data</a>
  @if(\Session::has('success'))
  <div class="alert alert-success">
   <p>{{ \Session::get('success') }}</p>
  </div>
  @endif

  <table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
      <th scope="col">Update</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>
  <tbody>
  @foreach($student as $row)
    <tr id="2">
      <th scope="row">1</th>
      <td>{{ $row['name'] }}</td>
      <td>{{ $row['phone'] }}</td>
      <td>{{ $row['address'] }}</td>
      <!-- <td><a href="javascript:void(0)" class="btn btn-danger btm-sm editCategory " onclick="editStudent(2)">Edit</a></td> -->
    </tr>
    @endforeach
  </tbody>
</table>



@endsection