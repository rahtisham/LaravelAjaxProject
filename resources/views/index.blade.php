@extends('layout')
@section('content')


<br><br><br>

<div class="row" style="margin-top:100px;">
  <div class="col-sm-3"></div><!--end of col-sm-3-->
  <div class="col-sm-6">

@if(count($errors) > 0)
  <div class="alert alert-danger">
   <ul>
   @foreach($errors->all() as $error)
    <li>{{$error}}</li>
   @endforeach
   </ul>
  </div>
  @endif
  @if(\Session::has('success'))
  <div class="alert alert-success">
   <p>{{ \Session::get('success') }}</p>
  </div>
  @endif

<form action=" {{ route('Student.InsertData') }}" method="POST">
{{csrf_field()}}
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name">
    <!-- <span class="text-danger">{{ $errors->first('name') }}</span> -->
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Phone</label>
    <input type="text" name="phone" class="form-control" id="exampleInputPassword1" placeholder="Phone">
    <!-- <span class="text-danger">{{ $errors->first('phone') }}</span> -->
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Address</label>
    <input type="text" name="address" class="form-control" id="exampleInputPassword1" placeholder="Address">
    <!-- <span class="text-danger">{{ $errors->first('address') }}</span> -->
  </div>
 <br>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div><!--end of col-sm-6-->
  <div class="col-sm-3"></div><!--end of col-sm-3-->
</div><!--end of row-->

@endsection