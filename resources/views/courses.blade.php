@include('frontend.header')
<div class="course-container">
    <div class="black">
        <span>Course Section</span><br>
        <button class="btn shadow" id="all_courses"
            style="color: white;font-weight:600;background-color:rgb(4, 143, 4);border-radius:10px;">All
            Courses</button><button id="my_courses" class="btn shadow"
            style="color: white;font-weight:600;background-color:rgb(4, 143, 4);border-radius:10px">My Courses</button>
    </div>
    <div class="container" style="display: flex;flex-wrap:wrap;gap:30px;">
        @foreach ($courses as $x)
            <a href="{{ route('courses.profile', $x->id) }}" class="course">
                <div class="card" style="width: 18rem;">
                    <img src="{{ asset('uploads/' . $x->thumbnail) }}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"
                            style="font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;">
                            {{ $x->course_title }}</h5>
                        <b class="shadow" style="color: rgb(104, 100, 100);">{{ $x->tutor }}</b><br>
                        <b style="color: rgb(223, 156, 57)">Price:</b><b
                            style="font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif;color:rgb(70, 50, 50)">{{ $x->course_price }}₹</b>
                        <p class="card-text shadow"
                            style="font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;font-size:10px;background-color:rgb(241, 239, 235)">
                            {{ $x->description }}</p>
            </a>
    </div>
</div>
@endforeach
</div>
</div>
@include('frontend.footer')
