@extends('Users.Master.App')
{{-- @section('','active text-white   bg-secondary') --}}
@section('header','My Profile')
@section('content')

<?php $user=Auth::user(); ?>
<div class="m-3">
    <div class="row m-0 justify-content-center align-items-lg-start mb-4">
      <div class="card mt-5 col-sm-12 col-lg-5">
        @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show my-3" role="alert">
            <strong>{{session('success')}}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
          <div class="my-3 m-auto text-center">
              {{-- <div class="m-auto bg-dark-subtle text-black-50 fs-2 border border-2 border-secondary text-uppercase d-flex align-items-center justify-content-center p-5 rounded-circle" style="width: 25px; height: 25px;">
                  {{ substr($user->name,0,2) }}
              </div> --}}
              <img src="{{$user->profile_photo_url}}" alt="" width="70px" height="70px" class=" border border-2 border-secondary rounded-circle">
              <h3 class="fw-light fs-4 mt-3 mb-1 text-capitalize">{{$user->name}}</h3>
              <span class="text-muted fs-6">admin</span>
          </div>
          <div class="card-body border-top m-1">
              <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between">
                      <span class="fw-bold text-muted">Username</span>
                      <span class=" text-primary">{{$user->username}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between">
                      <span class="fw-bold text-muted">Email</span>
                      <span class=" text-primary">{{$user->email}}</span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between">
                    <span class="fw-bold text-muted">Is Active?</span>
                    @if ($user->is_active)
                        <span class="btn btn-sm btn-success">
                            active
                        </span>
                    @else
                        <span class="btn btn-sm btn-secondary">
                            Deactive
                        </span>
                    @endif

                  </li>
                </ul>
          </div>
          <div class="border-bottom mb-2">
              <a href="" class="w-100 btn btn-primary">
                  <i class="fa-regular fa-pen-to-square me-2"></i>
                  Edit
              </a>
          </div>
      </div>

      {{-- password update form --}}
      <div class="card col-sm-12  col-lg-5 m-5 p-3">
          <h4 class="fw-light mb-3 text-end">Change Password</h4>
          <form action="{{route('AuthUserPwUpdate')}}" method="POST">
            @csrf
            <div class="mb-3">
                  <label for="oldPassword" class="form-label">Old Password</label>
                  <input type="password" name="oldPassword" class="form-control" id="oldPassword">
                @error('oldPassword')
                  <span class="text-danger ">*{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="newPassword" class="form-label">New Password</label>
                <input type="password" name="newPassword" class="form-control" id="newPassword">
                @error('newPassword')
                <span class="text-danger ">*{{$message}}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="confirmPassword" class="form-label">Confirm Password</label>
                <input type="password" name="confirmPassword" class="form-control" id="confirmPassword">
                @error('confirmPassword')
                <span class="text-danger ">*{{$message}}</span>
                @enderror
            </div>

              <button type="submit" class="btn btn-primary">Update</button>
          </form>
      </div>
    </div>
    <hr>
    <div class="col-11 m-5 m-auto mt-5">
      <h3 class="my-5">
          Information Update
      </h3>
      <form action="{{route('AuthInfoUpdate')}}" method="POST">
            @csrf
          <div class="name-input row m-0">
              <div class="mb-3 col-md-3">
                  <label for="name" class="form-label">*Name</label>
                  <input type="name" class="form-control" id="name" name="name" value="{{old('name',$user->name)}}" aria-describedby="emailHelp" placeholder="Your Name">
                  @error('name')
                    <span class="text-danger ">*{{$message}}</span>
                  @enderror
                </div>
                <div class="mb-3 col-md-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" name='email' value='{{old('email',$user->email)}}' placeholder="Your Email" id="email">
                @error('email')
                  <span class="text-danger ">*{{$message}}</span>
                @enderror
                </div>
                <div class="mb-3 col-md-3">
                  <label for="phone" class="form-label">Phone</label>
                  <input type="phone" class="form-control"  name='phone' value='{{old('phone',$user->phone)}}' placeholder="Your Phone" id="phone" aria-describedby="emailHelp">
                @error('phone')
                  <span class="text-danger ">*{{$message}}</span>
                @enderror
                </div>
                <div class="mb-3 col-md-3">
                  <label for="gender" class="form-label">Gender</label>
                  <select class="form-select" name="gender" id="gender" aria-label="Default select example">
                      <option value=''>Select gender</option>
                      <option {{$user->gender=='male'?'selected':''}} value="male">Male</option>
                      <option {{$user->gender=='female'?'selected':''}}  value="female">Female</option>
                    </select>
                @error('gender')
                    <span class="text-danger ">*{{$message}}</span>
                @enderror
                </div>
                <div class=" mb-3 col-md-3 p-3">
                  <input class="form-check-input" name="is_active" type="checkbox" id="flexCheckChecked" {{$user->is_active?'checked':' '}} >
                  <label class="form-check-label" for="flexCheckChecked" >
                    Is active?
                  </label>

                </div>
          </div>
          <button type="submit" class="btn btn-lg btn-primary m-auto my-5 d-block">Update</button>
      </form>
    </div>

</div>



@endsection
