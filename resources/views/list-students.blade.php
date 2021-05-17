<!DOCTYPE html>
<html lang="en">
<head>
  <title>List Students</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css"
  
</head>
<body> 

<div class="container">
  <h2>List Student</h2>
  
  @if(session()->has("success"))
    <div class="alert alert-success">
      {{ session("success") }}
    </div>
      
  @endif

  <table class="table table-striped" id="tbl-list-students">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>E-mail</th>
        <th>Mobile</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>

      @foreach($students as $student)
      <tr>
        <td>{{ $student->id }}</td>
        <td>{{ $student->name}}</td>
        <td>{{ $student->email}}</td>
        <td>{{ $student->mobile }}</td>
        <td>

          <a class="btn btn-info" href="edit/{{ $student->id }}">Edit</a>
          <a href="delete/{{ $student->id }}" class="btn btn-primary">Delete</a>
          
        </td>
      </tr>
      @endforeach
      
    </tbody>
  </table>
</div>

<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

<script>
  $(document).ready( function () {
    $('#tbl-list-students').DataTable();
} );
</script>

</body>
</html>
