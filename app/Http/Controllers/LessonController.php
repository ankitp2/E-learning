<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Suscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'lesson_title' => 'required',
            'lesson_video' => 'required|mimes:mpeg,ogg,mp4,webm,3gp,mov,flv,avi,wmv,ts,qt',
            'course_id' => 'required'
        ]);
        $lesson = new Lesson();
        // dd($request->all());
        if ($request->hasFile('lesson_video')) {
            $file = $request->file('lesson_video');
            $video = time() . '_' . $file->getClientOriginalName();
            $file->move('uploads/lesson_videos', $video);
            $lesson->lesson_title = $request->lesson_title;
            $lesson->course_id = $request->course_id;
            $lesson->lesson_video = $video;
            $lesson->save();
            return redirect()->back()->with("success","Lesson added successfully.");
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Lesson $lesson)
    {
        $parameter = Route::current();
        $data = $parameter->uri;
        $course=Course::all();
        return view('admin.addlesson',compact('data','course'));
    }
    public function show_video($video)
    {
        $course=Lesson::where('lesson_video',$video)->first();
        $course_id=$course->course_id;
        $check=Suscriber::where('course_id',$course_id)->where('user_id',Auth::user()->id);
        if($check->count() > 0){
            return view('showvideo',compact('video'));
        }
        else{
            return redirect()->back()->with("error","You are not suscriber of this course.");
        }
    }
    public function intro_video($video)
    {
        return view('introvideo',compact('video'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lesson $lesson)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lesson $lesson)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lesson $lesson)
    {
        //
    }
}
