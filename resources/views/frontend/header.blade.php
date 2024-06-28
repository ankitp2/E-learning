<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('css/styles.css')}}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/86a464678e.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title>E-learning</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg shadow sticky-top p-0 align-items-center">
        <div class="nav-container">
            <img src="{{asset('images/logo2.png')}}" class="logo" alt="">
            <a class="navbar-brand" href="#" style="font-size:25px">eLEARNING</a>
        </div>
        <div class="navbar-nav ms-auto p-4 p-lg-0">
            <a class="nav-link active shadow" aria-current="page" href="{{route('index')}}">Home</a>
            <a class="nav-link active shadow" aria-current="page" href="#">About</a>
            <a class="nav-link active shadow" aria-current="page" href="{{route('courses')}}">Courses</a>
            @guest
            <a class="btn py-2 px-lg-5 d-none d-lg-block shadow" style="background-color:rgb(22, 173, 173)"  href="{{route('signup')}}">Join Now<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right ms-3" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1 8a.5.5 0 0 1 .5-.5h11.793l-3.147-3.146a.5.5 0 0 1 .708-.708l4 4a.5.5 0 0 1 0 .708l-4 4a.5.5 0 0 1-.708-.708L13.293 8.5H1.5A.5.5 0 0 1 1 8"/>
              </svg></a>
              @else
              {{-- <a class="nav-link active shadow" aria-current="page" href="">Profile</a> --}}
              <div class="dropdown active shadow" style="border:transparent;border-radius:15px;background-color:white;">
                <button class="nav-item nav-link dropdown-toggle" style="border:transparent;background-color:white;"  type="button" id="dropdownMenuButton"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    @php
                    $data=DB::table('users')->find(Auth::user()->id);
                    @endphp
                    <span>{{$data->name}}</span>
                </button>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                    <a href="" class="nav-item nav-link">Profile</a>
                    <a href="{{route('logout')}}" class="nav-item nav-link">Logout</a>
                </div>
            </div>
              @endguest
        </div>
    </nav>
</body>
</html>
