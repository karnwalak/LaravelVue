@extends('layouts.main')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Create Country</h1>
</div>

<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card mx-auto">
      <div class="card-header">{{ __('Create New Country') }}<a href="{{route('country')}}" class="float-right">Back</a></div>

      <div class="card-body">
        <form method="POST" action="{{ route('store_country') }}">
          @csrf
          <div class="row mb-3">
            <label for="country_code" class="col-md-4 col-form-label text-md-end">{{ __('Country Code') }}</label>

            <div class="col-md-6">
              <input id="country_code" type="text" class="form-control @error('country_code') is-invalid @enderror"
                name="country_code" value="{{ old('country_code') }}"  autocomplete="country_code" autofocus>

              @error('country_code')
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
                {{ __('Add Country') }}
              </button>
            </div>
          </div>
        </form>


       
      </div>
    </div>
  </div>
</div>

@endsection