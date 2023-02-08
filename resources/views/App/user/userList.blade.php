<?php use App\Helpers\permissionHelpers; ?>
@extends('App.Master.App')
@section('userList','active text-white   bg-secondary')
@section('header','User List')


@section('content')


<div class="m-2 m-md-5">
    <div class="my-2 d-flex flex-wrap  justify-content-between">
        @if (permissionHelpers::checkPermission('user','create'))
            <div class="btn-gp">
                <a href="{{route('userCreateForm')}}" class="btn btn-dark">Create User <i class="fa-regular fa-plus p-1"></i></a>
            </div>
        @endif
        <form action="{{route('userList')}}" >
            <div class="search-btn d-flex align-items-center">

                    <input type="text" name="search" class="form-control" placeholder="search user">
                    <button type="submit" class="nav-link px-2 py-1 m-2 fs-5 border border-1 rounded-1"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
            @if (request('search')!='')
                <a class="btn border border-2" href="{{route('userList')}}">
                    {{request('search')}}
                    <i class="fa-regular fa-circle-xmark text-danger p-1"></i>
                </a>
            @endif

        </form>
    </div>
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show my-3 col-12 col-md-4" role="alert" style="margin-left: auto;">
        {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="table-responsive">
        <table class="table table-striped  border border-1 m-auto text-center" >
            <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Username</th>
                <th scope="col">name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @if (count($users)==0)
                <td colspan="5" class="text-muted fs-5"> There is no role </td>
            @endif
            @foreach ($users as $user)


            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->username}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
                <td>
                    <div class="btn-gp">
                        @if (permissionHelpers::checkPermission('user','update'))
                        <a href="{{route('userEditForm',$user->id)}}" class="btn btn-sm btn-outline-secondary m-1">
                            <i class="fa-regular fa-pen-to-square pe-1"></i>Edit
                        </a>
                        @endif

                        @if (permissionHelpers::checkPermission('user','view'))
                        <a href="{{route('userInfo',$user->id)}}" class="btn btn-sm btn-outline-info m-1">
                            <i class="fa-regular fa-eye pe-1"></i>View
                        </a>
                        @endif
                        @if (permissionHelpers::checkPermission('user','delete'))
                            <a href="#" class="btn btn-sm btn-outline-danger m-1" data-bs-toggle="modal" data-bs-target="#deleteModal{{$user->id}}">
                                <i class="fa-regular fa-trash-can pe-1"></i>Delete
                            </a>
                        @endif

                    </div>
                </td>
            </tr>
            @endforeach

            </tbody>
        </table>
        {{$users->links()}}
    </div>

   </div>



@endsection

@section('modal')
    @foreach ($users as $user)


    <!-- Delete Modal -->
    <div class="modal fade mt-5" id="deleteModal{{$user->id}}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-danger" id="deleteModalLabel">Alert !!!</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure to delete this user,<span class="text-danger">{{$user->name}}</span>?
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <form action="{{route('userDelete',$user->id)}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Delete Now</button>
            </form>

            </div>
        </div>
        </div>
    </div>
    @endforeach
@endsection
