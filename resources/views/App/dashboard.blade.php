<?php use App\Helpers\permissionHelpers; ?>
@extends('App.Master.App')
@section('dashboard','active text-white   bg-secondary')
@section('header','Dashboard')
@section('content')
<div class="m-md-5">
    @if (!permissionHelpers::checkPermission('user','view') && !permissionHelpers::checkPermission('role','view'))
        <h1 class="m-3">Hello {{Auth::user()->name}}</h1>
    @endif
    <div class="mt-2 d-flex justify-content-start">
        <div class="btn-gp mx-4">
            @if (permissionHelpers::checkPermission('user','create'))
                <a href="{{route('userCreateForm')}}" class="btn btn-success">Create User</a>
            @endif
            @if (permissionHelpers::checkPermission('role','create'))
            <a href="{{route('roleCreateForm')}}" class="btn btn-primary">Create Role</a>
            @endif
        </div>
    </div>
    <div class="row m-auto justify-content-start align-items-stretch">
        @if (permissionHelpers::checkPermission('user','view'))
        <div class="mt-3 col-md-7 col-lg-4 col-12 ">
            {{-- user card --}}
            <div class="card">
                <div class="card-body d-flex align-items-center justify-content-start p-4">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class=" shadow rounded-circle p-2 mx-2 text-success" style="width: 60px; height: 60px;">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
                      </svg>
                    <div class="text ps-4">
                        <span class="fs-5 text-muted ">Total User</span>
                        <h5 class="card-title m-1 fs-1 fw-light">{{$usercount}}</h5>
                    </div>
                </div>
                <div class="card-footer text-end">

                        <a href="{{route('userList')}}" class="text-success ">Go Users List</a>
                    <br>
                </div>
            </div>

        </div>
        @endif
        @if (permissionHelpers::checkPermission('role','view'))
        <div class="mt-3  col-md-7 col-lg-4 col-12 ">
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
        @endif
        @if (!permissionHelpers::checkPermission('user','view') && permissionHelpers::checkPermission('user','update'))
        <div class=" mt-3  col-md-7 col-lg-4 col-12">
            <div class="card ">
                <div class="card-header">For Update User</div>
                <div class="card-body">
                    <div class="userEdit">
                        <form action="{{route('editPermission')}}">
                            <input type="number" name='userId' class="form-control mb-2" placeholder="Enter User Id" >
                            @error('userId')
                                <span class="text-danger m-1 d-block">*{{$message}}</span>
                            @enderror
                            @if (session('user-error'))
                                <span class="text-danger m-1 d-block">*{{session('user-error')}}</span>
                            @endif
                            <button type='submit' class="btn btn-success">Go Update User Page</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @endif
        @if (!permissionHelpers::checkPermission('role','view') && permissionHelpers::checkPermission('role','update'))
        <div class=" mt-3  col-md-7 col-lg-4 col-12 ">
            <div class="card">
                <div class="card-header">For Update Role</div>
                <div class="card-body">
                    <div class="userEdit">
                        <form action="{{route('roleEditPermission')}}">
                            <input type="text" name='roleId' class="form-control mb-2"  placeholder="Enter Role Id">
                            @error('roleId')
                                <span class="text-danger m-1 d-block">*{{$message}}</span>
                            @enderror
                            @if (session('role-error'))
                                <span class="text-danger m-1 d-block">*{{session('role-error')}}</span>
                            @endif
                            <button type='submit' class="btn btn-primary">Go Update Role Page</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @endif

    </div>
</div>
@endsection
