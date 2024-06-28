<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Lesson;
use App\Models\Quiz;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

class QuizController extends Controller
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
        $admin=User::where('id',Auth::user()->id);
        if($admin->email=="admin@chetu.com"){
            $request->validate([
                'course_id' => 'required',
                'lesson_id' => 'required',
                'option1' => 'required',
               'option2' => 'required',
               'option3' => 'required',
               'option4' => 'required',
               'answer' => 'required'
            ]);
            $check=Quiz::where('course_id',$request->course_id)->where('lesson_id',$request->lesson_id)->get();
            if(count($check)>0){
                return redirect()->back()->with('error','Quiz already exist');
            }
            $course_id=$request->course_id;
            $lesson_id=$request->lesson_id;
            // dd($request->all());
            for ($i=0 ; $i<count($request->question) ; $i++){
                $quiz = new Quiz();
                $quiz->course_id = $course_id;
                $quiz->lesson_id = $lesson_id;
                $quiz->question = $request->question[$i];
                $quiz->option1 = $request->option1[$i];
                $quiz->option2 = $request->option2[$i];
                $quiz->option3 = $request->option3[$i];
                $quiz->option4 = $request->option4[$i];
                $quiz->answer = $request->answer[$i];
                $quiz->save();
            }
            return redirect()->back()->with('success','Quiz uploaded Successfully.');
        }else{
            return redirect()->back()->with('error','You are not authorized to upload quiz.');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Quiz $quiz)
    {
        $parameter = Route::current();
        $data = $parameter->uri;
        $lesson=Lesson::all();
        $course=Course::all();
        return view('admin.addquiz',compact('data','course','lesson'));
    }
    public function show_quiz($course_id,$lesson_id)
    {
        $check=DB::table('suscribers')->where('user_id',Auth::user()->id)->where('course_id',$course_id)->count();
        if($check > 0){
            $quizzes=Quiz::where('course_id',$course_id)->where('lesson_id',$lesson_id)->get();
        return view('showquiz',compact('quizzes'));
        }
        else{
            return redirect()->back()->with("error","You are not suscriber of this course.");
        }
        
    }
    
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quiz $quiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quiz $quiz)
    {
        //
    }
    public function test(Request $request)
    {
        $cid=$request->cid;
        $lesson=Lesson::where('course_id',$cid)->get();
        return response()->json($lesson);
    }
}
