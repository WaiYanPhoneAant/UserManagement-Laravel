<?php use App\Helpers\permissionHelpers; ?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark" id="html-dark" class="html-dark">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rocket</title>

    <link rel="icon" type="image/x-icon" href="{{asset('favicon.svg')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('custom/style.css')}}">
</head>

<body class="d-flex">
    <nav class="offcanvas-sm offcanvas-start col-12 col-sm-1 col-md-2  border-end border-3  d-flex flex-column " style="min-height: 100vh;"  tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="d-flex logo justify-content-between justify-content-sm-center p-4  p-sm-2 align-items-center">
            <!-- <img class="" src="logo.png" alt="logo">-->

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="d-none d-sm-block d-lg-block">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
            </svg>
            <span class="d-sm-none d-md-block fs-3 fw-bold ">Rocket</span>
            <button type="button" class="btn-close d-block d-sm-none" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-label="Close"></button>

        </div>
        <div class="mb-5"  style="margin-top: 6rem;">
          <ul class="navbar-nav justify-content-end flex-grow-1">
            <li class="nav-item  @yield('dashboard') mb-1" aria-label="Dashboard" title="Dashboard">
                <a href="{{route('dashboard')}}" aria-current="Page" class="nav-link d-flex ps-3   flex-md-row align-items-start align-items-sm-center justify-content-sm-center justify-content-md-start  p-2 fs-6 ">
                    <i class="fa-solid fa-house pe-2"></i> <span class="d-sm-none d-md-block ">Dashboard</span>
                </a>
            </li>
            @if (permissionHelpers::checkPermission('user','view'))
                <li class="nav-item  mb-1 @yield('userList')" title="Users" data-bs-dismiss="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-label="Users">
                    <a href="{{route('userList')}}" aria-current="Page" class="nav-link d-flex ps-3  flex-md-row align-items-start align-items-sm-center justify-content-sm-center justify-content-md-start  p-2 fs-6 ">
                        <i class="fa-solid fa-user-group pe-2"></i><span class="d-sm-none d-md-block">Users</span>
                    </a>
                </li>
            @endif
            @if (permissionHelpers::checkPermission('role','view'))
            <li class="nav-item  mb-1 @yield('roleList')" title="Roles"  data-bs-dismiss="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-label="Close">
                <a href="{{route('roleList')}}" aria-current="Page" class="nav-link d-flex ps-3  flex-md-row align-items-start align-items-sm-center justify-content-sm-center justify-content-md-start  p-2 fs-6 ">
                    <i class="fa-solid fa-table-list  pe-2"></i> <span class="d-sm-none d-md-block">Roles</span>
                </a>
            </li>
            @endif
            @if (!permissionHelpers::checkPermission('user','view') && permissionHelpers::checkPermission('user','create'))
            <li class="nav-item  mb-1 @yield('userList')" title="Create User"  data-bs-dismiss="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-label="Close">
                <a href="{{route('userCreateForm')}}" aria-current="Page" class="nav-link d-flex ps-3  flex-md-row align-items-start align-items-sm-center justify-content-sm-center justify-content-md-start  p-2 fs-6 ">
                    <i class="fa-solid fa-user-plus pe-2"></i> <span class="d-sm-none d-md-block">Create User</span>
                </a>
            </li>
            @endif
            @if (!permissionHelpers::checkPermission('role','view') && permissionHelpers::checkPermission('role','create'))
            <li class="nav-item  mb-1 @yield('roleList')" title="Create Role"  data-bs-dismiss="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-label="Close">
                <a href="{{route('roleCreateForm')}}" aria-current="Page" class="nav-link d-flex ps-3  flex-md-row align-items-start align-items-sm-center justify-content-sm-center justify-content-md-start  p-2 fs-6 ">
                    <i class="fa-solid fa-circle-plus pe-2"></i> <span class="d-sm-none d-md-block">Create Role</span>
                </a>
            </li>
            @endif
          </ul>
      </div>
    </nav>
    <section class="d-flex col-12 col-sm-11 col-md-10 flex-column">

            <div class="border border-bottom border-1 navbar sec-nav sticky-top bg-dark z-3">
                <div class="container-fluid p-2 d-flex justify-content-between">
                    <div class="header fs-3">
                        <span class="d-none d-sm-block">@yield('header')</span>
                        <button class="navbar-toggler d-block d-sm-none mt-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                            <i class="fa-solid fa-bars fs-1 "></i>
                        </button>
                    </div>
                    <div class="d-flex d-sm-none logo justify-content-between justify-content-sm-center ">
                      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                      </svg>
                      <span class="d-none d-md-block fs-2 fw-light ">Rocket</span>
                    </div>
                    <div class="d-flex align-items-center gap-3 me-3">
                        <div class="me-2">
                            <div class="dropstart">
                                <a class="" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name}}
                                </a>

                                <ul class="dropdown-menu">
                                  <li><a class="dropdown-item" href="{{route('AuthUserProfile')}}">Profile</a></li>
                                  <div class="dropdown-divider"></div>
                                  <li>
                                    <form action="{{route('logout')}}" method="POST">
                                        @csrf
                                        <button  aria-current="Page" class="dropdown-item text-danger text-decoration-underline">
                                            <span class=" d-md-block">Log Out </span>
                                        </button>
                                    </form>
                                  </li>
                                </ul>
                              </div>
                        </div>
                        <div class="mode">
                            <div class="theme">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-12   sticky-top overflow-y-scroll z-0" style="max-height: 88vh;">
                <div class="pb-5" style="height: 100vh;">
                     @yield('content')
                </div>
            </div>
    </section>

{{-- modal-components --}}
@yield('modal')
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<script src="{{asset('custom/theme.js')}}"></script>
@yield('js')
</html>

