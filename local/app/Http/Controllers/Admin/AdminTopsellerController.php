<?php

namespace App\Http\Controllers\Admin;

use App\Level;
use App\Topseller;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminTopsellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $top_sellers=Topseller::with('user')->get();
        return view('admin.Topseller.index',compact(['top_sellers']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=User::all();
        return view('admin.Topseller.create',compact(['users']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $topsellers=Topseller::where('user_id',$request->input('user_id'))->first();
        if ($topsellers){
            session()->put('existence-topseller','success');
            return redirect('admin/Topseller/create');
        }else{
            $topseller=new Topseller();
            $topseller->user_id=$request->input('user_id');
            $topseller->sell=$request->input('sell');
            $topseller->week=$request->input('week');
            $topseller->day=$request->input('day');
            $topseller->month=$request->input('month');
            $topseller->season=$request->input('season');
            $topseller->save();
            session()->put('insert-topseller','success');
            return redirect('admin/Topseller');
        }

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
        $topseller=Topseller::findorfail($id);
        return view('admin.Topseller.edit',compact(['topseller']));
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
        $topseller=Topseller::findorfail($id);
        $topseller->sell=$request->input('sell');
        $topseller->week=$request->input('week');
        $topseller->month=$request->input('month');
        $topseller->day=$request->input('day');
        $topseller->season=$request->input('season');
        $topseller->save();
        session()->put('edit-topseller','success');
        return redirect('admin/Topseller');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $topseller=Topseller::findorfail($id);
        $topseller->delete();
        session()->put('delete-topseller','success');
        return redirect('admin/Topseller');
    }
}
