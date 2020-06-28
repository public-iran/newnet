<?php

namespace App\Http\Controllers\Admin;

use App\Level;
use App\User;
use App\Accesslist;
use App\Accessuser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::where('role',[1])->get();
        return view('admin.adminlist.index',compact(['users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

            if ($request->input('id') != 1) {
                $deletes = Accessuser::where('user_id', $request->input('id'))->get();
                foreach ($deletes as $delete) {
                    $delete->delete();
                }

                if (!empty($request->input('access'))) {
                $accesss = $request->input('access');
                foreach ($accesss as $access) {
                    $accessuser = new Accessuser();
                    $accessuser->user_id = $request->input('id');
                    $accessuser->access = $access;
                    $accessuser->save();
                }
            }
        }
        session()->put('access-user', 'success');
        return redirect('admin/adminlist');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $accessusers=DB::table('accesslists')->leftjoin('accessusers', 'accesslists.name', '=', 'accessusers.access')->get();
        return view('admin.adminlist.show',compact(['accessusers','id']));
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
        return view('admin.adminlist.edit',compact(['user','levels']));
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
        return redirect('admin/adminlist');
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
        return redirect('admin/adminlist');
    }
}
