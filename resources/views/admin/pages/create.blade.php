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
    <form action="{{ route('storeUser') }}" method="POST" enctype="multipart/form-data">
        @csrf
    <div class="row mt-5">
        <div class="col mt-5">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="First name" aria-label="First name">
            <span class="text-danger">
                @error('name')
                    {{ $message }}
                @enderror
            </span>
        </div>
        <div class="col">
            <label for="email" class="form-label">Email</label>
          <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" aria-label="Last name">
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
          <input type="password" name="password" id="phno" class="form-control" placeholder="Enter password" aria-label="First name">
          <span class="text-danger">
            @error('password')
                {{ $message }}
            @enderror
        </span>
        </div>
        <div class="col">
            <label for="confirm_password" class="form-label">Enter Confirm Password</label>
          <input type="confirm_password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Enter password" aria-label="Last name">
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
          <input type="number" name="phno" id="phno" class="form-control" placeholder="Enter phone number" aria-label="First name">
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
                <option value="bca">BCA</option>
                <option value="mca">MCA</option>
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
            <span class="text-danger">
                @error('image')
                    {{ $message }}
                @enderror
            </span>
        </div>

        <div class="col mt-5">
            <label for="phno" class="form-label">Gender</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                <label class="form-check-label" for="male">Male</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
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
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
      </div>
    </form>
</div>
@endsection
