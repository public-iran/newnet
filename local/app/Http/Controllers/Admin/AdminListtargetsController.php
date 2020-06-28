<?php

namespace App\Http\Controllers\Admin;

use App\Listpeople;
use App\Listtarget;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminListtargetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $users=new User();
//        $listpeoples=$users->join('listpeoples','users.id','=','listpeoples.user_id')->get();
        $listtargets=Listtarget::select('user_id','confirmation')->DISTINCT()->with('user')->get();

        return view('admin.listtarget.index',compact(['listtargets']));
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

        $listtargets=Listtarget::where('user_id',$id)->get();
        $user=User::findorfail($id);
        return view('admin.listtarget.show',compact(['listtargets','user']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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

         $Listpeople=Listtarget::where('user_id','=',$id)->update(['confirmation'=>$request->confirmation]);
        if ($request->confirmation=="YES"){
            $user=User::findorfail($id);
            $user->listpeople="YES";
            $user->test_confirm="NO";
            $user->save();
            session()->put('add-listtargets', 'success');
        }else{
            $mobile=User::findorfail($id);
            $username = "udreams";
            $password = 'fardabia20002000';
            $from = "+983000505";
            $pattern_code = "fjpa1j7j0r";
            $to = array($mobile->mobile);
            $input_data = array("name" => "");
            $url = "https://ippanel.com/patterns/pattern?username=" . $username . "&password=" . urlencode($password) . "&from=$from&to=" . json_encode($to) . "&input_data=" . urlencode(json_encode($input_data)) . "&pattern_code=$pattern_code";
            $handler = curl_init($url);
            curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($handler, CURLOPT_POSTFIELDS, $input_data);
            curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($handler);
            session()->put('add-listtargets', 'Unconfirmed');
        }

        return redirect('admin/listtargets');
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
