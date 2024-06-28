@include('frontend.header')
<div class="video-container">
    <div class="video">
        <video width="700" controls>
            <source src="{{ asset('uploads/lesson_videos/'.$video) }}" type="video/mp4">
        </video>
    </div>
</div>
</div>
@include('frontend.footer')
