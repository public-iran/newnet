<?php

namespace App\Http\Controllers\Admin;

use App\Education;
use App\Exam;
use App\Test;
use App\User;
use App\Userrequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\DocBlock\Tags\Example;

class AdminExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educations=Education::where(['level'=>Auth::user()->level])->get();
        if (count($educations)==Auth::user()->surface){
            $exams = Test::where('status', 'ACTIVE')->where('level',Auth::user()->level)->where('surface',Auth::user()->surface)->orderByRaw('RAND()')->take(50)->get();
            $educations=Education::where(['level'=>Auth::user()->level,'surface'=>Auth::user()->surface])->first();
        }else{
            $exams = Test::where('status', 'ACTIVE')->where('level',Auth::user()->level)->where('surface',Auth::user()->surface)->orderByRaw('RAND()')->take(10)->get();
            $educations=Education::where(['level'=>Auth::user()->level,'surface'=>Auth::user()->surface])->first();
        }

        return view('admin.Exam.index', compact(['exams','educations']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $question = $request->input();
        foreach ($question as $key => $row) {
            $this->save($key, $row);
        }
        $educations=Education::where(['level'=>Auth::user()->level])->get();
        if (count($educations)==Auth::user()->surface){

            $answer=Exam::where('user_id',Auth::id())->where('reply','true')->where('level',Auth::user()->level)->where('surface',Auth::user()->surface)->get();
            if (count($answer)>=40){
                $user=User::findorfail(Auth::id());
                $user->level=$user->level+1;
                $user->save();
                session()->put('insert-Exam', 'Accept');
                session()->put('next-level', 'success');
            }else{
                $username = "udreams";
                $password = 'fardabia20002000';
                $from = "+983000505";
                $pattern_code = "14085wuuyx";
                $to = array(Auth::user()->mobile);
                $input_data = array("name" => Auth::user()->name);
                $url = "https://ippanel.com/patterns/pattern?username=" . $username . "&password=" . urlencode($password) . "&from=$from&to=" . json_encode($to) . "&input_data=" . urlencode(json_encode($input_data)) . "&pattern_code=$pattern_code";
                $handler = curl_init($url);
                curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($handler, CURLOPT_POSTFIELDS, $input_data);
                curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($handler);
                session()->put('verifire_code_password', $request->input('mobile'));

                session()->put('insert-Exam', 'Reject');
                $answer=Exam::where('user_id',Auth::id())->where('level',Auth::user()->level)->where('surface',Auth::user()->surface);
                $answer->delete();
            }
        }else{
        $answer=Exam::where('user_id',Auth::id())->where('reply','true')->where('level',Auth::user()->level)->where('surface',Auth::user()->surface)->get();
        if (count($answer)>=9){

            $user=User::findorfail(Auth::id());
            $surface=$user->surface;

             $user->surface=$surface+1;
             $user->save();
            $userrequest_Exam=Userrequest::where(['user_id'=>Auth::id(),'request'=>'Exam','Exam'=>'YES']);
            $userrequest_Exam->delete();
            session()->put('insert-Exam', 'Accept');
        }else{
            $username = "udreams";
            $password = 'fardabia20002000';
            $from = "+983000505";
            $pattern_code = "14085wuuyx";
            $to = array(Auth::user()->mobile);
            $input_data = array("name" => Auth::user()->name);
            $url = "https://ippanel.com/patterns/pattern?username=" . $username . "&password=" . urlencode($password) . "&from=$from&to=" . json_encode($to) . "&input_data=" . urlencode(json_encode($input_data)) . "&pattern_code=$pattern_code";
            $handler = curl_init($url);
            curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($handler, CURLOPT_POSTFIELDS, $input_data);
            curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($handler);
            session()->put('verifire_code_password', $request->input('mobile'));

            session()->put('insert-Exam', 'Reject');
            $answer=Exam::where('user_id',Auth::id())->where('level',Auth::user()->level)->where('surface',Auth::user()->surface);
            $answer->delete();
        }
        }


        session()->put('test-alert', 'success');
        return redirect('admin/dashboard');
    }

    public function save($key, $row)
    {
        $exam = new Exam();
        if ($key != '_token') {
            $tests = Test::where('id', $key)->get();
            foreach ($tests as $test) {
                if ($test->answer == $row) {
                    $exam->reply = 'true';
                }else{
                    $exam->reply = 'false';
                }
            }
        }



        $exam->test_id = $key;
        $exam->answer = $row;
        $exam->user_id = Auth::id();
        $exam->surface = Auth::user()->surface;
        $exam->level = Auth::user()->level;
        $exam->save();
        $test = Exam::where('test_id', '_token');
        $test->delete();


    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
