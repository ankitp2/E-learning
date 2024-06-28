
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <link rel="stylesheet" href="{{asset('css/styles.css')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/86a464678e.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>E-learning</title>
<meta name="theme-color" content="#7952b3">
  </head>
  <body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow ">
  {{-- <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a> --}}
  <div class="navbar-brand col-md-3 col-lg-2 me-0 px-3">
    <img src="{{asset('images/logo2.png')}}" class="logo" alt="">
    <a class="navbar-brand" href="#" style="font-size:25px;">eLEARNING</a>
</div>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="{{route('logout')}}">Sign out</a>
    </div>
  </div>
</header>

<div class="container-fluid admin-nav">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
                <i class="fa-solid fa-house"></i>
              Dashboard
            </a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa-solid fa-book"></i>
              Courses
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{route('admin.add.courses')}}">Add Courses</a></li>
              <li><a class="dropdown-item" href="{{route('admin.add.lesson')}}">Add Lesson</a></li>
              <li><a class="dropdown-item" href="{{route('admin.add.quiz')}}">Add Quiz</a></li>
              <li><a class="dropdown-item" href="">View Courses</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">

              Products
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">

              Customers
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">

              Reports
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">

              Integrations
            </a>
          </li>
        </ul>
      </div>
    </nav>
