<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ContentResource;
use App\Models\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ContentController extends Controller
{
    public function show(Request $request,int $id)
    {
        $rules = [
            'language' => 'required',
        ];
        $validation = Validator::make($request->all(),$rules);
        if($validation->fails()){
            return response()->json($validation->errors(),422);
        }
        $content= Content::findOrFail($id);

//        if($content->hasTranslation($request->get('language'))){
//            return response()->json(new ContentResource($content),200);
//        }
        return response()->json(new ContentResource($content),200);
    }
}
