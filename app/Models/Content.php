<?php

namespace App\Models;


use Astrotomic\Translatable\Contracts\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model implements Translatable
{
    use \Astrotomic\Translatable\Translatable;
    use HasFactory;
    protected $fillable = ['category_id','name','locale'];
    public $translatedAttributes = ['body'];

    public function category()
    {
        return $this->hasOne(Category::class,'id','category_id');
    }
}
