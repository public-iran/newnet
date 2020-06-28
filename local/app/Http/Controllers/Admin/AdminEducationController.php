<?php

namespace App\Http\Controllers\Admin;

use App\Education;
use App\Edusound;
use App\Eduvideo;
use App\Eduphoto;
use App\Edupdf;
use App\File;
use App\Level;
use App\Surface;
use App\Test;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminEducationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $educations = Education::select('level')->distinct()->get();
        $educations2 = Education::all();
        return view('admin.education.index', compact(['educations', 'educations2']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $educations = Education::all();
        $surfaces = Surface::pluck('title', 'id');
        $levels = Level::all();
        $files = File::all();
        return view('admin.education.create', compact(['educations', 'levels', 'surfaces', 'files']));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {





             foreach ($request->input('surface') as $key => $row) {
                 if ($request->input('File_type')!="list" and $request->input('File_type')!="target" and $request->input('File_type')!="Golden_list") {

                 if ($files = $request->file('sound' . $row)) {
                     $Edusounds = Edusound::where(['level' => $request->input('level')])->orderby('surface', 'DESC')->first();
                     $key1 = 1;
                     if (!empty($Edusounds->surface)) {
                         $key1 = $Edusounds->surface + 1;
                     }
                     $this->save1($request, $key1, $row);
                 }

                 if ($files = $request->input('video' . $row)) {
                     $Eduvideos = Eduvideo::where(['level' => $request->input('level')])->orderby('surface', 'DESC')->first();
                     $key2 = 1;
                     if (!empty($Eduvideos->surface)) {
                         $key2 = $Eduvideos->surface + 1;
                     }
                     $this->save2($request, $key2, $row);
                 }

                 if ($files = $request->file('photos' . $row)) {

                     $Eduphotos = Eduphoto::where(['level' => $request->input('level')])->orderby('surface', 'DESC')->first();
                     $key3 = 1;
                     if (!empty($Eduphotos->surface)) {
                         $key3 = $Eduphotos->surface + 1;
                     }

                     $this->save3($request, $key3, $row);
                 }

                 if ($files = $request->file('pdf' . $row)) {
                     $Edupdfs = Edupdf::where(['level' => $request->input('level')])->orderby('surface', 'DESC')->first();
                     $key4 = 1;
                     if (!empty($Edupdfs->surface)) {
                         $key4 = $Edupdfs->surface + 1;
                     }

                     $this->save4($request, $key4, $row);
                 }


                 //$educations = Education::where(['level' => $request->input('level')])->orderby('surface', 'DESC')->first();
                 $educations = Education::where(['level' => $request->input('level')])->get();
                 $key = 1;
                 if ($educations) {
                     $key = count($educations) + 1;
                 }
                 $this->save($request, $key, $row);


             }else{
                 $educations = Education::where(['level' => $request->input('level')])->get();
                 $key = 1;
                 if ($educations) {
                     $key = count($educations) + 1;
                 }

                 $amozesh = new Education();
                 $amozesh->title = $request->input('title');
                 $amozesh->level = $request->input('level');
                 $amozesh->surface = $key;
                 if ($request->input('File_type')=="list"){
                     $amozesh->list = 'YES';
                     $amozesh->target = 'NO';
                     $amozesh->Golden_list = 'NO';
                 }
                 if ($request->input('File_type')=="target"){
                     $amozesh->target = 'YES';
                     $amozesh->list = 'NO';
                     $amozesh->Golden_list = 'NO';
                 }
                 if ($request->input('File_type')=="Golden_list"){
                     $amozesh->target = 'NO';
                     $amozesh->list = 'NO';
                     $amozesh->Golden_list = 'YES';
                 }

                 $amozesh->shamel = $request->input('shamel' . $row);
                 $amozesh->zaman = $request->input('zaman' . $row);
                 $amozesh->user_id = Auth::id();
                 if (!empty($request->input('notest'))){
                     @$amozesh->test = $request->input('notest');
                 }
                     if (!empty($request->input('test_confirm'))){
                         $users=User::where('surface','=',$key)->update(['test_confirm'=>$request->input('test_confirm')]);
                     }

                     if (!empty($request->input('test_confirm'))){
                         $amozesh->test_confirm = $request->input('test_confirm');
                     }else{
                         @$amozesh->test_confirm="NO";
                     }

                     $amozesh->save();
             }

         }
        session()->put('insert-Education', 'success');
        return redirect('admin/education/'.$request->input('level'));
    }

    public function save($request, $key, $row)
    {
        $amozesh = new Education();
        $amozesh->title = $request->input('title');
        $amozesh->level = $request->input('level');
        $amozesh->surface = $key;
        $amozesh->shamel = $request->input('shamel' . $row);
        $amozesh->zaman = $request->input('zaman' . $row);

        $amozesh->user_id = Auth::id();
        if (!empty($request->input('notest'))){
            @$amozesh->test = $request->input('notest');
        }

        if (!empty($request->input('test_confirm'))){
            $amozesh->test_confirm = $request->input('test_confirm');
        }else{
            @$amozesh->test_confirm="NO";
        }


        if (!empty($request->input('test_confirm'))){
            $users=User::where('surface','=',$key)->update(['test_confirm'=>$request->input('test_confirm')]);
        }
        $amozesh->save();
    }

    public function save1($request, $key, $row)
    {


        if ($files = $request->file('sound' . $row)) {
            foreach ($files as $file) {
                $name = time().rand() . $file->getClientOriginalName();
                $file->move('amozesh/level' . $request->input('level') . '/surface' . $row . '/sound/', $name);
                $sound = new Edusound();
                $sound->user_id = Auth::id();
                $sound->title = $request->input('title');
                $sound->level = $request->input('level');
                $sound->surface = $key;
                $sound->path = $name;
                $sound->name = $file->getClientOriginalName();
                $sound->save();
            }
        }
    }

    public function save2($request, $key, $row)
    {


        if ($files = $request->input('video' . $row)) {
            foreach ($files as $file) {
                $video = new Eduvideo();
                $video->user_id = Auth::id();
                $video->title = $request->input('title');
                $video->level = $request->input('level');
                $video->surface = $key;
                $video->path = $file;
                $video->name = '';

                $video->save();
            }
        }


    }

    public function save3($request, $key, $row)
    {

        if ($files = $request->file('photos' . $row)) {
            foreach ($files as $file) {
                $name = time().rand() . $file->getClientOriginalName();
                $file->move('amozesh/level' . $request->input('level') . '/surface' . $row . '/photos/', $name);
                $photos = new Eduphoto();
                $photos->user_id = Auth::id();
                $photos->title = $request->input('title');
                $photos->level = $request->input('level');
                $photos->surface = $key;
                $photos->path = $name;
                $photos->name = $file->getClientOriginalName();
                $photos->save();
            }
        }


    }

    public function save4($request, $key, $row)
    {
        if ($files = $request->file('pdf' . $row)) {
            foreach ($files as $file) {
                $name = time().rand() . $file->getClientOriginalName();
                $file->move('amozesh/level' . $request->input('level') . '/surface' . $row . '/pdf/', $name);
                $pdf = new Edupdf();
                $pdf->user_id = Auth::id();
                $pdf->title = $request->input('title');
                $pdf->level = $request->input('level');
                $pdf->surface = $key;
                $pdf->path = $name;
                $pdf->name = $file->getClientOriginalName();
                $pdf->save();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $educations = Education::where('level', $id)->get();
        $level = $id;
        return view('admin.education.show', compact(['educations', 'level']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $education = Education::findorfail($id);
        $photos=Eduphoto::where(['level'=>$education->level,'surface'=>$education->surface])->get();
        $videos=Eduvideo::where(['level'=>$education->level,'surface'=>$education->surface])->get();
        $sounds=Edusound::where(['level'=>$education->level,'surface'=>$education->surface])->get();
        $pdfs=Edupdf::where(['level'=>$education->level,'surface'=>$education->surface])->get();
        return view('admin.education.edit', compact(['education','photos','videos','sounds','pdfs']));
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
        $amozesh = Education::findorfail($id);
        $key = $amozesh->surface;
        if ($request->input('File_type')!="list" and $request->input('File_type')!="target" and $request->input('File_type')!="Golden_list" ) {

            $row = $amozesh->surface;

            $key1 = $amozesh->surface;
            $key2 = $amozesh->surface;
            $key3 = $amozesh->surface;
            $key4 = $amozesh->surface;

            if ($files = $request->file('sound' . $row)) {
                $Edusounds = Edusound::where(['level' => $request->input('level')])->orderby('surface', 'DESC')->first();

                $this->save1($request, $key1, $row);
            }

            if ($files = $request->input('video' . $row)) {
                $Eduvideos = Eduvideo::where(['level' => $request->input('level')])->orderby('surface', 'DESC')->first();

                $this->save2($request, $key2, $row);
            }

            if ($files = $request->file('photos' . $row)) {

                $Eduphotos = Eduphoto::where(['level' => $request->input('level')])->orderby('surface', 'DESC')->first();

                $this->save3($request, $key3, $row);
            }

            if ($files = $request->file('pdf' . $row)) {
                $Edupdfs = Edupdf::where(['level' => $request->input('level')])->orderby('surface', 'DESC')->first();


                $this->save4($request, $key4, $row);
            }


            $educations = Education::where(['level' => $request->input('level')])->orderby('surface', 'DESC')->first();

            $this->save_update($request, $id, $key, $row);
        }else{
            $educations = Education::where(['level' => $request->input('level')])->get();


            $amozesh = Education::findorfail($id);
            $amozesh->title = $request->input('title');
            $amozesh->level = $request->input('level');

            $amozesh->shamel = $request->input('shamel');
            $amozesh->zaman = $request->input('zaman');
            $amozesh->user_id = Auth::id();
            if ($request->input('File_type')=="list"){
                $amozesh->list = 'YES';
                $amozesh->target = 'NO';
                $amozesh->Golden_list = 'NO';
            }
            if ($request->input('File_type')=="target"){
                $amozesh->target = 'YES';
                $amozesh->list = 'NO';
                $amozesh->Golden_list = 'NO';
            }
            if ($request->input('File_type')=="Golden_list"){
                $amozesh->target = 'NO';
                $amozesh->list = 'NO';
                $amozesh->Golden_list = 'YES';
            }
            if (!empty($request->input('notest'))){
                @$amozesh->test = $request->input('notest');
            }else{
                @$amozesh->test="YES";
            }
         if (!empty($request->input('test_confirm'))){
             $amozesh->test_confirm = $request->input('test_confirm');
            }else{
                @$amozesh->test_confirm="NO";
            }

            if (!empty($request->input('test_confirm'))){
                $users=User::where('surface','=',$key)->update(['test_confirm'=>$request->input('test_confirm')]);
            }else{
                $users=User::where('surface','=',$key)->update(['test_confirm'=>'NO']);
            }


            $amozesh->save();
        }


        session()->put('edit-Education', 'success');
        return redirect('admin/education/'.$amozesh->level);
    }

    public function save_update($request, $id, $row, $key)
    {
        $amozesh = Education::findorfail($id);
        $amozesh->title = $request->input('title');
        $amozesh->level = $request->input('level');

        $amozesh->shamel = $request->input('shamel');
        $amozesh->zaman = $request->input('zaman');
        $amozesh->user_id = Auth::id();
        $amozesh->list = 'No';
        $amozesh->target = 'No';
        $amozesh->Golden_list = 'No';
        if (!empty($request->input('notest'))){
            @$amozesh->test = $request->input('notest');
        }else{
            @$amozesh->test="YES";
        }

        if (!empty($request->input('test_confirm'))){
            $amozesh->test_confirm = $request->input('test_confirm');
        }else{
            @$amozesh->test_confirm="NO";
        }


        if (!empty($request->input('test_confirm'))){
            $users=User::where('surface','=',$key)->update(['test_confirm'=>$request->input('test_confirm')]);
        }else{
            $users=User::where('surface','=',$key)->update(['test_confirm'=>'NO']);
        }


        $amozesh->save();
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $education = Education::findOrFail($id);

        $education->delete();
        session()->put('delete-Education', 'success');
        return redirect('admin/education');
    }
}
