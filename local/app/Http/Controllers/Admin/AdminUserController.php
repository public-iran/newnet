<?php

namespace App\Http\Controllers\Admin;

use App\Level;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::id()==1){
            $users=User::whereNotIn('role',[1])->where('verifire','YES')->orderBy('id', 'desc')->paginate(15);
        }else{
            $users=User::whereNotIn('role',[1])->where('verifire','YES')->where('ostan',Auth::user()->ostan)->orderBy('id', 'desc')->paginate(15);
        }

        return view('admin.users.index',compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
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
        $user=User::findorfail($id);
        $levels=Level::all();
        return view('admin.users.edit',compact(['user','levels']));
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

        $user=User::findorfail($id);

        if($file = $request->file('avatar')){
            if ($user->avatar!=''){
                unlink('images/user_profile/' . $user->avatar);
            }

            $user->avatar='';
            $name = time() . $file->getClientOriginalName() ;
            $file->move('images/user_profile', $name);
            $user->avatar = $name;
        }

        $user->name=$request->input('name');
        $user->mobile=$request->input('mobile');
        $user->buy_package=$request->input('buy_package');

        $user->level=$request->input('level');
        $user->surface=$request->input('surface');
        if ($request->input('status')){
            $user->status=$request->input('status');
        }else{
            $user->status='INACTIVE';
        }

        if ($request->input('password')){
            $user->password = bcrypt($request->input('password'));
        }



        $user->save();
        session()->put('edit-users', 'success');
        return redirect('admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::findorfail($id);
        $user->delete();
        session()->put('delete-users', 'success');
        return redirect('admin/users');
    }
}
