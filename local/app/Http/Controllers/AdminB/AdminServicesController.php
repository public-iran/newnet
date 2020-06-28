<?php

namespace App\Http\Controllers\AdminB;

use App\Service;
use App\Sgallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceItems=Service::orderby('id','desc')->get();
//        ,compact('productItems')
        return view('adminbizness.services.index',compact('serviceItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminbizness.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        //        ****************************************** Start Product save **************************************************
        $categoryIdArray = $request->input('checkbox');
        if ($categoryIdArray != null)
            $categoryId = implode('$$', $categoryIdArray);
        else
            $categoryId = "-1";

        $service = new Service();

        if ($request->file('imgFile') != null) {
            $new_img_name = time() . '.' . $request->file('imgFile')->getClientOriginalExtension();
            $new_img_path = $request->file('imgFile')->move('images' . '/' . Auth::id(), $new_img_name);
            $service->imgName = $new_img_name;
            $service->imgPath = $new_img_path;
        } else {
            $service->imgName = 'default.jpg';
        }

        if ($request->slug == "") {
            $temp = str_replace(" ", "-", $request->title);
            $service->slug = $temp;
        } else {
            $service->slug = $request->slug;
        }

        $service->title = $request->input('title');
        $service->shortContent = $request->input('shortContent');
        $service->Content = $request->input('content');
        $service->seoTitle = $request->input('seoTitle');
        $service->seoContent = $request->input('seoContent');
        $service->tags = $request->input('tags');

        $service->status = $request->input('status');
        $service->state = $request->input('stateName');
        $service->stateId = $request->input('state');
        $service->city = $request->input('cityName');
        $service->cityId = $request->input('city');
        $service->address = $request->input('address');
        $service->phone = $request->input('phone');
        $service->mobile = $request->input('mobile');

        $service->offPercent = $request->input('offPercent');
        $service->endDate = $request->input('endDate');

        $service->timeStartA = $request->input('timeStartA');
        $service->timeEndA = $request->input('timeEndA');
        $service->timeStartB = $request->input('timeStartB');
        $service->timeEndB = $request->input('timeEndB');

        $service->category_id = $categoryId;

        $service->save();
        //        ****************************************** End Product save **************************************************
        //        ****************************************** Start For Gallery **************************************************
        $photos = $request->file('photo');
        if ($photos != null) {
            $lastService = Service::orderBy('created_at', 'desc')->first();
            foreach ($photos as $key => $item) {
                $galery = new Sgallery();
                $galery->userId = Auth::id();
                $galery->serviceId = $lastService->id;
                $new_img_name = time() . '.' . $request->file('photo')[$key]->getClientOriginalExtension();
                $new_img_path = $request->file('photo')[$key]->move('images' . '/' . Auth::id(), $new_img_name);
                $galery->imgName = $new_img_name;
                $galery->imgPath = $new_img_path;
                $galery->save();
            }
        }
        //        ****************************************** End For Gallery **************************************************

        return redirect()->back();
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

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
