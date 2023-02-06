@extends('Users.Master.App')
@section('dashboard','active text-white   bg-secondary')
@section('header','Dashboard')
@section('content')
<div class="m-md-5">
    <div class="mt-2 d-flex justify-content-start">
        <div class="btn-gp mx-4">
            <a href="{{route('userCreateForm')}}" class="btn btn-success">Create User</a>
            <a href="{{route('roleCreateForm')}}" class="btn btn-primary">Create Role</a>
        </div>
    </div>
    <div class="row m-auto justify-content-start">
        <div class="mt-3 col-md-5 col-lg-4 ">
            <div class="card">
                <div class="card-body d-flex align-items-center justify-content-start p-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" shadow rounded-circle p-2 mx-2 text-success" style="width: 60px; height: 60px;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                      </svg>
                    <div class="text ps-4">
                        <span class="fs-5 text-muted ">Total User</span>
                        <h5 class="card-title m-1 fs-1 fw-light">{{$usercount}}</h5>
                    </div>
                    <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
                </div>
                <div class="card-footer text-end">
                    <a href="{{route('userList')}}" class="text-success ">Go Users List</a>
                </div>
            </div>
        </div>
        <div class="mt-3 col-md-5 col-lg-4 ">
            <div class="card">
                <div class="card-body d-flex align-items-center justify-content-start p-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="shadow rounded-circle p-2 mx-2 text-primary" style="width: 60px; height: 60px;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25H12" />
                      </svg>

                    <div class="text ps-4">
                        <span class="fs-5 text-muted">Total Role</span>
                        <h5 class="card-title m-1 fs-1 fw-light">{{$rolecount}}</h5>
                    </div>
                    <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
                </div>
                <div class="card-footer text-end">
                    <a href="{{route('roleList')}}" class=" text-primary">Go Roles List</a>
                </div>
            </div>
        </div>
        <div class="mt-3 col-md-5 col-lg-4 ">
            <div class="card">
                <div class="card-body d-flex align-items-center justify-content-start p-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="shadow rounded-circle p-2 mx-2 text-info" style="width: 60px; height: 60px;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                    </svg>


                    <div class="text ps-4">
                        <span class="fs-5 text-muted">Total customers</span>
                        <h5 class="card-title m-1 fs-1 fw-light">0</h5>
                    </div>
                    <!-- <p class="card-text">With supporting text below as a natural lead-in to additional content.</p> -->
                </div>
                <div class="card-footer text-end">
                    <a href="{{route('roleList')}}" class="text-info btn-info">Go Customer List</a>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
