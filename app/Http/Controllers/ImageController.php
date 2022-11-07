<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        return view('product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'product_price' => 'required',
            'product_image' => 'required|image|mimes:jpg,jpeg,png,webp',
        ]);   

        if($request->hasFile('product_image')){
            $file = $request->file('product_image');
            $extension = $file->extension();
            $final = date('YmdHis').'.'.$extension;
            $file->move(public_path('/uploads'), $final);
        }

        $product = new Product();
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_image = $final;
        
        $product->save();
        return redirect()->route('image.index');
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
        $product = Product::findOrFail($id);
        return view('product.edit',compact('product'));
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
        $product = Product::findOrFail($id);   

        $request->validate([
            'product_name' => 'required',
            'product_price' => 'required',
        ]); 


        if($request->hasFile('product_image')){
            $request->validate([
                'product_image' => 'required|image|mimes:jpg,jpeg,png,webp',
            ]);   

            if(file_exists(public_path('/uploads/'.$product->product_image))){
                unlink(public_path('/uploads/'.$product->product_image));
            }
            
            $file = $request->file('product_image');
            $extension = $file->extension();
            $final = date('YmdHis').'.'.$extension;
            $file->move(public_path('/uploads'), $final);
        }

        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_image = $final;
        
        $product->update();
        return redirect()->route('image.index');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        if(file_exists(public_path('/uploads/'.$product->product_image))){
            unlink(public_path('/uploads/'.$product->product_image));
        }
        $product->delete();
        return redirect()->route('image.index');
    }
}
