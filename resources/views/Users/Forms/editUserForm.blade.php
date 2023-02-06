@extends('Users.Master.App')
@section('userList','active text-white   bg-secondary')
@section('header','Edit user data')
@section('content')



<div class="mt-3 mx-2">
    <h1 class="fw-light m-2 mb-5 d-md-none d-block">Edit user data</h1>
    <div class="form mt-3">
        <form action="{{route('userDataUpdate',$user->id)}}" method="POST">
            @csrf
                <div class="name-input row m-0">
                    <div class="mb-3 col-md-3">
                        <label for="name" class="form-label">*Name</label>
                        <input type="text" value="{{old('name',$user->name)}}" name="name" class="form-control" id="name" aria-describedby="emailHelp" placeholder="Your Name">
                        @error('name')
                            <span class="text-danger m-1">*{{$message}}</span>
                        @enderror
                    </div>
                      <div class="mb-3 col-md-3">
                        <label for="email" class="form-label" >Email</label>
                        <input type="email" value="{{old('email',$user->email)}}" name="email" class="form-control" placeholder="Your Email" id="email">
                        @error('email')
                            <span class="text-danger m-1">*{{$message}}</span>
                        @enderror
                    </div>
                      <div class="mb-3 col-md-3">
                        <label for="phone" class="form-label">Phone</label>
                        <input type="number"  value="{{old('phone',$user->phone)}}" name="phone" class="form-control" placeholder="Your Phone" id="phone" aria-describedby="emailHelp">
                        @error('phone')
                            <span class="text-danger m-1">*{{$message}}</span>
                        @enderror
                    </div>
                      <div class="mb-3 col-md-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select name="gender" class="form-select " id="gender" aria-label="Default select example">
                            <option value="">Select gender</option>
                            <option {{old('role_id',$user->gender)==1?'selected':'' }} value="1">Male</option>
                            <option {{old('role_id',$user->gender)==0?'selected':'' }} value="0">Female</option>
                        </select>
                        @error('gender')
                            <span class="text-danger m-1">*{{$message}}</span>
                        @enderror
                      </div>
                      <div class=" mb-3 col-md-3 p-3">
                        <input name="is_active"  class="form-check-input" type="checkbox" value="1" id="flexCheckChecked" {{$user->is_active?'checked':''}}>
                        <label class="form-check-label" for="flexCheckChecked">
                          Is active?
                        </label>
                        @error('is_active')
                            <span class="text-danger m-1">*{{$message}}</span>
                        @enderror
                      </div>
                </div>
                <hr>
                <!-- Role and Permission -->
                <div class="mt-3 ms-2">
                    <h3 class="fw-light">Role & Permission</h3>
                    <div class="input-gp">
                        <div class="password-gp row m-0">
                            <div class="mb-3 col-md-3 col-sm-5">
                                <label for="userName" class="form-label">*Username</label>
                                <input type="text" value="{{old('username',$user->username)}}" name="username" class="form-control" placeholder="Enter username" id="userName" aria-describedby="emailHelp">
                            @error('username')
                                <span class="text-danger m-1">*{{$message}}</span>
                            @enderror
                            </div>
                            <div class="mb-3 col-md-4">
                                <label for="password" class="form-label">password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter password" id="password" aria-describedby="emailHelp">
                                @error('password')
                                    <span class="text-danger m-1">*{{$message}}</span>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-4 ">
                                <label for="confirmPassword"  class="form-label">confirm password</label>
                                <input type="Password" name="confirmPassword" class="form-control" placeholder="Enter confirm password" id="phone" aria-describedby="emailHelp">
                                @error('confirmPassword')
                                    <span class="text-danger m-1">*{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="ms-3 mb-3 col-md-3">
                            <label for="role" class="form-label">*Role</label>
                            <select name="role_id" class="form-select " id="role" aria-label="role select">
                                <option selected value="">Select role</option>
                                @foreach ($roles as $role)
                                    <option {{old('role_id',$user->role_id)==$role->id?'selected':'' }} value="{{$role->id}}">{{$role->name}}</option>
                                @endforeach
                            </select>
                            @error('role_id')
                                <span class="text-danger m-1">*{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-3">
                    <button type="submit" class="mt-5 mb-5 align-items-center btn btn-lg btn-primary">Update</button>
                </div>
        </form>
    </div>
</div>


@endsection
