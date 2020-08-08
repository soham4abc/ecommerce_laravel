<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vendors;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


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
       $image = $request->image;

       $path = Storage::disk('s3')->put('vendors/profile_pic', $image);
      
       
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
       $createcuster->profile_pic = $path;
       $createcuster->token = $token;
       $createcuster->save();


       return response()->json([
           'message'=>'Success',
           'token'=>$token,
           'path'=>$path          
           ]);

    }


    public function download_api(Request $request)
    {
        $file = Storage::disk('s3')->get('vendors/profile_pic/' . 'mGfSrwKbxAXSyveRgEtUBsF5mIcpYf8ME1giDbEb.jpeg' );
        //return Response::download($file ,'s3://ecomimagesas/vendors/profile_pic/mGfSrwKbxAXSyveRgEtUBsF5mIcpYf8ME1giDbEb.jpeg');
        //print_r("download works!");

    }

    public function update_api(Request $request)
    {

    
    $address = $request->address;
    $town = $request->town;
    $state = $request->state;
    $country = $request->country;
    $pin = $request->pin;    
    $uemail=$request->uemail;
    $vtoken=$request->vtoken;

    $uemail=DB::table('users')-> where([
        ['email', '=', $uemail],
        
    ])->get();

    $vendor_data=DB::table('vendors')-> where([
        ['token', '=', $vtoken],
        
    ])->get();

    if(count($uemail) == 0){
        return response('{"message":"Invalid token!"}');
    }

    if(count($vendor_data)>0){

    $vendor = vendors::find($vendor_data[0]->id);    
    $vendor->address = $address;
    $vendor->town = $town;
    $vendor->state = $state;
    $vendor->country = $country;
    $vendor->pin = $pin;
    
    
    $vendor->save();
    }

    
        return response()->json(['message'=>'Success']);
    
        

    }

    public function delete_api(Request $request)
    {

    
    
    $uemail=$request->uemail;
    $vtoken=$request->vtoken;

    $uemail=DB::table('users')-> where([
        ['email', '=', $uemail],
        
    ])->get();

    $vendor_data=DB::table('vendors')-> where([
        ['token', '=', $vtoken],
        
    ])->get();

    if(count($uemail) == 0){
        return response('{"message":"Invalid token!"}');
    }

    if(count($vendor_data)>0){

        $vendor = vendors::find($vendor_data[0]->id);       
        $vendor->delete();
    }    
        return response()->json(['message'=>'Success']);
    
        

    }


}
