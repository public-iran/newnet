<?php

namespace App\Http\Controllers\Admin;
use App\Level;
use App\Description;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDescriptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $descriptions=Description::all();
        return view('admin.description.index',compact(['descriptions']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels=Level::all();
        return view('admin.description.create',compact(['levels']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $des = new Description();
        $des->level = $request->input('level');
        $arr = implode('@#', $request->input('description'));
        $des->description=$arr;
        $des->save();

        session()->put('insert-description', 'success');
        return redirect('admin/description');

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
        $levels=Level::all();
       $description=Description::findorfail($id);
       return view('admin.description.edit',compact(['description','levels']));
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
        $des = Description::findorfail($id);
        $des->level = $request->input('level');
        $arr = implode('@#', $request->input('description'));
        $des->description=$arr;
        $des->save();

        session()->put('edit-description', 'success');
        return redirect('admin/description');
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
