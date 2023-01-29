<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $request = Http::get('http://52.47.124.82/config');
        if($request->ok()){
            $categories_list = $request->collect('categories');
            $categories_list->map(function($item,$key){
                Category::updateOrCreate([
                    'name' => $item
                ]);
            });
        }

    }
}
