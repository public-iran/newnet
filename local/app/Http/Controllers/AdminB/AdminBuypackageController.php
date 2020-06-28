<?php

namespace App\Http\Controllers\AdminB;

use App\Package;
use App\Packagepayment;
use App\Payment;
use App\Tree;
use App\User;
use App\Wallet;
use App\Allreport;
use App\Walletsreport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminBuypackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $packages = Package::all();
        $wallet = Wallet::where('user_id', Auth::id())->first();
        return view('adminbizness.buypackage.index', compact(['packages', 'wallet']));
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        session()->put('package', $request->package);
        $package = Package::findorfail($request->package);
        $maliat = $package->price * 9 / 100;
        $price_package = $package->price + $maliat;


        $upline_user = Tree::where('reference_code', Auth::user()->reference)->first();
        if (!empty($upline_user)) {
            if (Auth::user()->buy_package=="NO") {
                if ($upline_user->right_hand == '') {

                    if ($request->pay_style == 1) {

                        $payment = new Payment($price_package, 'adminb/buy-package/payment_verify_buy_package/payment-verify');
                        $result = $payment->doPayment();

                        if ($result->Status == 100) {
                            return redirect()->to('https://sandbox.zarinpal.com/pg/StartPay/' . $result->Authority);
                        } else {
                            echo 'ERR: ' . $result->Status;
                        }
                    } elseif ($request->pay_style == 2) {
                        $wallet = Wallet::where('user_id', Auth::id())->first();
                        $package = Package::findorfail($request->package);
                        if ($wallet->price >= $price_package) {
                            $package_price = Package::all();
                            if ($request->package == 1) {
                                $this->package_one($package_price);
                            } dd($request->package);
                            if ($request->package == 2) {

                                $this->package_three($package_price);
                            }
                            if ($request->package == 3) {
                                $this->package_five($package_price);
                            }
                            if ($request->package == 4) {
                                $this->package_eight($package_price);
                            }

                            $maliat = $package->price * 9 / 100;
                            $price_package = $package->price + $maliat;
                            $user = User::findorfail(Auth::id());
                            $user->buy_package = 'YES';
                            $wallet->price = $wallet->price - $price_package;
                            $wallet->save();
                            $user->save();


                            $wallets_report = new Walletsreport();
                            $wallets_report->user_id = Auth::id();
                            $wallets_report->wallet_id = $wallet->id;
                            $wallets_report->Authority = '';
                            $wallets_report->description = "خرید پیج ";
                            $wallets_report->price = $price_package;
                            $wallets_report->status = "PAY";

                            $wallets_report->save();


                            $username = "udreams";
                            $password = 'fardabia20002000';
                            $from = "+983000505";
                            $pattern_code = "bynh2oc5s4";
                            $to = array(Auth::user()->mobile);
                            $input_data = array("name" => Auth::user()->name,"pack"=>$request->package);
                            $url = "https://ippanel.com/patterns/pattern?username=" . $username . "&password=" . urlencode($password) . "&from=$from&to=" . json_encode($to) . "&input_data=" . urlencode(json_encode($input_data)) . "&pattern_code=$pattern_code";
                            $handler = curl_init($url);
                            curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
                            curl_setopt($handler, CURLOPT_POSTFIELDS, $input_data);
                            curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
                            $response = curl_exec($handler);

                            session()->put('buy_package', 'خرید شما با موفقیت انجام شد');
                            return redirect('adminb/dashboardb');
                        }
                    }
                } else {
                    session()->put('buy_package_danger', 'خرید شما انجام نشد. جایگاه توسط شخص دیگری رزرو شده است.لطفا با پشتیبانی تماس بگیرید');
                    return redirect('adminb/buy-package');
                }

            }else{
                session()->put('buy_package_danger', 'شما قبلا پکیج را خریداری کرده اید');
                return redirect('adminb/dashboardb');
            }
        }else{
            session()->put('buy_package_danger', 'خرید شما انجام نشد.لطفا با پشتیبانی تماس بگیرید');
            return redirect('adminb/buy-package');
        }

    }


    public function package_one($package_price)
    {

        /********* Step 1 *********/
        $user = User::findorfail(Auth::id());
        $tree = new Tree();
        $tree->user_id = $user->id;
        $tree->reference_code = '';
        $tree->pin_code = $user->pin_code;
        $tree->reference = $user->reference;
        $tree->save();



        $v = Verta();
        $code = $v->year . '' . $v->month . '' . $v->day . '' . $tree->id;
        $tree->reference_code = $code;
        $tree->save();

        $reference_user = Tree::where('reference_code', $user->reference)->first();
        if ($reference_user->left_hand == '') {
            $reference_user->left_hand = $tree->reference_code;
        } else {
            $reference_user->right_hand = $tree->reference_code;
        }
        $reference_user->save();

        $user->reference_code = $tree->reference_code;
        $user->package = 1;
        $user->save();



        $direct_selling = Tree::where('reference_code', $user->pin_code)->first();
        $price_direct_selling = $package_price[0]->price * 20 / 100;
        $direct_selling->direct_selling = $direct_selling->direct_selling + $price_direct_selling;
        $direct_selling->direct_selling_save = $direct_selling->direct_selling_save + $price_direct_selling;
        $direct_selling->save();
        $this->insert_report_direct($user->pin_code,$price_direct_selling);

        $report=new Allreport();
        $report->user_id=$user->id;
        $report->reference_code=$tree->reference_code;
        $report->total_price=$package_price[0]->price+180000;
        $report->description='خرید پکیج';
        $report->save();

        $this->hand_count($tree->reference_code, $user->reference, 1);
        $this->hand_count_price($tree->reference_code, $user->reference, $package_price[0]->price);
        $this->hand_price($tree->reference_code, $user->reference, $package_price[0]->price);
        $this->report($tree->reference_code, $user->reference, $package_price[0]->price,1);
    }

    public function package_three($package_price)
    {
        /********* Step 1 *********/
        $user = User::findorfail(Auth::id());
        $tree = new Tree();
        $tree->user_id = $user->id;
        $tree->reference_code = '';
        $tree->pin_code = $user->pin_code;
        $tree->reference = $user->reference;
        $tree->right_count = 1;
        $tree->left_count = 1;
        $tree->left_total_sell = $package_price[0]->price;
        $tree->left_price = $package_price[0]->price;
        $tree->right_total_sell = $package_price[0]->price;
        $tree->right_price = $package_price[0]->price;
        $tree->save();

        $v = Verta();
        $code = $v->year . '' . $v->month . '' . $v->day . '' . $tree->id;
        $tree->reference_code = $code;
        $tree->save();
        $user->reference_code = $tree->reference_code;
        $user->package = 2;
        $user->save();

        $reference_user = Tree::where('reference_code', $user->reference)->first();

        if ($reference_user->left_hand == '') {
            $reference_user->left_hand = $tree->reference_code;
        } else {
            $reference_user->right_hand = $tree->reference_code;
        }
        $reference_user->save();


        $direct_selling = Tree::where('reference_code', $user->pin_code)->first();
        $price_direct_selling = $package_price[1]->price * 20 / 100;
        $direct_selling->direct_selling = $direct_selling->direct_selling + $price_direct_selling;
        $direct_selling->direct_selling_save = $direct_selling->direct_selling_save + $price_direct_selling;
        $direct_selling->save();
        $this->insert_report_direct($user->pin_code,$price_direct_selling);
        /********* Step 2 *********/
        $tree2 = new Tree();
        $tree2->user_id = $user->id;
        $tree2->pin_code = $user->pin_code;
        $tree2->reference_code = '';
        $tree2->reference = $tree->reference_code;
        $tree2->save();

        $code = $v->year . '' . $v->month . '' . $v->day . '' . $tree2->id;
        $tree2->reference_code = $code;
        $tree2->save();

        $tree->left_hand = $tree2->reference_code;
        $tree->save();


        /********* Step 3 *********/
        $tree3 = new Tree();
        $tree3->user_id = $user->id;
        $tree3->pin_code = $user->pin_code;
        $tree3->reference_code = '';
        $tree3->reference = $tree->reference_code;
        $tree3->save();

        $code = $v->year . '' . $v->month . '' . $v->day . '' . $tree3->id;
        $tree3->reference_code = $code;
        $tree3->save();

        $tree->right_hand = $tree3->reference_code;
        $tree->save();

        $report=new Allreport();
        $report->user_id=$user->id;
        $report->reference_code=$tree->reference_code;
        $report->total_price=$package_price[1]->price+180000;
        $report->description='خرید پکیج';
        $report->save();


        $this->hand_count($tree->reference_code, $user->reference, 3);
        $this->hand_count_price($tree->reference_code, $user->reference, $package_price[1]->price);
        $this->hand_price($tree->reference_code, $user->reference, $package_price[1]->price);
        $this->report($tree->reference_code, $user->reference, $package_price[1]->price,3);
    }


    public function package_five($package_price)
    {
        /********* Step 1 *********/
        $user = User::findorfail(Auth::id());
        $tree = new Tree();
        $tree->user_id = $user->id;
        $tree->reference_code = '';
        $tree->pin_code = $user->pin_code;
        $tree->reference = $user->reference;
        $tree->right_count = 2;
        $tree->left_count = 2;
        $tree->left_total_sell = $package_price[0]->price * 2;
        $tree->left_price = $package_price[0]->price * 2;
        $tree->right_total_sell = $package_price[0]->price * 2;
        $tree->right_price = $package_price[0]->price * 2;
        $tree->save();

        $v = Verta();
        $code = $v->year . '' . $v->month . '' . $v->day . '' . $tree->id;
        $tree->reference_code = $code;
        $tree->save();
        $user->reference_code = $tree->reference_code;
        $user->package = 3;
        $user->save();

        $reference_user = Tree::where('reference_code', $user->reference)->first();
        if ($reference_user->left_hand == '') {
            $reference_user->left_hand = $tree->reference_code;
        } else {
            $reference_user->right_hand = $tree->reference_code;
        }
        $reference_user->save();


        $direct_selling = Tree::where('reference_code', $user->pin_code)->first();
        $price_direct_selling = $package_price[2]->price * 20 / 100;
        $direct_selling->direct_selling = $direct_selling->direct_selling + $price_direct_selling;
        $direct_selling->direct_selling_save = $direct_selling->direct_selling_save + $price_direct_selling;
        $direct_selling->save();
        $this->insert_report_direct($user->pin_code,$price_direct_selling);

        /********* Step 2 left*********/
        $tree2 = new Tree();
        $tree2->user_id = $user->id;
        $tree2->pin_code = $user->pin_code;
        $tree2->reference_code = '';
        $tree2->reference = $tree->reference_code;
        $tree2->left_count = 1;
        $tree2->left_total_sell = $package_price[0]->price;
        $tree2->left_price = $package_price[0]->price;
        $tree2->save();

        $code = $v->year . '' . $v->month . '' . $v->day . '' . $tree2->id;
        $tree2->reference_code = $code;
        $tree2->save();

        $tree_hand = Tree::where('reference_code', $tree->reference_code)->first();
        $tree_hand->left_hand = $tree2->reference_code;
        $tree_hand->save();


        /********* Step 3 left*********/
        $tree3 = new Tree();
        $tree3->user_id = $user->id;
        $tree3->pin_code = $user->pin_code;
        $tree3->reference_code = '';
        $tree3->reference = $tree2->reference_code;
        $tree3->save();

        $code = $v->year . '' . $v->month . '' . $v->day . '' . $tree3->id;
        $tree3->reference_code = $code;
        $tree3->save();

        $tree_hand2 = Tree::where('reference_code', $tree2->reference_code)->first();
        $tree_hand2->left_hand = $tree3->reference_code;
        $tree_hand2->save();


        /********* Step 4 right*********/
        $tree4 = new Tree();
        $tree4->user_id = $user->id;
        $tree4->pin_code = $user->pin_code;
        $tree4->reference_code = '';
        $tree4->reference = $tree->reference_code;
        $tree4->right_count = 1;
        $tree4->right_total_sell = $package_price[0]->price;
        $tree4->right_price = $package_price[0]->price;
        $tree4->save();

        $code = $v->year . '' . $v->month . '' . $v->day . '' . $tree4->id;
        $tree4->reference_code = $code;
        $tree4->save();

        $tree_hand3 = Tree::where('reference_code', $tree->reference_code)->first();
        $tree_hand3->right_hand = $tree4->reference_code;
        $tree_hand3->save();


        /********* Step 5 right*********/
        $tree5 = new Tree();
        $tree5->user_id = $user->id;
        $tree5->pin_code = $user->pin_code;
        $tree5->reference_code = '';
        $tree5->reference = $tree4->reference_code;
        $tree5->save();

        $code = $v->year . '' . $v->month . '' . $v->day . '' . $tree5->id;
        $tree5->reference_code = $code;
        $tree5->save();

        $tree_hand4 = Tree::where('reference_code', $tree4->reference_code)->first();
        $tree_hand4->right_hand = $tree5->reference_code;
        $tree_hand4->save();

        $report=new Allreport();
        $report->user_id=$user->id;
        $report->reference_code=$tree->reference_code;
        $report->total_price=$package_price[2]->price+180000;
        $report->description='خرید پکیج';
        $report->save();

        $this->hand_count($tree->reference_code, $user->reference, 5);
        $this->hand_count_price($tree->reference_code, $user->reference, $package_price[2]->price);
        $this->hand_price($tree->reference_code, $user->reference, $package_price[2]->price);
        $this->report($tree->reference_code, $user->reference, $package_price[2]->price,5);
    }

    public function package_eight($package_price)
    {
        $user = User::findorfail(Auth::id());
        /********* Step 1 *********/
        $tree1 = new Tree();
        $tree1->user_id = $user->id;
        $tree1->reference_code = '';
        $tree1->pin_code = $user->pin_code;
        $tree1->reference = $user->reference;
        $tree1->right_count = 0;
        $tree1->left_count = 7;
        $tree1->left_total_sell = $package_price[0]->price * 7;
        $tree1->left_price = $package_price[0]->price * 7;
        $tree1->right_total_sell = $package_price[0]->price* 7;
        $tree1->right_price = $package_price[0]->price* 7;
        $tree1->save();

        $v = Verta();
        $code = $v->year . '' . $v->month . '' . $v->day . '' . $tree1->id;
        $tree1->reference_code = $code;
        $tree1->save();
        $user->reference_code = $tree1->reference_code;
        $user->package = 4;
        $user->save();

        $reference_user = Tree::where('reference_code', $user->reference)->first();

        if ($reference_user->left_hand == '') {
            $reference_user->left_hand = $tree1->reference_code;
        } else {
            $reference_user->right_hand = $tree1->reference_code;
        }
        $reference_user->save();


        $direct_selling = Tree::where('reference_code', $user->pin_code)->first();
        $price_direct_selling = $package_price[3]->price * 20 / 100;
        $direct_selling->direct_selling = $direct_selling->direct_selling + $price_direct_selling;
        $direct_selling->direct_selling_save = $direct_selling->direct_selling_save + $price_direct_selling;
        $direct_selling->save();
        $this->insert_report_direct($user->pin_code,$price_direct_selling);

        /********* Step 2 left*********/
        $tree2 = new Tree();
        $tree2->user_id = $user->id;
        $tree2->pin_code = $user->pin_code;
        $tree2->reference_code = '';
        $tree2->reference = $tree1->reference_code;
        $tree2->right_count = 3;
        $tree2->left_count = 3;
        $tree2->left_total_sell = $package_price[1]->price;
        $tree2->left_price = $package_price[1]->price;
        $tree2->right_total_sell = $package_price[1]->price;
        $tree2->right_price = $package_price[1]->price;
        $tree2->save();

        $code = $v->year . '' . $v->month . '' . $v->day . '' . $tree2->id;
        $tree2->reference_code = $code;
        $tree2->save();

        $tree_hand = Tree::where('reference_code', $tree1->reference_code)->first();
        $tree_hand->left_hand = $tree2->reference_code;
        $tree_hand->save();


        /********* Step 3 left*********/
        $tree3 = new Tree();
        $tree3->user_id = $user->id;
        $tree3->pin_code = $user->pin_code;
        $tree3->reference_code = '';
        $tree3->reference = $tree2->reference_code;
        $tree3->right_count = 1;
        $tree3->left_count = 1;
        $tree3->left_total_sell = $package_price[0]->price;
        $tree3->left_price = $package_price[0]->price;
        $tree3->right_total_sell = $package_price[0]->price;
        $tree3->right_price = $package_price[0]->price;
        $tree3->save();

        $code = $v->year . '' . $v->month . '' . $v->day . '' . $tree3->id;
        $tree3->reference_code = $code;
        $tree3->save();

        $tree_hand2 = Tree::where('reference_code', $tree2->reference_code)->first();
        $tree_hand2->left_hand = $tree3->reference_code;
        $tree_hand2->save();


        /********* Step 4 right*********/
        $tree4 = new Tree();
        $tree4->user_id = $user->id;
        $tree4->pin_code = $user->pin_code;
        $tree4->reference_code = '';
        $tree4->reference = $tree2->reference_code;
        $tree4->right_count = 1;
        $tree4->left_count = 1;
        $tree4->left_total_sell = $package_price[0]->price;
        $tree4->left_price = $package_price[0]->price;
        $tree4->right_total_sell = $package_price[0]->price;
        $tree4->right_price = $package_price[0]->price;
        $tree4->save();

        $code = $v->year . '' . $v->month . '' . $v->day . '' . $tree4->id;
        $tree4->reference_code = $code;
        $tree4->save();

        $tree_hand3 = Tree::where('reference_code', $tree2->reference_code)->first();
        $tree_hand3->right_hand = $tree4->reference_code;
        $tree_hand3->save();


        /********* Step 5 left*********/
        $tree5 = new Tree();
        $tree5->user_id = $user->id;
        $tree5->pin_code = $user->pin_code;
        $tree5->reference_code = '';
        $tree5->reference = $tree3->reference_code;
        $tree5->save();

        $code = $v->year . '' . $v->month . '' . $v->day . '' . $tree5->id;
        $tree5->reference_code = $code;
        $tree5->save();

        $tree_hand4 = Tree::where('reference_code', $tree3->reference_code)->first();
        $tree_hand4->left_hand = $tree5->reference_code;
        $tree_hand4->save();

        /********* Step 6 right*********/
        $tree6 = new Tree();
        $tree6->user_id = $user->id;
        $tree6->pin_code = $user->pin_code;
        $tree6->reference_code = '';
        $tree6->reference = $tree3->reference_code;
        $tree6->save();

        $code = $v->year . '' . $v->month . '' . $v->day . '' . $tree6->id;
        $tree6->reference_code = $code;
        $tree6->save();

        $tree_hand5 = Tree::where('reference_code', $tree3->reference_code)->first();
        $tree_hand5->right_hand = $tree6->reference_code;
        $tree_hand5->save();

        /********* Step 7 left*********/
        $tree7 = new Tree();
        $tree7->user_id = $user->id;
        $tree7->pin_code = $user->pin_code;
        $tree7->reference_code = '';
        $tree7->reference = $tree4->reference_code;
        $tree7->save();

        $code = $v->year . '' . $v->month . '' . $v->day . '' . $tree7->id;
        $tree7->reference_code = $code;
        $tree7->save();

        $tree_hand7 = Tree::where('reference_code', $tree4->reference_code)->first();
        $tree_hand7->left_hand = $tree7->reference_code;
        $tree_hand7->save();

        /********* Step 8 right*********/
        $tree8 = new Tree();
        $tree8->user_id = $user->id;
        $tree8->pin_code = $user->pin_code;
        $tree8->reference_code = '';
        $tree8->reference = $tree4->reference_code;
        $tree8->save();

        $code = $v->year . '' . $v->month . '' . $v->day . '' . $tree8->id;
        $tree8->reference_code = $code;
        $tree8->save();

        $tree_hand8 = Tree::where('reference_code', $tree4->reference_code)->first();
        $tree_hand8->right_hand = $tree8->reference_code;
        $tree_hand8->save();

        $report=new Allreport();
        $report->user_id=$user->id;
        $report->reference_code=$tree1->reference_code;
        $report->total_price=$package_price[3]->price+180000;
        $report->description='خرید پکیج';
        $report->save();

        $this->hand_count($tree1->reference_code, $user->reference, 8);
        $this->hand_count_price($tree1->reference_code, $user->reference, $package_price[3]->price);
        $this->hand_price($tree1->reference_code, $user->reference, $package_price[3]->price);
        $this->report($tree1->reference_code, $user->reference, $package_price[3]->price,8);

    }

    public function hand_count($reference_code = '', $reference = '', $count = '')
    {
        $query = Tree::where('reference_code', $reference)->first();
        if ($query) {
            if ($reference_code == $query->left_hand) {
                $this->hand_count($query->reference_code, $query->reference, $count);
                $query->left_count = $query->left_count + $count;
            }
            if ($reference_code == $query->right_hand) {
                $this->hand_count($query->reference_code, $query->reference, $count);
                $query->right_count = $query->right_count + $count;
            }
            $query->save();
        }
    }

    public function hand_price($reference_code = '', $reference = '', $count = '')
    {
        $query = Tree::where('reference_code', $reference)->first();
        if ($query) {
            if ($reference_code == $query->left_hand) {
                $this->hand_price($query->reference_code, $query->reference, $count);
                $query->left_price = $query->left_price + $count;
            }
            if ($reference_code == $query->right_hand) {
                $this->hand_price($query->reference_code, $query->reference, $count);
                $query->right_price = $query->right_price + $count;
            }
            $query->save();
        }
    }

    public function hand_count_price($reference_code = '', $reference = '', $count = '')
    {
        $query = Tree::where('reference_code', $reference)->first();
        if ($query) {
            if ($reference_code == $query->left_hand) {
                $this->hand_count_price($query->reference_code, $query->reference, $count);
                $query->left_total_sell = $query->left_total_sell + $count;
            }
            if ($reference_code == $query->right_hand) {
                $this->hand_count_price($query->reference_code, $query->reference, $count);
                $query->right_total_sell = $query->right_total_sell + $count;
            }
            $query->save();
        }
    }

    public function report($reference_code = '', $reference = '', $price='',$count = '')
    {
        $query = Tree::where('reference_code', $reference)->first();

        if ($query) {
            $report=new Allreport();
            $report->reference_code=$reference;
            $report->user_id=$query->user_id;

            if ($reference_code == $query->left_hand) {
                $this->report($query->reference_code, $query->reference,$price, $count);
                $report->left_count=$count;
                $report->left_price=$price;
            }
            if ($reference_code == $query->right_hand) {
                $this->report($query->reference_code, $query->reference,$price, $count);
                $report->right_count=$count;
                $report->right_price=$price;
            }
            $report->description="بودجه آموزشی";
            $report->save();
        }
    }


    public function insert_report_direct($reference_code,$price)
    {
        $direct_selling = Tree::where('reference_code',$reference_code)->first();
        $report=new Allreport();
        $report->user_id=$direct_selling->user_id;
        $report->reference_code=$direct_selling->reference_code;
        $report->left_price='0';
        $report->direct_selling=$price;
        $report->description="بودجه آموزشیار";
        $report->save();
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

    public function payment_verify_buy_package()
    {
        if ($_GET['Status']=="OK"){
            if (Auth::user()->buy_package=="NO") {
                $wallet = Wallet::where('user_id', Auth::id())->first();
                $package = Package::findorfail(session()->get('package'));
                $package_price = Package::all();
                if (session()->get('package') == 1) {
                    $this->package_one($package_price);
                }
                if (session()->get('package') == 2) {
                    $this->package_three($package_price);
                }
                if (session()->get('package') == 3) {
                    $this->package_five($package_price);
                }
                if (session()->get('package') == 4) {
                    $this->package_eight($package_price);
                }


                $user = User::findorfail(Auth::id());
                $user->buy_package = 'YES';
                $user->save();


                $username = "udreams";
                $password = 'fardabia20002000';
                $from = "+983000505";
                $pattern_code = "bynh2oc5s4";
                $to = array(Auth::user()->mobile);
                $input_data = array("name" => Auth::user()->name, "pack" => session()->get('package'));
                $url = "https://ippanel.com/patterns/pattern?username=" . $username . "&password=" . urlencode($password) . "&from=$from&to=" . json_encode($to) . "&input_data=" . urlencode(json_encode($input_data)) . "&pattern_code=$pattern_code";
                $handler = curl_init($url);
                curl_setopt($handler, CURLOPT_CUSTOMREQUEST, "POST");
                curl_setopt($handler, CURLOPT_POSTFIELDS, $input_data);
                curl_setopt($handler, CURLOPT_RETURNTRANSFER, true);
                $response = curl_exec($handler);


                session()->put('buy_package', 'خرید شما با موفقیت انجام شد');
                return redirect('adminb/dashboardb');

            }else{
                session()->put('buy_package_danger', 'شما قبلا پکیج را خریداری کرده اید');
                return redirect('adminb/dashboardb');
            }
        }else{
            session()->put('buy_package_d', 'خرید شما با خطا مواجه شد');
            return redirect('adminb/buy-package');
        }
    }

    public function Account_charging(Request $request)
    {
        $wallet = Wallet::where('user_id', Auth::id())->first();
        session()->put('price_Account_charging_' . $wallet->token, $request->price);


        $payment = new Payment($request->price, '/adminb/buy-package/Account_charging/payment-verify');
        $result = $payment->doPayment();


        if ($result->Status == 100) {
            return redirect()->to('https://sandbox.zarinpal.com/pg/StartPay/' . $result->Authority);
        } else {
            echo 'ERR: ' . $result->Status;
        }
    }

    public function payment_verify_Account_charging()
    {
        $wallet = Wallet::where('user_id', Auth::id())->first();

        $wallets_report = new Walletsreport();
        $wallets_report->user_id = Auth::id();
        $wallets_report->wallet_id = $wallet->id;
        $wallets_report->Authority = ltrim($_GET['Authority'], '0');
        $wallets_report->description = "شارژ کیف پول";
        $price = session()->get('price_Account_charging_' . $wallet->token);
        $wallets_report->price = $price;
        if ($_GET['Status'] == "OK") {
            $wallets_report->status = "PAY";
            $wallet->price = $wallet->price + $price;
            $wallet->save();
            session()->put('PAY_Account_charging_s', "شارژ حساب شما با موفقیت انجام شد");
        } elseif ($_GET['Status'] == "NOK") {
            $wallets_report->status = "UNPAYD";
            session()->put('PAY_Account_charging_d', "شارژ حساب شما با خطا مواجه شد");
        }
        $wallets_report->save();
        return redirect('/adminb/buy-package');
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
