@extends('admin.layouts.sidebar')
@section('content')

<div class="container">

    @if (session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session()->get('success') }}
        </div>
    @endif

    {{-- @if (session()->has('errors'))
        <p class="text-danger">{{ session()->get('errors') }}</p>
    @endif --}}
    <form action="{{ route('updateUser', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="row mt-5">
        <div class="col mt-5">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control" placeholder="First name" aria-label="First name">
            <span class="text-danger">
                @error('name')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="col">
            <label for="email" class="form-label">Email</label>
          <input type="email" name="email" value="{{ $user->email }}" class="form-control" id="email" placeholder="Enter email" aria-label="Last name">
          <span class="text-danger">
            @error('email')
                {{ $message }}
            @enderror
        </span>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col mt-5">
            <label for="password" class="form-label">Password</label>
          <input type="password" name="password" value="{{ $user->password }}" id="phno" class="form-control" placeholder="Enter password" aria-label="First name">
          <span class="text-danger">
            @error('password')
                {{ $message }}
            @enderror
        </span>
        </div>
        <div class="col">
            <label for="confirm_password" class="form-label">Enter Confirm Password</label>
          <input type="password" name="confirm_password" value="{{ $user->password }}" class="form-control" id="confirm_password" placeholder="Enter password" aria-label="Last name">
          <span class="text-danger">
            @error('confirm_password')
                {{ $message }}
            @enderror
        </span>
        </div>
      </div>
      <div class="row mt-5">
        <div class="col mt-5">
            <label for="phno" class="form-label">Phone number</label>
          <input type="number" name="phno" value="{{ $user->phno }}" id="phno" class="form-control" placeholder="Enter phone number" aria-label="First name">
          <span class="text-danger">
            @error('phno')
                {{ $message }}
            @enderror
        </span>
        </div>
        <div class="col">
            <label for="course" class="form-label">Course</label>
            <select name="course" id="course" class="form-select" aria-label="Default select example">
                <option value="">Choose...</option>
                <option value="bca" @if ($user->course === "bca") @selected(true)
                @endif>BCA</option>
                <option value="mca" @if ($user->course === "mca") @selected(true)
                    @endif>MCA</option>
              </select>
              <span class= "text-danger">
              @error('course')
              {{ $message }}
          @enderror
              </span>
        </div>
      </div>
      <div class="row mt-5">

        <div class="col mt-5">
            <label for="image" class="form-label">Upload Image</label>
            <input type="file" name="image" id="image" class="form-control" aria-label="First name">
            <img src="{{ asset('/storage/uploads/'.$user->image) }}" alt="" width="100px" height="100px" id="img-tag">
            <input type="hidden" name="old_img" value="{{ $user->image }}">
            <span class="text-danger">
                @error('image')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="col mt-5">
            <label for="phno" class="form-label">Gender</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="male" value="male" @if ($user->gender === 'male') checked

                @endif>
                <label class="form-check-label" for="male">Male</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="female" value="female" @if ($user->gender === 'female') checked

                @endif>
                <label class="form-check-label" for="female">Female</label>
              </div>
              <span class="text-danger">
              @error('gender')
              {{ $message }}
          @enderror
              </span>
        </div>

      </div>
      <div class="row mt-3">
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Update</button>
          </div>
      </div>
    </form>
</div>
@endsection

@push('js')
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script>

            function readURL(input){
                if(input.files && input.files[0]){

                    var reader = new FileReader();
                    reader.onload = function(e){

                        $('#img-tag').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
            $("#image").change(function(){

                readURL(this);
            });
        </script>
@endpush
