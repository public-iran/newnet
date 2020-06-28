<?php

namespace App\Http\Controllers\Admin;

use App\File;
use App\Level;
use App\Surface;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminFileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $files=File::with('level','surface')->get();
        $surfaces=Surface::pluck('title','id');
        $levels=Level::pluck('title','id');
        return view('admin.file.index',compact(['files','levels','surfaces']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $files=File::with('level','surface')->get();
        $surfaces=Surface::pluck('title','id');
        $levels=Level::pluck('title','id');
        return view('admin.file.create',compact(['files','levels','surfaces']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $user=new User();
        $photo=new File();

        if ($request->file1!=''){
            if ($file=$request->file('file01')){
                $name=time().$file->getClientOriginalName();
                $file->move('amozesh/level'.$request->input('level').'/'.$request->file1,$name);
                $photo->path_file1=$name;
                $photo->file1=$request->file1;

                $photo->save();

            }
        }
        if ($request->file2!='') {
            if ($file = $request->file('file02')) {
                $name = time() . $file->getClientOriginalName();
                $file->move('amozesh/level' . $request->input('level') . '/'.$request->file2, $name);
                $photo->path_file2=$name;
                $photo->file2=$request->file2;

                $photo->save();

            }
        }

        if ($request->file3!='') {
            if ($file = $request->file('file03')) {
                $name = time() . $file->getClientOriginalName();
                $file->move('amozesh/level' . $request->input('level') . '/'.$request->file3, $name);
                $photo->path_file3=$name;
                $photo->file3=$request->file3;

                $photo->save();

            }
        }
        if ($request->file4!=''){
        if ($file=$request->file('file04')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('amozesh/level' . $request->input('level') . '/'.$request->file4, $name);
            $photo->path_file4=$name;
            $photo->file4=$request->file4;

            $photo->save();
        }
        }
        $photo->user_id=Auth::id();
        $photo->name=$request->input('name');
        $photo->level_id=$request->input('level');
        $photo->surface_id=$request->input('surface');
        $photo->save();


        session()->put('insert-file','success');
        return redirect('admin/file');
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

        $file=File::findOrFail($id);
        $surfaces=Surface::pluck('title','id');
        $levels=Level::pluck('title','id');
        return view('admin.file.edit',compact(['file','levels','surfaces']));
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

        $photo=File::findOrFail($id);
        if ($request->file1!=''){
            if ($file=$request->file('file01')){
                $name=time().$file->getClientOriginalName();
                $file->move('amozesh/level'.$request->input('level').'/'.$request->file1,$name);
                $photo->path_file1=$name;
                $photo->file1=$request->file1;

                $photo->save();

            }
        }
        if ($request->file2!='') {
            if ($file = $request->file('file02')) {
                $name = time() . $file->getClientOriginalName();
                $file->move('amozesh/level' . $request->input('level') . '/'.$request->file2, $name);
                $photo->path_file2=$name;
                $photo->file2=$request->file2;

                $photo->save();

            }
        }

        if ($request->file3!='') {
            if ($file = $request->file('file03')) {
                $name = time() . $file->getClientOriginalName();
                $file->move('amozesh/level' . $request->input('level') . '/'.$request->file3, $name);
                $photo->path_file3=$name;
                $photo->file3=$request->file3;

                $photo->save();

            }
        }
        if ($request->file4!=''){
            if ($file=$request->file('file04')) {
                $name = time() . $file->getClientOriginalName();
                $file->move('amozesh/level' . $request->input('level') . '/'.$request->file4, $name);
                $photo->path_file4=$name;
                $photo->file4=$request->file4;

                $photo->save();
            }
        }
        $photo->user_id=Auth::id();
        $photo->name=$request->input('name');
        $photo->level_id=$request->input('level');
        $photo->surface_id=$request->input('surface');
        $photo->save();



        session()->put('edit-file','success');
        return redirect('admin/file');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file=File::findorfail($id);

        unlink('/amozesh/level'.$file->level_id.'/'.$file->file1.'/'.$file->path_file1);
        unlink('/amozesh/level'.$file->level_id.'/'.$file->file2.'/'.$file->path_file2);
        unlink('/amozesh/level'.$file->level_id.'/'.$file->file3.'/'.$file->path_file3);
        unlink('/amozesh/level'.$file->level_id.'/'.$file->file4.'/'.$file->path_file4);

        $file->delete();
        session()->put('delete-file','success');
        return redirect('admin/file');
    }
}
