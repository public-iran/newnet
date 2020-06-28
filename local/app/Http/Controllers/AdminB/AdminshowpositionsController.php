<?php

namespace App\Http\Controllers\AdminB;

use App\Tree;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminshowpositionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        $hands = Tree::where('reference_code' , Auth::user()->reference_code)->first();

        if(!$hands){
            $left_hand = '';
            $right_hand = '';
            $leftcount = 0;
            $rightcount = 0;
            $leftsave = 0;
            $rightsave = 0;
            $direct_selling = 0;
        }else{

            $left_hand = $hands->left_hand;
            $right_hand = $hands->right_hand;
            $leftcount = $hands->left_count;
            $rightcount = $hands->right_count;
            $leftsave = number_format($hands->left_price);
            $rightsave = number_format($hands->right_price);
            $direct_selling=$hands->direct_selling_save;
            if(!empty($hands->left_hand)){

                $hands_user_left = Tree::where('reference_code' , $hands->left_hand)->first();
                $user_left = User::findorfail($hands_user_left->user_id);
                $name_left = $user_left->name;
                $state_left = $user_left->ostan;
                $city_left = $user_left->city;
                $mobile_left = $user_left->mobile;
                $direct_selling=$user_left->direct_selling_save;
            }else{
                $name_left = '';
                $state_left = '';
                $city_left = '';
                $mobile_left = '';
                $direct_selling = 0;
            }

            if(!empty($hands->right_hand)){

                $hands_user_right = Tree::where('reference_code' , $hands->right_hand)->first();
                $user_right = User::findorfail($hands_user_right->user_id);
                $name_right = $user_right->name;
                $state_right = $user_right->ostan;
                $city_right = $user_right->city;
                $mobile_right = $user_right->mobile;
                $direct_selling=$user_left->direct_selling_save;
            }else{
                $name_right = '';
                $state_right = '';
                $city_right = '';
                $mobile_right = '';
                $direct_selling = 0;
            }

        }

        if(empty($hands->right_hand) and empty($hands->left_hand)){
            $name_right = '';
            $state_right = '';
            $city_right = '';
            $mobile_right = '';
            $name_left = '';
            $state_left = '';
            $city_left = '';
            $mobile_left = '';
            $direct_selling = 0;
        }

        return view('adminbizness.showpositions.index', compact(['left_hand', 'right_hand', 'name_left', 'state_left', 'city_left', 'mobile_left', 'name_right', 'state_right', 'city_right', 'mobile_right', 'leftcount', 'rightcount', 'leftsave', 'rightsave','direct_selling']));
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
