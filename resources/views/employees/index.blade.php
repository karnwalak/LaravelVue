@extends('layouts.main')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Employees</h1>
</div>
<div id="myDiv" style="visibility: hidden;position:relative;top:150px;left:50%;z-index:111">
  <img src="{{ url('img/loader.gif') }}" style="height:80px;" />
</div>
<div class="row justify-content-center">
  <div class="col-md-10">
    <div class="card mx-auto">
      <div>
        @if(Session::has('message'))
        <div class="alert alert-success">
          {{Session::get('message')}}
        </div>
        @endif
        @if(Session::has('error'))
        <div class="alert alert-danger">
          {{Session::get('error')}}
        </div>
        @endif
      </div>
      <div class="card-header">
        <div class="row">
          <div class="col-md-4">
            <input type="search" name="search" id="search" class="form-control mx-3" placeholder="Search .....">
          </div>
          <div class="col-md-4">
            <select class="form-control" id="department">
              <option value="">Select Department</option>
              @foreach ($department as $dd)
              <option value="{{$dd->id}}">{{$dd->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-4">
            <a href="{{route('employees.create')}}" class="float-right btn btn-primary">Create</a>
          </div>
        </div>
      </div>
      <div class="card-body">
        <table class="table" id="myTable">
          <thead>
            <tr>
              <th scope="col">ID</th>
              <th scope="col">First Name</th>
              <th scope="col">Middle Name</th>
              <th scope="col">Last Name</th>
              <th scope="col">Address</th>
              <th scope="col">Department</th>
              <th scope="col">Date of Birth</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            @php $a=1; @endphp
            @foreach ($employee as $ee)
            <tr>
              <th scope="row">#{{$a++}}</th>
              <td>{{$ee->first_name}}</td>
              <td>{{$ee->middle_name}}</td>
              <td>{{$ee->last_name}}</td>
              <td>{{$ee->address}}</td>
              <td>{{$ee->department}}</td>
              <td>{{date('d/m/Y',strtotime($ee->birth_date))}}</td>
              <td>
                <a href="{{route('employees.edit',$ee->id)}}" class="btn btn-success">Edit</a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script>
  $(document).ready(function(){
    $('#search').keyup(function(){
      var val = $(this).val();
      $.ajax({
        url : "{{route('search-employees')}}",
        method : "GET",
        dataType : "JSON",
        data : {'val' : val},
        beforeSend: function() {
            $("#myDiv").css('visibility', 'visible');
        },
        success : function(res){
          $("#myDiv").css('visibility', 'hidden');
          $('#myTable tbody').html('');
          $.each(res,function(key,val){
            var id = key+1;
            $('#myTable tbody').append('<tr><th>#'+id+'</th><td>'
              +val.first_name+
              '</td><td>'
              +val.middle_name+
              '</td><td>'
              +val.last_name+
              '</td><td>'
              +val.address+
              '</td><td>'
              +val.department+
              '</td><td>'
              +val.birth_date+
              '</td><td><a href="employees/'+val.id+'/edit" class="btn btn-success">Edit</a></td></tr>');
          });
        }
      });
    });
    $('#department').change(function(){
      var val = $(this).val();
      $.ajax({
        url : "{{route('search-by-department')}}",
        method : "GET",
        dataType : "JSON",
        data : {'val' : val},
        beforeSend: function() {
            $("#myDiv").css('visibility', 'visible');
        },
        success : function(res){
          $("#myDiv").css('visibility', 'hidden');
          $('#myTable tbody').html('');
          $.each(res,function(key,val){
            var id = key+1;
            $('#myTable tbody').append('<tr><th>#'+id+'</th><td>'
              +val.first_name+
              '</td><td>'
              +val.middle_name+
              '</td><td>'
              +val.last_name+
              '</td><td>'
              +val.address+
              '</td><td>'
              +val.department+
              '</td><td>'
              +val.birth_date+
              '</td><td><a href="employees/'+val.id+'/edit" class="btn btn-success">Edit</a></td></tr>');
          });
        }
      });
    });
  });
</script>
@endsection