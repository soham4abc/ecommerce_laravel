<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\category;
use Illuminate\Support\Str;

class CategoriesController extends Controller
{
    public function categories_api(Request $request)
    {

        $category_SKU = $request->category_SKU;
        $category = $request->category;       
       
        

        $token = Str::random(16);

        $createcuster = new category;
        $createcuster->category_SKU = $category_SKU;
        $createcuster->category = $category;
       
        
        $createcuster->category_token = $token;
        $createcuster->save();

        return response()->json(['message'=>'Success', 'token'=>$token]);
    }
}
