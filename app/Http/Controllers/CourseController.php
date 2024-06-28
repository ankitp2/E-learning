<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $courses = DB::table('courses')->get();
        return view('courses',compact('courses'));
    }
    public function profile($id)
    {
        $course = Course::where('id',$id)->first();
        $count_lesson=Lesson::where('course_id',$course->id)->count();
        $lessons=DB::table('lessons')->where('course_id',$course->id)->get();
        return view('courseprofile',compact('course','count_lesson','lessons'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_title' => 'required',
            'course_price' => 'required',
            'tutor' => 'required',
            'thumbnail' => 'required',
            'intro_video' => 'required|mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts,qt',
            'description' => 'required'
        ]);
        $fileUpload = new Course();
        // dd($request->all());
        if ($request->hasFile('thumbnail') && $request->hasFile('intro_video')) {
            $file = $request->file('thumbnail');
            $thumbnail = time() . '_' . $file->getClientOriginalName();
            //  dd($thumbnail);
            $file->move('uploads', $thumbnail);
            $video = $request->file('intro_video');
            $intro_video = time() . '_' . $video->getClientOriginalName();

            $video->move('uploads', $intro_video);
            $fileUpload->course_title = $request->course_title;
            $fileUpload->course_price = $request->course_price;
            $fileUpload->tutor = $request->tutor;
            $fileUpload->description = $request->description;
            $fileUpload->thumbnail = $thumbnail;
            $fileUpload->intro_video = $intro_video;
            $fileUpload->save();
            return back()
                ->with('success', 'File has been uploaded.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $parameter = Route::current();
        $data = $parameter->uri;
        return view('admin.addcourses', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course)
    {
        //
    }
}
