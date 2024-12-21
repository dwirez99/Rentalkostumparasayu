<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Rias Manten Paras Ayu | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<body>
    <div class="main d-flex flex-column justify-content-between">
        <nav class="navbar navbar-dark navbar-expand-lg bg-dark">
            <div class="container-fluid">
              <a class="navbar-brand" href="/">Sewa Kostum Paras Ayu</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            </div>
          </nav>
          <div class="body-content h-100">
<div class="row g-0 h-100">
    <div class="sidebar col-lg-2 collapse d-lg-block" id="navbarTogglerDemo03">
        @if (Auth::user())
            @if (Auth::user()->role_id ==1)

            <a href="/dashboard " @if(request()->route()->uri == 'dashboard') class="active" @endif><i class="bi bi-speedometer2"></i> Dashboard</a>
            <a href="/menu-costume" @if(request()->route()->uri == 'menu-costume' || request()->route()->uri == 'costume-add' || request()->route()->uri == 'costume-deleted' || request()->route()->uri == 'costume-edit/{slug}') class="active" @endif><i class="bi bi-list"></i> Menu Costume</a>
            <a href="/categories" @if(request()->route()->uri == 'categories' || request()->route()->uri == 'category-add' || request()->route()->uri == 'category-deleted' || request()->route()->uri == 'category-edit/{slug}') class="active" @endif><i class="bi bi-bookmarks"></i> Categories</a>
            <a href="/users" @if(request()->route()->uri == 'users' || request()->route()->uri == 'registered-user' || request()->route()->uri == 'user-detail/{slug}' || request()->route()->uri == 'users-banned') class="active" @endif><i class="bi bi-people"></i> Users</a>
            <a href="/rentlogs" @if(request()->route()->uri == 'rentlogs') class="active" @endif><i class="bi bi-archive"></i> Riwayat sewa</a>
            <a href="/rent-return" @if(request()->route()->uri == 'rent-return') class="active" @endif><i class="bi bi-arrow-return-left"></i> Pemgembalian Kostum</a>
            <a href="/" @if(request()->route()->uri == '/') class="active" @endif><i class="bi bi-grid-3x3-gap"></i> List Kostum</a>
            <a href="/costume-rent" @if(request()->route()->uri == 'costume-rent') class="active" @endif><i class="bi bi-book"></i> Sewa Kostum</a>
            <a href="/logout"><i class="bi bi-box-arrow-left"></i> Logout</a>
        @else
        <a href="/profile" @if(request()->route()->uri == 'profile') class="active" @endif><i class="bi bi-person-circle"></i> Profile</a>
        <a href="/" @if(request()->route()->uri == '/') class="active" @endif><i class="bi bi-grid-3x3-gap"></i> List Kostum</a>
        <a href="/logout"><i class="bi bi-box-arrow-left"></i> Logout</a>
            @endif
            @else
        <a href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
            @endif
    </div>
    <div class="content p-5 col-lg-10">
        @yield('content')
    </div>
</div>
          </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>
</html>
