

@extends('admin.layouts.main')

@section('content')


  <div class="container my-5">
    <div class="mx-2">
      <h2 class="fw-bold fs-2 mb-5 pb-2">Add USER</h2>
      <form action="{{route('users.store')}}" method="POST" class="px-md-5" enctype="multipart/form-data">
      @csrf

        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Name:</label>
          <div class="col-md-5">
            <input type="text" placeholder="First Name" class="form-control py-2  @error('first_name') is-invalid @enderror" name="first_name" value="{{old('first_name')}}"/>
            @error('first_name')
            <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                      </span>
           @enderror
          </div>

          <div class="col-md-5">
            <input type="text" placeholder="Last Name" class="form-control py-2  @error('last_name') is-invalid @enderror" name="last_name" value="{{old('last_name')}}"/>
            @error('last_name')
              <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
                       </span>
            @enderror
          </div>
        </div>

        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">UserName:</label>
          <div class="col-md-10">
            <input type="text" placeholder="e.g. Jhon33" class="form-control py-2  @error('user_name') is-invalid @enderror" name="user_name" value="{{old('user_name')}}"/>
            @error('user_name')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
            @enderror
          </div>
        </div>
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Email:</label>
          <div class="col-md-10">
            <input type="email" placeholder="e.g. Jhon@example.com" class="form-control py-2 @error('email') is-invalid @enderror" name="email" value="{{old('email')}}"/>
            @error('email')
              <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
     </div>

     <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Phone:</label>
          <div class="col-md-10">
            <input type="text" placeholder="e.g. 123-456-7890" class="form-control py-2 @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" />
            @error('phone')
              <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
              </span>
            @enderror
          </div>
        </div>
        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Password:</label>
          <div class="col-md-10">
            <input type="password" placeholder="Password" class="form-control py-2 @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"/>
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>

        <div class="form-group mb-3 row">
          <label for="" class="form-label col-md-2 fw-bold text-md-end">Confirm Password:</label>
          <div class="col-md-10">
            <input type="password" placeholder="Confirm Password" class="form-control py-2" name="password_confirmation" required autocomplete="new-password"/>
            @error('password_confirmation')
      <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
      </span>
         @enderror
          </div>
        </div>

        <div class="text-md-end">
          <button class="btn mt-4 btn-secondary text-white fs-5 fw-bold border-0 py-2 px-md-5">
            Add User
          </button>
        </div>
      </form>
    </div>
  </div>

  @endsection
