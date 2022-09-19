@extends('layouts.main')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Add Employee</h1>
</div>
<div id="myDiv" style="visibility: hidden;position:relative;top:150px;left:50%;z-index:111">
  <img src="{{ url('img/loader.gif') }}" style="height:80px;" />
</div>
<div class="row justify-content-center">
  <div class="col-md-10">
    <div class="card mx-auto">
      <div class="card-header">{{ __('Add New Employee') }}<a href="{{route('employees.index')}}"
          class="float-right">Back</a></div>

      <div class="card-body">
        <form method="POST" action="{{ route('employees.store') }}">
          @csrf
          <div class="row mb-3">

            <label for="first_name" class="col-md-2 col-form-label text-md-end">{{ __('First Name') }}</label>
            <div class="col-md-4">
              <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror"
                name="first_name" value="{{ old('first_name') }}" autocomplete="first_name" autofocus>

              @error('first_name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>


            <label for="middle_name" class="col-md-2 col-form-label text-md-end">{{ __('Middle Name') }}</label>
            <div class="col-md-4">
              <input id="middle_name" type="text" class="form-control @error('middle_name') is-invalid @enderror"
                name="middle_name" value="{{ old('middle_name') }}" autocomplete="middle_name" autofocus>

              @error('middle_name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label for="last_name" class="col-md-2 col-form-label text-md-end">{{ __('Last Name') }}</label>

            <div class="col-md-4">
              <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror"
                name="last_name" value="{{ old('last_name') }}" autocomplete="last_name" autofocus>

              @error('last_name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <label for="department" class="col-md-2 col-form-label text-md-end">{{ __('Department') }}</label>
            <div class="col-md-4">
              <select class="form-control" name="department" id="department">
                <option value="">Select Department</option>
                @foreach ($department as $dd)
                <option value="{{$dd->id}}">{{$dd->name}}</option>
                @endforeach
              </select>
              @error('department')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <label for="birthday" class="col-md-2 col-form-label text-md-end">{{ __('Birthday') }}</label>

            <div class="col-md-4">
              <input id="birthday" type="date" class="form-control @error('birthday') is-invalid @enderror"
                name="birthday" value="{{ old('birthday') }}" autocomplete="birthday" autofocus>

              @error('birthday')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>


            <label for="country_name" class="col-md-2 col-form-label text-md-end">{{ __('Country') }}</label>

            <div class="col-md-4">
              <select class="form-control" name="country_name" id="state">
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
            <label for="state_name" class="col-md-2 col-form-label text-md-end">{{ __('State') }}</label>

            <div class="col-md-4">
              <select class="form-control" id="state_id" name="state_name">
                <option value="">Select State</option>
              </select>
              @error('state_name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <label for="city_name" class="col-md-2 col-form-label text-md-end">{{ __('City') }}</label>

            <div class="col-md-4">
              <select class="form-control" id="city_id" name="city_name">
                <option value="">Select City</option>
              </select>
              @error('city_name')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>

          <div class="row mb-3">
            <label for="zipcode" class="col-md-2 col-form-label text-md-end">{{ __('Zipcode') }}</label>

            <div class="col-md-4">
              <input id="zipcode" type="number" class="form-control @error('zipcode') is-invalid @enderror"
                name="zipcode" value="{{ old('zipcode') }}" autocomplete="zipcode" autofocus>

              @error('zipcode')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

            <label for="date_hired" class="col-md-2 col-form-label text-md-end">{{ __('Date Hired') }}</label>

            <div class="col-md-4">
              <input id="date_hired" type="date" class="form-control @error('date_hired') is-invalid @enderror"
                name="date_hired" value="{{ old('date_hired') }}" autocomplete="date_hired" autofocus>

              @error('date_hired')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>

           
          </div>
          <div class="row mb-3">
            <label for="address" class="col-md-2 col-form-label text-md-end">{{ __('Address') }}</label>

            <div class="col-md-4">
              <textarea id="address" type="text" class="form-control @error('address') is-invalid @enderror"
                name="address" value="{{ old('address') }}" autocomplete="address" autofocus></textarea>

              @error('address')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
              @enderror
            </div>
          </div>
          <div class="row mb-3">
            <div class="col-md-6">
              <button type="submit" id="submit" class="btn btn-primary">
                {{ __('Add Employee') }}
              </button>
            </div>
          </div>
        </form>



      </div>
    </div>
  </div>
</div>
<script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
<script>
  $(document).ready(function(){
    $('#state').change(function(){
      var id = $(this).val();
      $('#submit').attr('disabled',true);
      $.ajax({
        url : "{{route('fetch_state')}}",
        method : "GET",
        dataType : "JSON",
        data : {'id' : id},
        beforeSend: function() {
            $("#myDiv").css('visibility', 'visible');
        },
        success : function(res){
          // console.log(res);
          $('#state_id').html('<option value="">Select State</option>');
          $('#city_id').html('<option value="">Select City</option>');
          $("#myDiv").css('visibility', 'hidden');
          $('#submit').attr('disabled',false);
          $.each(res,function(key,val){
            $('#state_id').append('<option value="'+val.id+'">'+val.name+'</option>');
          })
        }
      });
    });

    $('#state_id').change(function(){
      var id = $(this).val();
      $('#submit').attr('disabled',true);
      $.ajax({
        url : "{{route('fetch_city')}}",
        method : "GET",
        dataType : "JSON",
        data : {'id' : id},
        beforeSend: function() {
            $("#myDiv").css('visibility', 'visible');
        },
        success : function(res){
          // console.log(res);
          $('#city_id').html('<option value="">Select City</option>');
          $("#myDiv").css('visibility', 'hidden');
          $('#submit').attr('disabled',false);
          $.each(res,function(key,val){
            $('#city_id').append('<option value="'+val.id+'">'+val.name+'</option>');
          })
        }
      });
    });

    
  });
</script>

@endsection