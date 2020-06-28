<?php

namespace App\Http\Controllers\AdminB;

use App\Tree;
use App\User;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminZero_price_ceilingController extends Controller
{   protected $i=1;
    public function Zero_price_ceiling()
    {
        $date=Verta::now()->format('d');
        if ($date==01){
            Tree::where('id','!=','0')->update(['price_ceiling'=>'0']);
        }
    }

    public function delete_user_no_package()
    {
        $users=User::where(['buy_package'=>'NO','package'=>null,'reference'=>null,'national_code'=>null])->get();

        if (!empty($users)) {
            foreach ($users as $user) {
                $date2 = date('Y-m-d', strtotime($user->created_at));
                $date1 = date('Y-m-d');
                //$date1 = '2020-06-30';
                $diff = abs(strtotime($date2) - strtotime($date1));
                $years = floor($diff / (365 * 60 * 60 * 24));
                $months = floor(($diff - $years * 365 * 60 * 60 * 24) / (30 * 60 * 60 * 24));
                $days = floor(($diff - $years * 365 * 60 * 60 * 24 - $months * 30 * 60 * 60 * 24) / (60 * 60 * 24));
                if ($days == 2) {
                    $user->delete();
                }
            }
        }
    }

    public function store()
    {

        $user=$this->user('25');

    }



    public function user($user_id)
    {
        $user=Tree::where('user_id',$user_id)->first();
        if (!empty($user)){


            if ($this->i==1){
                echo '50%<br>'.$user->reference_code.'<br><hr>';
            }
            if ($this->i==2){
                echo '15%<br>'.$user->reference_code.'<br><hr>';
            }
            if ($this->i==3){
                echo '8%<br>'.$user->reference_code.'<br><hr>';
            }
            if ($this->i==4){
                echo '5%<br>'.$user->reference_code.'<br><hr>';
            }
            if ($this->i==5){
                echo '4%<br>'.$user->reference_code.'<br><hr>';;
            }
            if ($this->i==6){
                echo '4%<br>'.$user->reference_code.'<br><hr>';;
            }
            if ($this->i==7){
                echo '3%<br>'.$user->reference_code.'<br><hr>';;
            }
            if ($this->i==8){
                echo '3%<br>'.$user->reference_code.'<br><hr>';;
            }
            if ($this->i==9){
                echo '3%<br>'.$user->reference_code.'<br><hr>';;
            }
            if ($this->i==10){
                echo '2.5%<br>'.$user->reference_code.'<br><hr>';;
            } if ($this->i==11){
                echo '2.5%<br>'.$user->reference_code.'<br><hr>';;
            }
            $this->looplevelten($user->reference);
        }


    }

    public function looplevelten($reference)
    {
        $levelup=Tree::where('reference_code',$reference)->first();
        if (!empty($levelup)){
            $this->i++;
            $this->user($levelup->user_id);

        }


    }
}
