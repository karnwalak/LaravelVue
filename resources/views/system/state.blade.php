@extends('layouts.main')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">State</h1>
</div>

<div class="row">
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
        <div class="col-md-8">
          <form class="d-flex" method="GET" action="{{route('state')}}">
            @csrf
            <input type="search" name="search" class="form-control mx-3" placeholder="Search .....">
            <button type="submit" class="btn btn-primary">Search</button>
          </form>
        </div>
        <div class="col-md-4">
          <a href="{{route('add_state')}}" class="float-right btn btn-primary">Create</a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Country</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @php $a=1; @endphp
          @foreach ($state as $data)
          <tr>
            <th scope="row">{{$a++}}</th>
            <td>{{$data->country_name}}</td>
            <td>{{$data->name}}</td>
            <td>
              <a href="{{route('edit_state',$data->id)}}" class="btn btn-success">Edit</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection