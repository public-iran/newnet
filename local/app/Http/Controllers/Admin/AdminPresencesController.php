<?php

namespace App\Http\Controllers\Admin;

use App\User;
use App\Presence;
use App\Meeting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminPresencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $ostan=$request->input('ostan');
        $city=$request->input('city');
        $level=$request->input('level');
        $users=User::where(['ostan'=>$ostan,'city'=>$city,'level'=>$level])->get();
        foreach ($users as $user){
            $presence=new Presence();
            $presence->user_id=$user->id;
            $presence->meeting_id=$request->input('meeting_id');
            $presence->presence="NO";
            $presence->save();
        }
        foreach ($request->input('presence') as $item){

            $users=Presence::where(['user_id'=>$item,'meeting_id'=>$request->input('meeting_id')])->update(['presence'=>"YES"]);

        }

        $meetings=Presence::where(['meeting_id'=>$request->input('meeting_id'),'presence'=>'NO'])->get();
/*        $meetings=DB::table('presences')->leftJoin('users', 'presences.user_id', '=', 'users.id')->where(['meeting_id'=>$request->input('meeting_id'),'presence'=>'NO'])->get();*/

        if (count($meetings)) {
            foreach ($meetings as $meeting) {

                $user_mobile = User::findorfail($meeting->user_id);
                $user_Meeting = Meeting::findorfail($meeting->meeting_id);
                $username = "udreams";
                $password = 'fardabia20002000';
                $from = "+983000505";
                $pattern_code = "88fiuzri5j";
                $to = array($user_mobile->mobile);
                $input_data = array("date" => $user_Meeting->date, "time" => $user_Meeting->time, "name" => $user_Meeting->title);
                $url = "https://ippanel.com/patterns/pattern?username=" . $username . "&password=" . urlencode($password) . "&from=$from&to=" . json_encode($to) . "&input_data=" . urlencode(json_encode($input_data)) . "&pattern_code=$pattern_code";
                $handler = curl_init($url);
                curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($handler, CURLOPT_POSTFIELDS, $input_data);
                curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($handler);

            }
        }
        session()->put('insert-presence', 'success');
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
