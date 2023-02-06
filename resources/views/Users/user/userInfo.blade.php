@extends('Users.Master.App')
@section('userList','active text-white   bg-secondary')
@section('header','User Info Detail')

@section('content')

<div class="m-3">
    <div class="dropdown">
        <a class="btn btn-outline-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{$user->name}}
        </a>

        <ul class="dropdown-menu ">
            @foreach ($users as $u)
                <li><a class="dropdown-item {{$u->id==$user->id?'bg-secondary text-white':''}}" href="{{route('userInfo',$u->id)}}">{{$u->name}}</a></li>
            @endforeach
        </ul>
      </div>
      <div class="row m-0 justify-content-center align-items-lg-start">
        <div class="card mt-5 col-sm-12 col-lg-5">
            <div class="my-3 m-auto text-center">
                {{-- <div class="bg-dark-subtle text-black-50 fs-2 border border-2 border-secondary text-uppercase d-flex align-items-center justify-content-center p-5 rounded-circle" style="width: 25px; height: 25px;">
                    {{ substr($user->name,0,2) }}
                </div> --}}
                <img src="{{$user->profile_photo_url}}" alt="" width="70px" height="70px" class=" border border-2 border-secondary rounded-circle">
                <h3 class="fw-light fs-4 mt-3 mb-1">{{$user->name}}</h3>
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
                            <span class="btn btn-sm btn-danger">
                                Inactive
                            </span>
                        @endif

                    </li>
                  </ul>
            </div>
            <div class="border-bottom mb-2">
                <a href="{{route('userEditForm',$user->id)}}" class="w-100 btn btn-primary">
                    <i class="fa-regular fa-pen-to-square me-2"></i>
                    Edit
                </a>
            </div>
        </div>
        <div class="card col-sm-12  col-lg-5 m-5">
            <div class="card-header fw-bold">
                User Information
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between">
                        <span class="fw-bold text-muted">Name</span>
                        <span class=" text-primary">{{$user->name}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span class="fw-bold text-muted">Phone</span>
                        <span class=" text-primary">{{$user->phone}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span class="fw-bold text-muted" >Gender</span>
                        <span class=" text-primary">{{$user->gender==1?'Male':'Female'}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between">
                        <span class="fw-bold text-muted">Email</span>
                        <span class=" text-primary">{{$user->email}}</span>
                    </li>
                  </ul>
            </div>
        </div>
      </div>

</div>



@endsection


