<?php

namespace App\Http\Controllers\Admin;

use App\Listpeople;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class AdminListpeopleController extends Controller
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
       $listpeoples=Listpeople::with('user')->where('confirmation','OK')->orwhere('confirmation','NOTOK')->get();
        return view('admin.listpeople.index',compact(['listpeoples']));
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

        $listpeople=Listpeople::findorfail($id);
        $user=User::findorfail($listpeople->user_id);
        return view('admin.listpeople.show',compact(['listpeople','user']));
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

        $Listpeople=Listpeople::findorfail($id);
        $Listpeople->confirmation=$request->confirmation;
        $Listpeople->save();
        if ($request->Unconfirmed=="OK"){
            $user=User::findorfail($Listpeople->user_id);
            $user->listpeople="YES";
            if ($user->test_confirm=="YES"){
                $user->test_confirm="NO";
            }else{
                $user->surface=$user->surface+1;
            }

            $user->save();

            session()->put('add-listpeople', 'success');
        }else{
            $mobile=User::findorfail($Listpeople->user_id);
            $username = "udreams";
            $password = 'fardabia20002000';
            $from = "+983000505";
            $pattern_code = "5obifw1jno";
            $to = array($mobile->mobile);
            $input_data = array("name" => "");
            $url = "https://ippanel.com/patterns/pattern?username=" . $username . "&password=" . urlencode($password) . "&from=$from&to=" . json_encode($to) . "&input_data=" . urlencode(json_encode($input_data)) . "&pattern_code=$pattern_code";
            $handler = curl_init($url);
            curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($handler, CURLOPT_POSTFIELDS, $input_data);
            curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($handler);

            session()->put('add-listpeople', 'Unconfirmed');
        }

        return redirect('admin/listpeople');
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
