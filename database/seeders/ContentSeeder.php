<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Content;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //        $request = Http::get('http://52.47.124.82/config');
//        if($request->ok()){
//            $categories_list = $request->collect('categories');
//            $languages = $request->collect('languages');
        $content_request = Http::get("http://52.47.124.82/contents");
        if($content_request->ok()){
            $content_list = $content_request->collect();
            $content_list->map(function($item,$key){
                $content = Content::updateOrCreate([
                    "category_id"=> Category::where('name','=',$item['category'])->first()->id,
                    "name" => $item['name'],
                    "locale" => $item['language']
                ]);
                $content->translateOrNew($item['language'])->body= $item['body'];
                $translations = collect($item['translations']);

                $translations->map(function($body,$key) use($content){
                    $content->translateOrNew($key)->body= $body;
                    $content->save();
                });
            });
        }
    }
}
