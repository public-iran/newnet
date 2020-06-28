<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Artisan;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/printp/{id}', function ($id) {
    $pack = App\Package::findorfail($id);
    $user = App\User::findorfail(Auth::id());
    return view('printp', compact(['pack']));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//************************************* start Front Site **********************************************
Route::resource('/product', 'Front\FrontProductsController');
Route::resource('/basket', 'Front\FrontBasketesController');
Route::resource('/service', 'Front\FrontServicesController');
Route::delete('/basket/delete/{id}', 'Front\FrontAjaxsController@deleteItem')->name('ajax.delete');
Route::post('/basket/minus', 'Front\FrontAjaxsController@minusProductCount')->name('ajax.minus');
Route::post('/basket/add', 'Front\FrontAjaxsController@addProductCount')->name('ajax.add');
Route::post('/commentStore', 'Front\FrontAjaxsController@commentStore')->name('ajax.commentStore');

Route::get('admin/payment', 'AdminB\AdminPaymentController@send')->name('payment.send');
Route::get('admin/paymentBack', 'AdminB\AdminPaymentController@back')->name('payment.paymentBack');

//************************************* start Front Site **********************************************

Route::group(['middleware' => 'admin'], function (){

    Route::resource('admin/users', 'Admin\AdminUserController');
    Route::resource('admin/dashboard', 'Admin\AdminDashboardController');
    Route::resource('admin/education', 'Admin\AdminEducationController');
    Route::post('admin/education/create', 'Admin\AdminEducationController@store')->name('education.store');
    Route::resource('admin/level', 'Admin\AdminLevelController');
    Route::resource('admin/surface', 'Admin\AdminSurfaceController');
//    Route::resource('admin/file', 'Admin\AdminFileController');
    Route::get('admin/training', 'Admin\AdminTrainingController@index')->name('training.index');
    Route::post('admin/store', 'Admin\AdminTrainingController@store')->name('training.store');
    Route::post('admin/insert_listtargets', 'Admin\AdminTrainingController@insert_listtargets')->name('training.insert_listtargets');
    Route::post('admin/insert_goldenlistpeoples', 'Admin\AdminTrainingController@insert_goldenlistpeoples')->name('training.insert_goldenlistpeoples');
    Route::resource('admin/test', 'Admin\AdminTestController');
    Route::resource('admin/Topseller', 'Admin\AdminTopsellerController');
    Route::resource('admin/profile', 'Admin\AdminProfileController');
    Route::resource('admin/club', 'Admin\AdminClubController');
    Route::post('admin/create', 'Admin\AdminTestController@store')->name('test.store');
    Route::post('admin/education', 'Admin\AdminTestController@show_index');
    Route::post('admin/test', 'Admin\AdminTestController@create_test');
    Route::post('admin/show_index', 'Admin\AdminTestController@show_index')->name('test.show_index');
    Route::get('admin/card', 'Admin\AdminCardController@index')->name('card.index');

    Route::resource('admin/rules', 'Admin\AdminRulesController');
    Route::get('admin/rule', 'Admin\AdminRulesController@index_user')->name('rules.index_user');
    Route::resource('admin/description', 'Admin\AdminDescriptionsController');
    Route::resource('admin/photos', 'Admin\AdminPhotosController');
    Route::resource('admin/IntroducingProducts', 'Admin\AdminIntroducingProductsController');
    Route::resource('admin/videos', 'Admin\AdminVideosController');
    Route::resource('admin/sounds', 'Admin\AdminSoundsController');
    Route::resource('admin/exam', 'Admin\AdminExamController');
    Route::resource('admin/listpeople', 'Admin\AdminListpeopleController');
    Route::resource('admin/adminlist', 'Admin\AdminAdminController');
    Route::resource('admin/userrequest', 'Admin\AdminUserrequestsController');
    Route::resource('admin/listtargets', 'Admin\AdminListtargetsController');
    Route::resource('admin/presences', 'Admin\AdminPresencesController');
    Route::resource('admin/meetings', 'Admin\AdminMeetingsController');
    Route::resource('admin/goldenlist', 'Admin\AdminGoldenlistpeoplesController');
    Route::resource('admin/orgchart', 'Admin\AdminOrgchartController');


    /***************** AdminB *****************/
    Route::resource('adminb/dashboardb', 'AdminB\AdmindashboardsController');
    Route::resource('adminb/positioninformations', 'AdminB\AdminPositioninformationsController');

    Route::post('Account_charging_wallet', 'AdminB\AdminWalletsController@Account_charging')->name('Account_charging_wallet');
    Route::get('/adminb/wallet/Account_charging/payment-verify', 'AdminB\AdminWalletsController@payment_verify_Account_charging');
    Route::get('/adminb/wallet/payment_verify_buy_package/payment-verify', 'AdminB\AdminWalletsController@payment_verify_buy_package');
    Route::resource('adminb/wallet', 'AdminB\AdminWalletsController');
    Route::resource('adminb/showpositions', 'AdminB\AdminshowpositionsController');
    Route::post('Account_charging', 'AdminB\AdminBuypackageController@Account_charging')->name('Account_charging');
    Route::get('/adminb/buy-package/Account_charging/payment-verify', 'AdminB\AdminBuypackageController@payment_verify_Account_charging');
    Route::get('/adminb/buy-package/payment_verify_buy_package/payment-verify', 'AdminB\AdminBuypackageController@payment_verify_buy_package');
    Route::resource('adminb/buy-package', 'AdminB\AdminBuypackageController');
    Route::resource('adminb/users', 'AdminB\AdminUsersController');


    Route::get('adminb/calculation', 'AdminB\AdminCalculationController@calculation');



    //************************************* Admin Site **********************************************
    Route::resource('adminb/products', 'AdminB\AdminProductsController');
    Route::resource('adminb/services', 'AdminB\AdminServicesController');
    Route::resource('adminb/profile', 'AdminB\AdminProfilesController');
    //************************************* Admin Site **********************************************

    /***************** AdminB *****************/


    /***************** ajax B *****************/
    Route::post('/checkbag','AjaxController@checkbag')->name('checkbag');
    Route::post('/number_format_price','AjaxControllerB@number_format_price')->name('number_format_price');
    Route::post('/check_token_wallet','AjaxControllerB@check_token_wallet')->name('check_token_wallet');
    Route::post('/check_pass_wallet','AjaxControllerB@check_pass_wallet')->name('check_pass_wallet');
    Route::post('/check_mobile_wallet','AjaxControllerB@check_mobile_wallet')->name('check_mobile_wallet');
    Route::post('/check_code_wallet','AjaxControllerB@check_code_wallet')->name('check_code_wallet');
    Route::post('/check_answer_wallet','AjaxControllerB@check_answer_wallet')->name('check_answer_wallet');
    Route::post('/send_price_wallet','AjaxControllerB@send_price_wallet')->name('send_price_wallet');
    Route::post('/check_return_code_wallet','AjaxControllerB@check_return_code_wallet')->name('check_return_code_wallet');
    Route::post('/refresh_price_wallet','AjaxController@refresh_price_wallet')->name('refresh_price_wallet');
    Route::post('/Money_transfer_wallet','AjaxControllerB@Money_transfer_wallet')->name('Money_transfer_wallet');
    Route::post('/selfupdateuser','AjaxControllerB@selfupdateuser')->name('selfupdateuser');;
    Route::post('/uploadimageprofile','AjaxControllerB@uploadimageprofile')->name('uploadimageprofile');;
    Route::post('/Change_status_user','AjaxControllerB@Change_status_user')->name('Change_status_user');;
    /***************** ajax B *****************/


//    ----------------------Ajax---------------------
    Route::post('/getlar','AjaxController@get_left_and_right');
    Route::post('/getusercode','AjaxController@getusercode');
    Route::get('admin/getmsg','AjaxController@index')->name('getmsg');
    Route::post('admin/getmsg','AjaxController@store')->name('getmsg');
    Route::post('/test_status','AjaxController@test_status')->name('test_status');
    Route::post('/delete_test','AjaxController@delete_test')->name('delete_test');
    Route::post('/Call_search','AjaxController@Call_search')->name('Call_search');
    Route::post('/users_search','AjaxController@users_search')->name('users_search');
    Route::post('/delete_users','AjaxController@delete_users')->name('delete_users');
    Route::post('/delete_educations','AjaxController@delete_educations')->name('delete_educations');
    Route::post('/education_search','AjaxController@education_search')->name('education_search');
    Route::post('/writer_users','AjaxController@writer_users')->name('writer_users');
    Route::post('/delete_rule','AjaxController@delete_rule')->name('delete_rule');
    Route::post('/delete_description','AjaxController@delete_description')->name('delete_description');
    Route::post('/status_photo','AjaxController@status_photo')->name('status_photo');
    Route::post('/status_video','AjaxController@status_video')->name('status_video');
    Route::post('/status_sound','AjaxController@status_sound')->name('status_sound');
    Route::post('/remove_educations','AjaxController@remove_educations')->name('remove_educations');
    Route::post('/search_listpeople','AjaxController@search_listpeople')->name('search_listpeople');
    Route::post('/user_request_user','AjaxController@user_request_user')->name('user_request_user');
    Route::post('/user_request_confirm','AjaxController@user_request_confirm')->name('user_request_confirm');
    Route::post('/status_new_user','AjaxController@status_new_user')->name('status_new_user');
    Route::post('/delete_meeting','AjaxController@delete_meeting')->name('delete_meeting');


//    ----------------------Ajax---------------------


//    Route::get('admin/dashboard', 'Admin\AdminDashboardUserController@index')->name('dashboard.index');

});

Route::get('logout', 'Auth\LoginController@logout')->name('logout');
Route::get('verifire', 'User\UserRegisterController@verifire')->name('verifire');
Route::post('verifire_code', 'User\UserRegisterController@verifire_code')->name('verifire_code');
Route::post('password/reset', 'User\UserRegisterController@verifire_password')->name('verifire_password');
Route::get('/password/verify', 'User\UserRegisterController@verifire_code_password')->name('verifire_code_password');
Route::get('password/pass', 'User\UserRegisterController@verifire_code_password_code')->name('verifire_code_password_code');
Route::post('password/pass', 'User\UserRegisterController@verifire_code_password_code')->name('verifire_code_password_code');
Route::post('reset_password', 'User\UserRegisterController@reset_password')->name('reset_password');
Route::resource('register', 'User\UserRegisterController');




//------------------------------Ajax----------------------------
Route::post('/Again_code','AjaxController@Again_code')->name('Again_code');


/********** Run php artisan in Host **********/
Route::get('/rs/{namecontroller}', 'phpArtisan@rs'); // ساخت کنترلر ریسورس در مسیر اصلی
// example : http://site-url.com/rs/name

Route::get('/rsp/{namecontroller}/{path}', 'phpArtisan@rsp'); // ساخت کنترلر ریسورس در پوشه دلخواه
// example : http://site-url.com/rsp/name/path

Route::get('/ctrl/{namecontroller}', 'phpArtisan@ctrl'); // ساخت کنترلر در مسیر اصلی
// example : http://site-url.com/ctrl/name

Route::get('/rq/{namecontroller}', 'phpArtisan@rq'); // ساخت رکوئست در مسیر اصلی
// example : http://site-url.com/rq/name

Route::get('/ctrlp/{namecontroller}/{path}', 'phpArtisan@ctrlp'); // ساخت کنترلر در پوشه دلخواه
// example : http://site-url.com/ctrlp/name/path

Route::get('/mdl/{namecontroller}', 'phpArtisan@mdl'); //ساخت مدل
// example : http://site-url.com/mdl/name

Route::get('/mg/{namecontroller}', 'phpArtisan@mg'); // ساخت مایگریشن
// example : http://site-url.com/mg/name

Route::get('/runmg', 'phpArtisan@runmg'); // اجرای مایگریشن
// example : http://site-url.com/runmg
/********** Run php artisan in Host **********/

Route::get('order-verify', 'OrderController@verify')->name('order.verify');
Route::get('payment-verify', 'PaymentController@verify')->name('payment.verify');



Route::get('/25608f3e9f4206a6dc0b7b90c66f0623', 'AdminB\AdminZero_price_ceilingController@Zero_price_ceiling');
Route::get('/25608f3e9f4206a6dc0b7b90c6666666', 'AdminB\AdminZero_price_ceilingController@delete_user_no_package');
Route::get('/store', 'AdminB\AdminZero_price_ceilingController@store');


Route::get('/adminb/j', function () {
    $users=App\Tree::all();
    return view('j',compact(['users']));
});
