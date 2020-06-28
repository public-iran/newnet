<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminCardController extends Controller
{
    public function index()
    {
        $user=User::findorfail(Auth::id());
        return view('admin.card.index',compact(['user']));
    }

}
