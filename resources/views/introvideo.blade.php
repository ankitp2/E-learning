@include('frontend.header')
<div class="video-container">
    <div class="video">
        <video width="700" controls>
            <source src="{{ asset('uploads/'.$video) }}" type="video/mp4">
        </video>
    </div>
</div>
</div>
@include('frontend.footer')
