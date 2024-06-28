@include('frontend.header')
<div class="container" style="width: 100%;height:800px; background-color:azure">
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
</div>
@include('frontend.footer')
