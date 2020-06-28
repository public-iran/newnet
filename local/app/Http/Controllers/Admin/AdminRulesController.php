<?php

namespace App\Http\Controllers\Admin;

use App\Level;
use App\Rule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AdminRulesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $rules=Rule::all();
            return view('admin.rules.index',compact(['rules']));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_user()
    {
        $rule_user=Rule::where('level',Auth::user()->level)->first();
        return view('admin.rules.index_user',compact(['rule_user']));
    }
    public function create()
    {
        $levels=Level::all();
        return view('admin.rules.create',compact(['levels']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rule=new Rule();
        $rule->level=$request->input('level');
        $arr = implode('@#', $request->input('rules'));
//        $rule->rules=$request->input('rules');
        $rule->rules=$arr;
        $rule->save();

        session()->put('insert-rules', 'success');
        return redirect('admin/rules');
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
        $rule=Rule::findorfail($id);
        return view('admin.rules.edit',compact(['levels','rule']));
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
        $rule=Rule::findorfail($id);
        $rule->level=$request->input('level');
        $arr = implode('@#', $request->input('rules'));
//        $rule->rules=$request->input('rules');
        $rule->rules=$arr;
        $rule->save();

        session()->put('edit-rules', 'success');
        return redirect('admin/rules');
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
