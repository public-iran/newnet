<?php

namespace App\Http\Controllers\Admin;

use App\Level;
use App\Surface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminSurfaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $surfaces=Surface::all();
        return view('admin.surface.index',compact(['surfaces']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $levels=Level::pluck('title','id');
        return view('admin.surface.create',compact(['levels']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $surface=new Surface();
        $surface->title=$request->input('title');
        $surface->level_id=$request->input('level');
        $surface->save();

        session()->put('insert-surface','success');
        return redirect('admin/surface');
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
        $surface=Surface::findorfail($id);
        $levels=Level::pluck('title','id');
        return view('admin.surface.edit',compact(['surface','levels']));
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
        $surface=Surface::findorfail($id);
        $surface->title=$request->input('title');
        $surface->level_id=$request->input('level');
        $surface->save();

        session()->put('edit-surface','success');
        return redirect('admin/surface');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $surface=Surface::findorfail($id);
        $surface->delete();
        session()->put('delete-surface','success');
        return redirect('admin/surface');
    }
}
