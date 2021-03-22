<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>

</head>
<body>

  <div class="container">
   <div class="row">
     <div class="col-sm-12">
      <div class="card-header">
      Student <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentModal">Add</button>
      </div>
      <div class="card-body">
      <table id="studentTable" class="table">
       <thead>
         <tr>
         <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
      <th scope="col">Update</th>
         </tr>
       </thead>
       <tbody>
       @foreach($student as $row)
    <tr id="2">
      <th scope="row">1</th>
      <td>{{ $row['name'] }}</td>
      <td>{{ $row['phone'] }}</td>
      <td>{{ $row['address'] }}</td>
      <td><a href="javascript:void(0)" class="btn btn-danger btm-sm editCategory " onclick="editStudent( {{ $row['id'] }})">Popup Edit</a></td>
    </tr>
    @endforeach
       </tbody>
      </table>
      </div>
     </div>
   </div>
  </div>


 

<!-- Modal -->
<div class="modal fade" id="studentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Student</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="studentForm">
          @csrf
          <div class="form-group">
          <label for="name">Name</label>
          <input type="text" name="name" class="form-control" />
          </div>
          <div class="form-group">
          <label for="name">Phone</label>
          <input type="text" name="phone" class="form-control" />
          </div>
          <div class="form-group">
          <label for="name">Address</label>
          <input type="text" name="address" class="form-control" />
          </div>
          <button type="submit" class="btn btn-success">submit</button>
        </form>
      </div>
    </div>
  </div>
</div>


<script>

$('#studentForm').submit(function(){
 
 var name = $("input[name=name]").val();
 var phone = $("input[name=phone]").val();
 var address = $("input[name=address]").val();
 var _token = $("input[name=_token]").val();


$.ajax({
  url:"{{ route('student-add') }}",
  
  type:"POST",
  data:{
      name:name,
      phone:phone,
      address:address,
      _token:_token
  },

  success:function(response)
  {
       alert('dfd');
      console.log(response);
  }

});


})

</script>
    
</body>
</html>