@include('frontend.header')
<div class="signup-container">
    @session('success')
    <div class="alert alert-success" id="success-alert">
        {{ session('success') }}
    </div>
@endsession
@session('error')
    <div class="alert alert-error" id="error-alert">
        {{ session('error') }}
    </div>
@endsession
    <h2 class="heading1">Login</h2>
    <div class="base-container">
    <div class="base-container1">
        <img src="{{asset('images/signup.avif')}}" class="image1" alt="">
    </div>
    <div class="base-container2">
        <form action="{{route('register')}}" method="post">
            @csrf
            <input type="text"  name="name" placeholder="Enter Your Name">
            <input type="email" name="email" placeholder="Enter Your Email">
            <input type="number" name="phone_no" placeholder="Enter Your Contact No">
            <input type="password" name="password" placeholder="Enter Your Password">
            <input type="submit" class="btn btn-primary" value="Register">
        </form>
        <span class="m-lg-4" style="color: rgb(77, 61, 61);font-family:Verdana, Geneva, Tahoma, sans-serif;font-size:12px">Already have an account?</span><span class="m-lg-4"> <button type="button" style="color: rgb(52, 66, 52)" href="" class="login">Login</button></span>
    </div>

</div>

    <div class="base-container0">
    <div class="base-container1">
        <img src="{{asset('images/login.avif')}}" class="image1" alt="">
    </div>
    <div class="base-container3">
        <form action="{{route('login')}}" method="post">
            @csrf
            <input type="email" name="email" placeholder="Enter Your Email">
            <input type="password" name="password" placeholder="Enter Your Password">
            <input type="submit" class="btn btn-primary" value="Login">
        </form>
        <span class="m-lg-4" style="color: rgb(77, 61, 61);font-family:Verdana, Geneva, Tahoma, sans-serif;font-size:12px">Don't have an account?</span><span class="m-lg-4"> <button type="button" style="color: rgb(52, 66, 52)" href="" class="register">Register</button></span>
    </div>
</div>
</div>
@include('frontend.footer')
