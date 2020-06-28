<?php

namespace App\Http\Controllers\AdminB;

use App\Tree;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminUsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users=User::orderBy('id','desc')->get();
        return view('adminbizness.users.index',compact(['users']));
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
        $user=User::where('id',$id)->first();
        $users=$this->get_user($user->reference_code);


        //return view('adminbizness.users.show',compact(['users']));
    }
    public function get_user($reference_code)
    {
        $users=Tree::where('reference',$reference_code)->get();
        foreach ($users as $user){
            $this->get_user($user->reference_code);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=User::where('id',$id)->first();
        $users=User::all();
        return view('adminbizness.users.edit',compact(['user','users']));
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
        if ($request->type==null){
            $this->validate($request, [
                'name' => 'required|string|max:255|min:3|regex:/^[ آابپتثجچحخدذرزژسشصضطظعغفقکگلمنوهیئ\s]+$/',
                'national_code' => 'required|max:10|min:10|unique:users,national_code,'.$id,
                'mobile' => 'required|regex:/(09)[0-9]{9}/|digits:11|unique:users,mobile,'.$id,
                'ostan'=>'required',
                'city'=>'required',
                'ostan_id'=>'required',
                'city_id'=>'required',
            ], [
                'name.required'=>'نام و نام خانوادگی را وارد کنید',
                'name.regex' => 'نام و نام خانوادگی نمی تواند عدد یا حروف لاتین باشد.',
                'national_code.required'=>'کدملی را وارد کنید',
                'national_code.unique'=>'کدملی از قبل موجود می باشد',
                'national_code.min'=>'کدملی نامعتبر است',
                'national_code.max'=>'کدملی نامعتبر است',
                'mobile.required'=>'شماره موبایل را وارد کنید',
                'mobile.unique'=>'شماره موبایل را وارد کنید',
                'mobile.regex'=>'شماره موبایل صحیح نیست',
                'ostan.required'=>'استان را انتخاب کنید',
                'city.required'=>'شهر را انتخاب کنید',
                'ostan_id.required'=>'استان را انتخاب کنید',
                'city_id.required'=>'شهر را انتخاب کنید',
            ]);
            if ($request->city_id!="ابتدا استان را انتخاب کنید" and $request->city_id!="-1") {
                $user->name = $request->name;
                $user->national_code = $request->national_code;
                $user->mobile = $request->mobile;
                $user->sex = $request->sex;
                $user->ostan_id = $request->ostan_id;
                $user->ostan = $request->ostan;
                $user->city_id = $request->city_id;
                $user->city = $request->city;
                if ($file = $request->file('avatar')) {
                    if (!empty($user->avatar)) {
                        unlink($user->avatar);
                    }

                    $name = time() . $file->getClientOriginalName();
                    $file->move('images/user_profile/' . $user->id . '/', $name);
                    $user->avatar = 'images/user_profile/' . $user->id . '/' . $name;
                }

                $user->save();
                session()->put('user_chagne', 'تغییرات با موفقیت ذخیره شده');
            }else{
                session()->put('user_chagne_city', 'استان و شهر خود را انتخاب کنید');
            }
        }
        elseif ($request->type=="pass"){
            session()->put('tab_pass','pass');
            $this->validate($request, [
            'password' => 'required|min:6|confirmed|regex:/^.*(?=.{3,})(?=.*[a-z])(?=.*[0-9])(?=.*[\d\x]).*$/',

            ], [
                'password.required'=>'رمز عبور را وارد کنید',
                'password.min'=>'رمز عبور حداقل 6 کاراکتر می باشد',
                'password.confirmed'=>'رمز عبور و تکرار رمز عبور یکسان نیست',
                'password.regex'=>'رمز عبور باید ترکیبی از حروف لاتین و عدد باشد',
                ]);
            $user->password = bcrypt($request->input('password'));
            $user->save();
            session()->put('user_chagne','رمز عبور با موفقیت تغییر کرد');
        }
        session()->forget('tab_pass');


        return redirect(route('users.edit',$id));

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
