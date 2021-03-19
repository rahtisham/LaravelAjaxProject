@extends('layout')
@section('content')

<br><br><br>
<a class="btn btn-success" href="{{ route('Student-view') }}">View Student</a>
<a class="btn btn-warning" href="{{ route('Student-submit-From') }}">Student Add</a>
<div class="row" style="margin-top:100px;">
  <div class="col-sm-3"></div><!--end of col-sm-3-->
  <div class="col-sm-6">
    
        @if(\Session::has('success'))
        <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
        </div>
        @endif
      
      <form action="{{ route('student.emplent' , $student['id']) }}" method="POST">
      {{csrf_field()}}
      @method('put')
      <input type="hidden" name="_method" value="PATCH">
        <div class="form-group">
          <label for="exampleInputEmail1">Name</label>
          <input type="text" name="name" value="{{ $student['name'] }}" class="form-control" id="exampleI nputEmail1" aria-describedby="emailHelp" placeholder="Name">
          <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Phone</label>
          <input type="text" name="phone" value="{{ $student['phone'] }}" class="form-control" id="exampleInputPassword1" placeholder="Phone">
          <span class="text-danger">{{ $errors->first('phone') }}</span>
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Address</label>
          <input type="text" name="address" value="{{ $student['address'] }}" class="form-control" id="exampleInputPassword1" placeholder="Address">
          <span class="text-danger">{{ $errors->first('address') }}</span>
        </div>
      <br>
        <button type="submit" class="btn btn-primary">Update</button>
      </form>
  
  </div><!--end of col-sm-6-->
  <div class="col-sm-3"></div><!--end of col-sm-3-->
</div><!--end of row-->


 



@endsection

