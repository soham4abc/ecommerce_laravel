<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendors;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class VendorsController extends Controller
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

    public function vendors_api(Request $request)
    {
       $name = $request->name;
       $mobile = $request->mobile;
       $email = $request->email;
       $password = $request->password;
       $address = $request->address;
       $town = $request->town;
       $state = $request->state;
       $country = $request->country;
       $pin = $request->pin;       
       $device_type = $request->device_type;
      
       
       $mobileno = Vendors::where('mobile','=',$mobile)->get();
      
       if(sizeof($mobileno)>0){
        return response('{"message":"Mobile no. already exists"}');
       }
       
       $emailid=Vendors::where('mobile','=',$email)->get();

       if(sizeof($emailid)>0){
           return response('{"message":"Mobile no. already exists"}');
       }

       $token = Str::random(16);

       $createcuster = new Vendors;
       $createcuster->name = $name;
       $createcuster->mobile = $mobile;
       $createcuster->email = $email;
       $createcuster->password = $password;
       $createcuster->address = $address;
       $createcuster->town = $town;
       $createcuster->state = $state;
       $createcuster->country = $country;
       $createcuster->pin = $pin;
       $createcuster->device_type = $device_type;
       $createcuster->token = $token;
       $createcuster->save();


       return response()->json([
           'message'=>'Success',
           'token'=>$token           
           ]);

    }
}
