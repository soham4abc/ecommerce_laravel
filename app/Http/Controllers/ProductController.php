<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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



    public function product_add(Request $request)
    {
       $name = $request->name;
       $brand = $request->brand;
       $price = $request->price;
       $quantity = $request->quantity;
       $category = $request->category;
       $weight = $request->weight;       
       //$product_pic = $request->product_pic;
       $date = $request->date;
       $image = $request->image;

       $path = Storage::disk('s3')->put('Product/pictures', $image);
                   
       $token = Str::random(16);

       $createcuster = new Product;
       $createcuster->name = $name;
       $createcuster->brand = $brand;
       $createcuster->price = $price;
       $createcuster->quantity = $quantity;
       $createcuster->category = $category;
       $createcuster->weight = $weight;
       $createcuster->viewed = 0;      
       $createcuster->product_pic = $path;
       $createcuster->token = $token;
       $createcuster->save();


       return response()->json([
           'message'=>'Success',
           'token'=>$token,
           'path'=>$path          
           ]);

    }


}
