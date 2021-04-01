@extends('layout')
@section('content')


<br><br><br>

<div class="row" style="margin-top:100px;">
  <div class="col-sm-3"></div><!--end of col-sm-3-->
  <div class="col-sm-6">

<form action=" {{ route('import-file-implementation') }}" method="POST">
{{csrf_field()}}
  <div class="form-group">
    <label for="exampleInputEmail1">Name</label>
    <input type="file" name="file" class="form-control" >
    <span class="text-danger">{{ $errors->first('file') }}</span>
  </div>
 
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

</div><!--end of col-sm-6-->
  <div class="col-sm-3"></div><!--end of col-sm-3-->
</div><!--end of row-->

@endsection