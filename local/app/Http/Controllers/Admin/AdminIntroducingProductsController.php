<?php

namespace App\Http\Controllers\Admin;

use App\IntroducingProduct;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminIntroducingProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=IntroducingProduct::all();
        return view('admin.introducingproduct.index',compact(['products']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.introducingproduct.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product=new IntroducingProduct();
        $product->name=$request->input('name');
        $product->description=$request->input('description');
        if($file = $request->file('image')){
            $name = time() . $file->getClientOriginalName() ;
            $file->move('images/introducingproduct', $name);
            $product->image = $name;
        }
        $product->save();

        session()->put('insert-introducingproduct', 'success');
        return redirect('admin/IntroducingProducts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=IntroducingProduct::findorfail($id);
        return view('admin.introducingproduct.show',compact(['product']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product=IntroducingProduct::findorfail($id);
        return view('admin.introducingproduct.edit',compact(['product']));
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
        $product=IntroducingProduct::findorfail($id);
        $product->name=$request->input('name');
        $product->description=$request->input('description');
        if($file = $request->file('image')){
            $name = time() . $file->getClientOriginalName() ;
            $file->move('images/introducingproduct', $name);
            $product->image = $name;
        }
        $product->save();

        session()->put('edit-introducingproduct', 'success');
        return redirect('admin/IntroducingProducts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product=IntroducingProduct::findorfail($id);
        $product->delete();
        session()->put('delete-introducingproduct', 'success');
        return redirect('admin/IntroducingProducts');
    }
}
