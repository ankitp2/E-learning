<?php

namespace App\Http\Controllers;

use App\Models\Suscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuscriberController extends Controller
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
    public function store($course_id)
    {
        $check=Suscriber::where('user_id',Auth::user()->id)->where('course_id',$course_id)->get();
        if(count($check)>0){
            return redirect()->back()->with('error','You are already subscribed to this course');
        }
        $suscriber = new Suscriber();
        $suscriber->course_id = $course_id;
        $suscriber->user_id = Auth::user()->id;
        $suscriber->save();
        return redirect()->route('courses.profile',$course_id)->with('success','You are suscribed the course successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Suscriber $suscriber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Suscriber $suscriber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Suscriber $suscriber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Suscriber $suscriber)
    {
        //
    }
}
