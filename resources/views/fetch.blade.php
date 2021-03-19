@extends('layout')
@section('content')

<br><br><br>
<a class="btn btn-success" href="{{ route('Student-view') }}">View Student</a>
<a class="btn btn-warning" href="{{ route('Student-submit-From') }}">Student Add</a><br><br>
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
      <td><a href="javascript:void(0)" class="btn btn-danger btm-sm editCategory " onclick="editStudent(2)">Popup Edit</a></td>
      <td><a href="edit/{{$row['id'] }}" class="btn btn-danger btm-sm">Edit</a></td>
      <td><a href="destroy/{{$row['id'] }}" class="btn btn-danger btm-sm">Delete</a></td>
    </tr>
    @endforeach
  </tbody>
</table>


<div class="modal fade" id="studentEditModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="studentForm">
        @csrf
        <input type="hidden" name="id" id="id" />
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" name="name" class="form-control" id="name">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" name ="phone" class="form-control" id="phone">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Recipient:</label>
            <input type="text" name="address" class="form-control" id="address">
          </div>
          <button type="submit" class="btn btn-primary">Send message</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>



<script>
function editStudent(id)
{
    $.get('/UpdateStudentDataAjaxGetID/'+id,function(student){
        $('#id').val(student.id);
        $('#name').val(student.name);
        $('#phone').val(student.phone);
        $('#address').val(student.address);
        $("#studentEditModel").modal("toggle");

        
    });
}

 $('#studentForm').submit(function(e){
     e.preventDefauld();
     var id = $('#id').val();
     var name = $('#name').val();
     var phone = $('#phone').val();
     var address = $('#address').val();
     var _token=$("input[name=_token]").val();

     $.ajax({
         url : '{{ route('student.update') }}',
         type: 'PUT',
         data:{
             id:id,
             name:name,
             phone:phone,
             address:address,
             _token:_token
         },
         success:function(response){
            $('#sid'+response.id + 'td:nth-child(1)').text(response.name);
            $('#sid'+response.id + 'td:nth-child(1)').text(response.phone);
            $('#sid'+response.id + 'td:nth-child(1)').text(response.address);
            $('studentEditModel').model('toggle');
            $('studentForm')[0].reset();
         }
     });
 })
</script>

@endsection