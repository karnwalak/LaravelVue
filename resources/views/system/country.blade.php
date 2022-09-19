@extends('layouts.main')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Country</h1>
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
          <form class="d-flex" method="GET" action="{{route('country')}}">
            @csrf
            <input type="search" name="search" class="form-control mx-3" placeholder="Search .....">
            <button type="submit" class="btn btn-primary">Search</button>
          </form>
        </div>
        <div class="col-md-4">
          <a href="{{route('add_country')}}" class="float-right btn btn-primary">Create</a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Country Code</th>
            <th scope="col">Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @php $a=1; @endphp
          @foreach ($country as $data)
          <tr>
            <th scope="row">{{$a++}}</th>
            <td>{{$data->country_code}}</td>
            <td>{{$data->name}}</td>
            <td>
              <a href="{{route('edit_country',$data->id)}}" class="btn btn-success">Edit</a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@endsection