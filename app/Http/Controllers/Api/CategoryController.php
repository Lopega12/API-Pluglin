<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function contents(Request $request,$content_id)
    {
        $rules = [
            'language' => 'requires'
        ];
        $validation = Validator::make($request->all(),$rules);
        if($validation->fails()){
            return response()->json($validation->errors(),422);
        }
//        $category= Category::findOrFail($content_id);
        return new CategoryResource(Category::findOrFail($content_id));


    }
}
