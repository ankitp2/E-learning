<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Quizresult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class QuizresultController extends Controller
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
    public function result(Request $request, $course_id, $lesson_id)
    {
        $check = DB::table('quizresults')->where('course_id', $course_id)->where('lesson_id',$lesson_id)->count();
        if ($check > 0) {
            return redirect()->back()->with('error', 'You have already taken this quiz');
        }
        $response = $request->all();
        $attempted = count($response['answer']);
        $count = 0;
        foreach ($response['answer'] as $key => $value) {
            $answer = DB::table('quizzes')->where('id', $key)->first();
            if ($value[0] === $answer->answer) {
                $count++;
            }
        }
       $quizresult=new Quizresult();
       $quizresult->course_id=$course_id;
       $quizresult->lesson_id=$lesson_id;
       $quizresult->user_id=Auth::user()->id;
       $quizresult->score=$count;
       $quizresult->question_attempted=$attempted;
        $quizresult->save();

        $quiz=Quizresult::where('lesson_id',$lesson_id)->where('user_id',Auth::user()->id)->where('course_id',$course_id)->first();
        
         return view('showquizresult',compact('quiz'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Quizresult $quizresult)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Quizresult $quizresult)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Quizresult $quizresult)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Quizresult $quizresult)
    {
        //
    }
}
