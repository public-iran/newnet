<?php

namespace App\Http\Controllers\Admin;

use App\Level;
use App\Meeting;
use App\Presence;
use App\User;
use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminMeetingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Meetings=Meeting::all();
        return view('admin.meetings.index',compact(['Meetings']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels=Level::all();
        return view('admin.meetings.create',compact(['levels']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'ostan' => 'required',
            'city' => 'required',
            'time' => 'required',
            'title' => 'required',
        ],[
            'ostan.required' => 'استان خود را انتخاب کنید',
            'city.required' => 'شهر خود را انتخاب کنید',
            'time.required' => 'ساعت برکزاری را تعیین کنید',
            'time.title' => 'عنوان جلسه را وارد کنید.',

        ]);
        $Meeting=new Meeting();
        $Meeting->level=$request->input('level');
        $Meeting->title=$request->input('title');
        $Meeting->ostan=$request->input('ostan');
        $Meeting->city=$request->input('city');
        $Meeting->date=$request->input('date');
        $Meeting->time=$request->input('time');
        $Meeting->save();

        session()->put('insert-Meeting', 'success');
        return redirect('admin/meetings');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Meeting=Meeting::findorfail($id);
        $users=User::where(['ostan'=>$Meeting->ostan,'city'=>$Meeting->city,'level'=>$Meeting->level])->get();
        $presences=DB::table('presences')->leftJoin('users', 'presences.user_id', '=', 'users.id')->where('meeting_id',$id)->get();
        return view('admin.meetings.show',compact(['users','id','presences']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
        //
    }
}
