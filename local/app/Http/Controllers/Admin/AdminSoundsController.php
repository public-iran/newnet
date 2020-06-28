<?php

namespace App\Http\Controllers\Admin;

use App\Sound;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use function GuzzleHttp\Promise\all;

class AdminSoundsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role==1){
            $sounds=Sound::all();
        }else{
            $sounds=Sound::where('status','SEEN')->get();
        }

        return view('admin.sounds.index',compact(['sounds']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sounds.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'ostan' => 'required',
            'city' => 'required',
            'category' => 'required',
        ],[
            'ostan.required' => 'استان خود را انتخاب کنید',
            'city.required' => 'شهر خود را انتخاب کنید',
            'category.required' => 'دسته بندی را انتخاب کنید',

        ]);


        if ($file=$request->file('photo')){
            foreach ($request->file('photo') as $allphoto){
                $photo=new Sound();
                $name=time().'-'.$allphoto->getClientOriginalName();
                $allphoto->move('sounds',$name);
                $photo->name=$allphoto->getClientOriginalName();
                $photo->path=$name;
                $photo->user_id=Auth::id();
                $photo->category=$request->input('category');
                $photo->ostan=$request->input('ostan');
                $photo->city=$request->input('city');
                $photo->save();

            }


            session()->put('insert-sound','success');

            return redirect('admin/sounds');


        }
//

//        return redirect('admin/photos');
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
