<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subject;
use App\Models\Course;

class apiSubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subjects = Subject::orderBy("id","ASC")->paginate(8);
        return response()->json($subjects);
    } 

    public function allCourse()
    {
        return Course::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        dd($request->all());
        $subject = new Subject;
        $subject->name = $request->name;
        $subject->description = $request->description;
        $subject->is_active = true;
        $subject->save();
        
        return response()->json($subject);
        //return request();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Subject::where('id',$id)->delete();
        
    }

    public function search($nameSubject)
    {
        //dd($request->all());
        $subject = Subject::where('name','like','%'.$nameSubject.'%')->get();
        return response()->json($subject);
    }
}
