<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;

    public function contents($language = null):hasMany
    {
        $relationship = $this->hasMany(Content::class)
            ->join(table: 'contents_translations', first: 'contents.id', operator: '=', second: 'contents_translations.content_id');
        if($language){
            return $relationship->where('contents_translations.locale','=',$language);
        }
        return $relationship;

    }
}
