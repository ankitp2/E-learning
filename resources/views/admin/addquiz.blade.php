@include('admin.admin_frontend.adminheader')

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
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
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h3 class="h3">{{$data}}</h3>
        </div>
          <div class="quiz-container">
          <form action="{{route('admin.store.quiz')}}" method="POST">
            @csrf
            <label for="course_id" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;color:white;margin-left:20px;">Select Course:</label><label for="course_id" style="font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;color:white;margin-left:280px;">Select Lesson:</label><br>
            <select name="course_id" id="quiz_cid" style="margin: 15px">
                <option value="" disabled selected>Select Course</option>
                @foreach ($course as $x)
                    <option value="{{$x->id}}">{{$x->course_title}}-{{$x->tutor}}</option>
                @endforeach
            </select>
            <select name="lesson_id" id="cid">
                <option value="" disabled selected>Select Lesson</option>
                @foreach ($lesson as $x)
                    <option value="{{$x->id}}">{{$x->course_title}}-{{$x->tutor}}</option>
                @endforeach
            </select><br>
            @for ($i=0;$i<10;$i++)
            <input type="text" name="question[]" style="width: 250px;" placeholder="Enter question no {{$i+1}}">
            <input type="text" name="option1[]" style="width: 120px;" placeholder="Enter option 1">
            <input type="text" name="option2[]" style="width: 120px;" placeholder="Enter option 2">
            <input type="text" name="option3[]" style="width: 120px;" placeholder="Enter option 3">
            <input type="text" name="option4[]" style="width: 120px;" placeholder="Enter option 4">
            <input type="text" name="answer[]" style="width: 120px;" placeholder="Enter Answer">
            @endfor
            <input type="submit" value="Submit" class="btn btn-primary">
          </form>
        </div>
        <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
      </main>
      @include('admin.admin_frontend.adminfooter')
