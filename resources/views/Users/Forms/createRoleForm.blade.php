@extends('Users.Master.App')
@section('roleList','active text-white   bg-secondary')
@section('content')

<div class="m-3 mx-2 pb-5">
    <h1 class="fw-light m-2 mb-5">Role Creation Form</h1>
    <div class="form mt-3">
        <form action="{{route('roleCreate')}}" method="POST">
            @csrf
                <div class="name-input row m-0">
                    <div class="mb-3 col-md-3">
                        <label for="name" class="form-label">*Role Name:</label>
                        <input type="text" class="form-control" id="name" name="roleName" value="{{old('roleName')}}" aria-describedby="emailHelp" placeholder="Enter Role Name">
                        @error('roleName')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <hr>
                <!-- Role and Permission -->
                <div class="mt-3 ms-2 user-select-none">
                    <h3 class="fw-light">Role & Permission</h3>
                    <div class="input-gp mt-5">
                        <!-- <div class="form-check mb-3 col-md-3 m-3">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                            <label class="form-check-label" for="flexCheckChecked">
                              Allow login
                            </label>
                        </div> -->
                    <!-- input for password-field -->

                    @if (session('error'))
                    <span class="text-danger m-2">*{{session('error')}}</span>
                    @endif
                    @foreach ($features as $f)
                            <div class="row m-0 p-3 my-3">

                                <div class="mb-3  d-flex flex-wrap align-items-center gap-5">
                                    <label for="userName" class="form-label fs-4 text-capitalize">{{$f->name}}</label>
                                    <div class="form-check ">
                                        <input class="form-check-input" type="checkbox" value="" id="{{$f->name}}selectAll" >
                                        <label class="form-check-label" for="{{$f->name}}selectAll">
                                        Select All
                                        </label>
                                    </div>
                                <div class="{{$f->name}}CheckBoxes">
                                        <div class="ms-3">
                                            @foreach ($permissions[$f->name] as $p)
                                                <div class="form-check mb-2">
                                                    <input class="form-check-input" type="checkbox" name=" {{$p->permission.$p->feature}}" value=" {{$p->permissions_id}}" id="{{$p->permission.$p->feature}}" >
                                                    <label class="form-check-label text-capitalize" for="{{$p->permission.$p->feature}}">
                                                         {{$p->permission.' '.$p->feature}}
                                                    </label>
                                                </div>
                                            @endforeach
{{--
                                            <div class="form-check ">
                                                <input class="form-check-input" type="checkbox"  name="userView"  id="userView" >
                                                <label class="form-check-label" for="userView">
                                                User view
                                                </label>
                                            </div>
                                            <div class="form-check ">
                                                <input class="form-check-input" type="checkbox"  name="userUpdate"  id="userUpdate" >
                                                <label class="form-check-label" for="userUpdate">
                                                User Update
                                                </label>
                                            </div>
                                            <div class="form-check ">
                                                <input class="form-check-input"  name="userDelete"   type="checkbox" id="user Delete" >
                                                <label class="form-check-label"  for="user Delete">
                                                User Delete
                                                </label>
                                            </div> --}}
                                        </div>
                                </div>
                                </div>
                                <hr>
                            </div>
                    @endforeach
                        {{-- <div class="row m-0 p-3 my-3">
                            <div class="mb-3  d-flex flex-wrap align-items-center gap-5">
                                <label for="userName" class="form-label fs-4">Role</label>
                                <div class="form-check ">
                                    <input class="form-check-input" type="checkbox" value="" id="roleSelectAll" >
                                    <label class="form-check-label" for="roleSelectAll">
                                      Select All
                                    </label>
                                </div>
                                <div class="roleCheckBoxes">
                                    <div class="ms-3">
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox"  name="roleCreate"   id="roleCreate" >
                                            <label class="form-check-label" for="roleCreate">
                                              Role Create
                                            </label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="roleView"  id="RoleView" >
                                            <label class="form-check-label" for="RoleView">
                                              Role view
                                            </label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="roleUpdate"  id="RoleUpdate" >
                                            <label class="form-check-label" for="RoleUpdate">
                                              Role Update
                                            </label>
                                        </div>
                                        <div class="form-check ">
                                            <input class="form-check-input" type="checkbox" name="roleDelete" id="RoleDelete" >
                                            <label class="form-check-label" for="RoleDelete">
                                             Role Delete
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>

                        </div> --}}
                    </div>
                </div>

                <div class="d-flex justify-content-center mt-3">
                    <button type="submit" class="mt-5 align-items-center btn btn-lg btn-primary">Create</button>
                </div>
        </form>
    </div>
</div>


@endsection

@section('js')
<script src="{{asset('custom/selectBox.js')}}"></script>
@endsection

