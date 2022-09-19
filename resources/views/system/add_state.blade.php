@extends('layouts.main')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Create State</h1>
</div>

<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card mx-auto">
      <div class="card-header">{{ __('Create New State') }}<a href="{{route('state')}}" class="float-right">Back</a></div>

      <div class="card-body">
        <form method="POST" action="{{ route('store_state') }}">
          @csrf
          <div class="row mb-3">
            <label for="country_name" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>

            <div class="col-md-6">
              <select class="form-control" name="country_name">
                <option value="">Select Country</option>
                @foreach ($country as $val)
                <option value="{{$val->id}}">{{$val->name}}</option>
                @endforeach
              </select>
              @error('country_name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="row mb-3">
            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

            <div class="col-md-6">
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                name="name" value="{{ old('name') }}"  autocomplete="name" autofocus>

              @error('name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary">
                {{ __('Add State') }}
              </button>
            </div>
          </div>
        </form>


       
      </div>
    </div>
  </div>
</div>

@endsection