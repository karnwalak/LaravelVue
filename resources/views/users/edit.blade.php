@extends('layouts.main')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">User</h1>
</div>

<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card mx-auto">
      <div class="card-header">{{ __('Edit User') }}<a href="{{route('users.index')}}" class="float-right">Back</a></div>

      <div class="card-body">
        <form method="POST" action="{{ route('users.update',$user->id) }}">
          @csrf
          @method('PUT')
          <div class="row mb-3">
            <label for="username" class="col-md-4 col-form-label text-md-end">{{ __('Username') }}</label>

            <div class="col-md-6">
              <input id="username" type="text" class="form-control @error('username') is-invalid @enderror"
                name="username" value="{{ old('username',$user->username) }}"  autocomplete="username" autofocus>

              @error('username')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="row mb-3">
            <label for="first_name" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

            <div class="col-md-6">
              <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror"
                name="first_name" value="{{ old('first_name',$user->first_name) }}"  autocomplete="first_name" autofocus>

              @error('first_name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="row mb-3">
            <label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

            <div class="col-md-6">
              <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                name="last_name" value="{{ old('last_name',$user->last_name) }}"  autocomplete="last_name" autofocus>

              @error('last_name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="row mb-3">
            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address')
              }}</label>

            <div class="col-md-6">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                value="{{ old('email',$user->email) }}"  autocomplete="email">

              @error('email')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="btn btn-primary">
                {{ __('Update User') }}
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="m-2 p-2">
      <form action="{{route('users.destroy',$user->id)}}" method="post">
      @csrf
      @method('DELETE')
      <button class="btn btn-danger">Delete {{$user->username}}</button>
      </form>
    </div>
  </div>

  <div class="col-md-8">
    <form method="POST" action="{{ route('users.change.password',$user->id) }}">
      @csrf
      <div class="row mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password')
          }}</label>
  
        <div class="col-md-6">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
            name="password"  autocomplete="new-password">
  
          @error('password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
  
      <div class="row mb-3">
        <label for="confirm_password" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password')
          }}</label>
  
        <div class="col-md-6">
          <input id="confirm_password" type="password" class="form-control @error('confirm_password') is-invalid @enderror"
            name="confirm_password"  autocomplete="new-password">
  
          @error('confirm_password')
          <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
          </span>
          @enderror
        </div>
      </div>
  
      <div class="row mb-0">
        <div class="col-md-6 offset-md-4">
          <button type="submit" class="btn btn-primary">
            {{ __('Change Password') }}
          </button>
        </div>
      </div>
    </form>
  </div>
  
</div>

@endsection