<?php

namespace App\Http\Controllers\AdminB;

use App\Http\Requests\ProductRequest;
use App\Product;
use App\Gallery;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        return redirect()->back();
        $productItems=Product::orderby('id','desc')->get();
        return view('adminbizness.product.index',compact('productItems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminbizness.product.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
//        dd($request->all());
        //        ****************************************** Start Product save **************************************************
        $categoryIdArray = $request->input('checkbox');
        if ($categoryIdArray != null)
            $categoryId = implode('$$', $categoryIdArray);
        else
            $categoryId = "-1";

        $featureName = $request->input('feature');
        $featureValue = $request->input('featureValue');

        if ($featureName != null && $featureValue != null) {
            foreach ($featureName as $key => $featureItem) {
                $array[] = $featureItem . '?@' . $featureValue[$key];
            }
            $feature = implode('@@', $array);
        }
        $product = new Product();

        if ($request->file('imgFile') != null) {
            $new_img_name = time() . '.' . $request->file('imgFile')->getClientOriginalExtension();
            $new_img_path = $request->file('imgFile')->move('images' . '/' . Auth::id(), $new_img_name);
            $product->imgName = $new_img_name;
            $product->imgPath = $new_img_path;
        } else {
            $product->imgName = 'default.jpg';
        }

        if ($request->slug == "") {
            $temp = str_replace(" ", "-", $request->title);
            $product->slug = $temp;
        } else {
            $product->slug = $request->slug;
        }

        if ($request->file('vidFile') != null) {
            $new_vid_name = time() . '.' . $request->file('vidFile')->getClientOriginalExtension();
            $new_vid_path = $request->file('vidFile')->move('videos' . '/' . Auth::id(), $new_vid_name);
            $product->videoName = $new_vid_name;
            $product->videoPath = $new_vid_path;
        } else {
            $product->videoName = '-1';
        }

        $product->title = $request->input('title');
        $product->shortContent = $request->input('shortContent');
        $product->Content = $request->input('content');
        $product->seoTitle = $request->input('seoTitle');
        $product->seoContent = $request->input('seoContent');
        $product->tags = $request->input('tags');
        $product->status = $request->input('status');
        $product->categoryId = $categoryId;
        $product->mainPrice = $request->input('mainPrice');
        $product->offPrice = $request->input('offPrice');
        $product->lucre = $request->input('lucre');
        $product->feature = $feature;

        $product->save();
        //        ****************************************** End Product save **************************************************
        //        ****************************************** Start For Gallery **************************************************
        $photos = $request->file('photo');
        if ($photos != null) {
            $lastproduct = Product::orderBy('created_at', 'desc')->first();
            foreach ($photos as $key => $item) {
                $galery = new Gallery();
                $galery->userId = Auth::id();
                $galery->productId = $lastproduct->id;
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
