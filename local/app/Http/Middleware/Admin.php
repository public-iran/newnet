<?php

namespace App\Http\Middleware;

use Closure;
use Hekmatinasser\Verta\Verta;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            $user=User::findorfail(Auth::id());
            if(Auth::user()->verifire == 'YES' and Auth::user()->status == 'ACTIVE') {
                if (Auth::user()->isAdmin()) {

                    $v=new Verta();
                    $date=$v->year.'/'.$v->month.'/'.$v->day;


                    return $next($request);
                }
            }else{

                if (Auth::user()->verifire == 'NO'){
                    Auth::logout();



                    $length = 6; // تعداد حروف و اعداد که برای کاربر نمایش داده میشوند
                    $str = "123456789";
                    $max = strlen($str) - 1;
                    $random = "";
                    for ($i = 0; $i < $length; $i++) {
                        $number = mt_rand(0, $max);
                        $random .= substr($str, $number, 1);
                    }
                    $user->verifire_code = $random;
                    $user->save();

                    $username = "udreams";
                    $password = 'fardabia20002000';
                    $from = "+983000505";
                    $pattern_code = "30a206hbb9";
                    $to = array($user->mobile);
                    $input_data = array("verification-code" => $random);
                    $url = "https://ippanel.com/patterns/pattern?username=" . $username . "&password=" . urlencode($password) . "&from=$from&to=" . json_encode($to) . "&input_data=" . urlencode(json_encode($input_data)) . "&pattern_code=$pattern_code";
                    $handler = curl_init($url);
                    curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
                    curl_setopt($handler, CURLOPT_POSTFIELDS, $input_data);
                    curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
                    $response = curl_exec($handler);


                    session()->put('verifire_mobile', $user->mobile);
                    return redirect('verifire');
                }
                if( Auth::user()->status == 'INACTIVE'){
                    Auth::logout();
                    session()->put('Access', 'NOT');
                    return redirect('login');
                }

            }
        }

        return redirect('/login');
    }
}
