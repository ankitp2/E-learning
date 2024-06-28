@include('admin.admin_frontend.adminheader')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h3 class="h3">{{$data}}</h3>
    </div>
    <div class="lesson-container">
        <form action="{{route('admin.store.lessons')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="course_id" style="margin-left: 130px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;color:white;">Select Course Name:</label>
            <select name="course_id" style="margin: 15px">
            @foreach ($course as $x)
                <option value="{{$x->id}}">{{$x->course_title}}-{{$x->tutor}}</option>
            @endforeach
        </select>
        <input type="text" name="lesson_title" placeholder="Lesson Title">
        <div class="mb-2">
            <label for="lesson_video" class="form-label" style="margin-left:130px;font-weight:600;color:white;">Enter Video File</label>
            <input class="form-control form-control-sm" name="lesson_video" type="file" style="margin-top: 10px;">
          </div>
        <input type="submit" class="btn btn-success" value="Upload">
        </form>
    </div>
    <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
  </main>
  @include('admin.admin_frontend.adminfooter')
