@extends('layouts.main')

@section('content')

<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Create City</h1>
</div>
<div id="myDiv" style="visibility: hidden;position:relative;top:150px;left:50%;z-index:111">
  <img src="{{ url('img/loader.gif') }}" style="height:80px;" />
</div>
<div class="row justify-content-center">
  <div class="col-md-8">
    <div class="card mx-auto">
      <div class="card-header">{{ __('Create New City') }}<a href="{{route('city')}}" class="float-right">Back</a></div>

      <div class="card-body">
        <form method="POST" action="{{ route('store_city') }}">
          @csrf
          <div class="row mb-3">
            <label for="country_name" class="col-md-4 col-form-label text-md-end">{{ __('Country') }}</label>

            <div class="col-md-6">
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
            <label for="state_name" class="col-md-4 col-form-label text-md-end">{{ __('State') }}</label>

            <div class="col-md-6">
              <select class="form-control" id="state_id" name="state_name">
                <option value="">Select State</option>
              </select>
              @error('state_name')
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
              <button type="submit" id="submit" class="btn btn-primary">
                {{ __('Add City') }}
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
          $("#myDiv").css('visibility', 'hidden');
          $('#submit').attr('disabled',false);
          $.each(res,function(key,val){
            $('#state_id').append('<option value="'+val.id+'">'+val.name+'</option>');
          })
        }
      });
    })
  });
</script>

@endsection