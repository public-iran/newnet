<?php

namespace App\Http\Controllers\Admin;

use App\Description;
use App\Education;
use App\File;
use App\Edusound;
use App\Eduvideo;
use App\Eduphoto;
use App\Edupdf;
use App\Listpeople;
use App\User;
use App\Userrequest;
use App\Listtarget;
use App\Goldenlistpeople;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminTrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $description=Description::where(['level'=>Auth::user()->level])->first();
        $educations=Education::where(['level'=>Auth::user()->level,'surface'=>Auth::user()->surface])->first();
        $photos=Eduphoto::where(['level'=>Auth::user()->level,'surface'=>Auth::user()->surface])->get();
        $videos=Eduvideo::where(['level'=>Auth::user()->level,'surface'=>Auth::user()->surface])->get();
        $sounds=Edusound::where(['level'=>Auth::user()->level,'surface'=>Auth::user()->surface])->get();
        $pdfs=Edupdf::where(['level'=>Auth::user()->level,'surface'=>Auth::user()->surface])->get();


        $oldeducations=Education::where('level',Auth::user()->level)->where('surface','<',Auth::user()->surface)->first();
        $oldphotos=Eduphoto::where('level',Auth::user()->level)->where('surface','<',Auth::user()->surface)->get();
        $oldvideos=Eduvideo::where('level',Auth::user()->level)->where('surface','<',Auth::user()->surface)->get();
        $oldsounds=Edusound::where('level',Auth::user()->level)->where('surface','<',Auth::user()->surface)->get();
        $oldpdfs=Edupdf::where('level',Auth::user()->level)->where('surface','<',Auth::user()->surface)->get();

        $userrequest_Next_surface=Userrequest::where(['user_id'=>Auth::id(),'request'=>'Next-surface'])->first();
        $userrequest_Exam=Userrequest::where(['user_id'=>Auth::id(),'request'=>'Exam'])->first();
        $listtargets=Listtarget::where('user_id',Auth::id())->get();
        $golden_list=Goldenlistpeople::where('user_id',Auth::id())->first();
        $list_people=Listpeople::where('user_id',Auth::id())->first();
        return view('admin.training.index',compact(['educations','description','photos','videos','sounds','pdfs','oldeducations','oldphotos','oldvideos','oldsounds','oldpdfs','userrequest_Next_surface','userrequest_Exam','listtargets','golden_list','list_people']));
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
        $list_people=Listpeople::where('user_id',Auth::id())->first();
        if ($list_people){
            $people=implode('|#|',$request->input('name'));
            $list_people->list=$people;
            $list_people->confirmation="NOTOK";
            $list_people->save();
        }else{
            $list=new Listpeople();
            $people=implode('|#|',$request->input('name'));
            $list->list=$people;
            $list->user_id=Auth::id();
            $list->save();
        }




        session()->put('add-listpeople', 'success');
        return redirect('admin/dashboard');
    }
    public function insert_goldenlistpeoples(Request $request)
    {
        $golen_list=Goldenlistpeople::where('user_id',Auth::id())->first();


        if ($golen_list){
            $people=implode('|#|',$request->input('name'));
            $golen_list->list=$people;
            $golen_list->confirmation="NO";
            $golen_list->save();
        }else{
            $list=new Goldenlistpeople();
            $people=implode('|#|',$request->input('name'));
            $list->list=$people;
            $list->user_id=Auth::id();
            $list->save();
        }




        session()->put('add-listpeople', 'success');
        return redirect('admin/dashboard');
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

    public function insert_listtargets(Request $request)
    {

        $listtarget=Listtarget::where('user_id',Auth::id())->first();
        if ($listtarget){
            $listtargets=Listtarget::where('user_id',Auth::id())->get();
            $i=1;
            foreach ($listtargets as $listtarget){

                $listtarget->target=$request->input('target'.$i);
                $listtarget->reason=$request->input('reason'.$i);
                $listtarget->price=$request->input('price'.$i);
                $listtarget->income=$request->input('income'.$i);
                $listtarget->position=$request->input('position'.$i);
                $listtarget->balance=$request->input('balance'.$i);
                $listtarget->date=$request->input('date'.$i);
                $listtarget->achieve=$request->input('achieve'.$i);
                $listtarget->reason5=implode('|#|',$request->input('5reason'));
                $listtarget->user_id=Auth::id();
                $listtarget->confirmation="NO";
                $listtarget->save();
                $i++;
            }
        }else{


            for ($i=1;$i<=10;$i++){
                $listtarget=new Listtarget();
                $listtarget->target=$request->input('target'.$i);
                $listtarget->reason=$request->input('reason'.$i);
                $listtarget->price=$request->input('price'.$i);
                $listtarget->income=$request->input('income'.$i);
                $listtarget->position=$request->input('position'.$i);
                $listtarget->balance=$request->input('balance'.$i);
                $listtarget->date=$request->input('date'.$i);
                $listtarget->achieve=$request->input('achieve'.$i);
                $listtarget->reason5=implode('|#|',$request->input('5reason'));
                $listtarget->user_id=Auth::id();
                $listtarget->save();
            }
        }

        session()->put('add-listtargets', 'success');
        return redirect('admin/dashboard');
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
