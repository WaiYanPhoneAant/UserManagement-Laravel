@extends('Users.Master.App')
@section('roleList','active text-white   bg-secondary')
@section('content')


<div class="m-2 m-md-5">
    <div class="my-2 d-flex flex-wrap justify-content-between">
        <div class="btn-gp">
            <a href="{{route('roleCreateForm')}}" class="btn btn-dark">Create Role <i class="fa-regular fa-plus p-1"></i></a>
        </div>
        <div class="search-btn d-flex align-items-center">
            <input type="text" class="form-control" placeholder="search user">
            <a href="" class="nav-link px-2 py-1 m-2 fs-5 border border-1 rounded-1"><i class="fa-solid fa-magnifying-glass"></i></a>
        </div>
    </div>
    @if (session('success'))
    <div class="alert alert-success alert-dismissible fade show my-3 col-12 col-md-4" role="alert" style="margin-left: auto;">
        {{session('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <div class="table-responsive">
        <table class="table border border-1 table-striped ps-3" >
            <thead>
            <tr>
                <th scope="col">Roles</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($roles as $role)
            <tr>
                <td>{{$role->name}}</td>
               @if ($role->name!='admin')
               <td>
                    <div class="action">
                        <a href="{{route('roleEditForm',$role->id)}}" class="btn btn-sm btn-outline-secondary m-1">
                            <i class="fa-regular fa-pen-to-square pe-1"></i>Edit
                        </a>
                        <a href="#" class="btn btn-sm btn-outline-danger m-1" data-bs-toggle="modal" data-bs-target="#deleteModal{{$role->id}}">
                            <i class="fa-regular fa-trash-can pe-1"></i>Delete
                        </a>
                    </div>
                </td>
                @else
                <td></td>
               @endif

            </tr>
        @endforeach

            </tbody>
        </table>
        {{ $roles->links() }}
    </div>

   </div>



@endsection

@section('modal')
@foreach ($roles as $role)
    <!-- Delete Modal -->
    <div class="modal fade mt-5" id="deleteModal{{$role->id}}" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <h1 class="modal-title fs-5 text-danger" id="deleteModalLabel">Alert !!!</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Are you sure to delete this role,<span class="text-danger">{{$role->name}}</span> ?
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <form action="{{route('roleDelete',$role->id)}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Delete Now</button>
            </form>
            </div>
        </div>
        </div>
    </div>
@endforeach
@endsection
