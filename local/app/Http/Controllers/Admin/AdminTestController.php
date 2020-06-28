<?php

namespace App\Http\Controllers\Admin;

use App\Level;
use App\Test;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $level_id=$request->input('level');
        $surface_id=$request->input('surface');
        if ($level_id){
            $tests=Test::where('level',$level_id,'surface',$surface_id);

            return view('admin.test.index',compact(['tests']));
        }else{
            return redirect('admin/education') ;
        }

    }


    public function show_index(Request $request)
    {
        $level_id=$request->input('level');
        $surface_id=$request->input('surface');
        $tests=Test::where('level', $level_id)->where('surface', $surface_id)->get();
        return view('admin.test.index',compact(['tests','level_id','surface_id']));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        dd($request);
        return view('admin.test.create');
    }
    public function create_test(Request $request)
    {
        $level_id=$request->input('level');
        $surface_id=$request->input('surface');
        return view('admin.test.create',compact(['level_id','surface_id']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $test=new Test();
        $test->question=$request->input('question');
        $test->answer1=$request->input('answer1');
        $test->answer2=$request->input('answer2');
        $test->answer3=$request->input('answer3');
        $test->answer4=$request->input('answer4');
        $test->answer=$request->input('answer');
        $test->level=$request->input('level');
        $test->surface=$request->input('surface');
        $test->save();
        session()->put('insert-test','success');

        $level_id=$request->input('level');
        $surface_id=$request->input('surface');
        $tests=Test::where('level', $level_id)->where('surface', $surface_id)->get();
        return view('admin.test.index',compact(['tests','level_id','surface_id']));
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $test=Test::findorfail($id);
        return view('admin.test.edit',compact(['test']));
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
        $test=Test::findorfail($id);
        $test->question=$request->input('question');
        $test->answer1=$request->input('answer1');
        $test->answer2=$request->input('answer2');
        $test->answer3=$request->input('answer3');
        $test->answer4=$request->input('answer4');
        $test->answer=$request->input('answer');
        $test->level=$request->input('level');
        $test->surface=$request->input('surface');
        $test->save();
        session()->put('edit-test','success');

        $level_id=$request->input('level');
        $surface_id=$request->input('surface');
        $tests=Test::where('level', $level_id)->where('surface', $surface_id)->get();
        return view('admin.test.index',compact(['tests','level_id','surface_id']));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $test=Test::findorfail($id);
        $test->delete();
        session()->put('delete-test','success');

    }
}
