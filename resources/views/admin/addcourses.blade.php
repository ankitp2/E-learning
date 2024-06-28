@include('admin.admin_frontend.adminheader')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h3 class="h3">{{$data}}</h3>
    </div>
    <div class="courses-container" >
        <form action="{{route('admin.store.courses')}}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" name="course_title" placeholder="Course name">
            <input type="number" name="course_price" placeholder="Course Price">
            <input type="text" name="tutor" placeholder="Course Tutor">
            <input type="description" name="description" placeholder="Description">
            {{-- <label for="thumbnail">Enter Thumbnail Pic</label>
            <input type="file" name="thumbnail"> --}}
            <div class="mb-2">
                <label for="thumbnail" class="form-label" style="margin-left:130px;font-weight:600;color:white;">Enter Thumbnail Pic</label>
                <input class="form-control form-control-sm" name="thumbnail" type="file" style="margin-top: 10px;">
              </div>
            <div class="mb-2">
                <label for="intro_video" class="form-label" style="margin-left:130px;font-weight:600;color:white;">Enter Video Link</label>
                <input class="form-control form-control-sm" name="intro_video" type="file" style="margin-top: 10px;">
              </div>
              <input type="submit" class="btn btn-primary">
        </form>
    </div>
    <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
  </main>
  @include('admin.admin_frontend.adminfooter')
