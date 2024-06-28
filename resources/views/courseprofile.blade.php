@include('frontend.header')
<div class="course-profile">
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
    <div class="main bg-dark">
        <div class="main1">
            <p>{{ $course->course_title }}</p>
            <span>{{ $course->description }}</span><br><br>
            <span style="color: rgb(118, 245, 217);">Created By: {{ $course->tutor }}</span><br><br>
            <span><i class="fa-solid fa-globe" style="color: #efeff1;"></i> English</span><br><br>
            <a href="{{route('suscribe',$course->id)}}" class="btn" id="purchase">Purchase {{ $course->course_price }}₹</a>
        </div>
        <div class="main2">
            <img src="{{ asset('uploads/' . $course->thumbnail) }}" alt="">
        </div>
    </div>
    <div class="inner-main">
        <h3>Course Content</h3>
        <span>{{ $count_lesson }} lessons</span>
        <table class="table table-bordered" style="width:400px;">
            <tr data-bs-toggle="dropdown" aria-expanded="false">
                <th class="dropdown-toggle">Introduction</th>
            </tr>

            <tr class="dropdown-menu">

                <td style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;font-size:15px;width:400px;"><i
                        class="fa-solid fa-video"></i>&nbsp;&nbsp; Introduction&nbsp;&nbsp; <a href="{{route('intro_video',$course->intro_video)}}">Video Link</a></td>
            </tr>
            @foreach ($lessons as $lesson)
            <tr data-bs-toggle="dropdown" aria-expanded="false">
                    <th class="dropdown-toggle">{{$lesson->lesson_title}}</th>
            </tr>
                <tr class="dropdown-menu">
                    <td style="font-family: Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;font-size:15px;width:400px;"><i class="fa-solid fa-video"></i>&nbsp;&nbsp; <a  href="{{route('video',$lesson->lesson_video)}}"> Video Link</a><hr>
                    <i class="fa-regular fa-circle-question"></i>&nbsp;&nbsp; <a href="{{route('quiz',['course_id' => $course->id, 'lesson_id' => $lesson->id])}}">Quiz</a>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
</div>
@include('frontend.footer')
