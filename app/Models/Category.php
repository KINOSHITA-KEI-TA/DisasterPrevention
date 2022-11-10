<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     'category_name', 
    //     'category_tag_id'
    // ];

    public function category_tags()
    {
        return $this->belongsTo(CategoryTag::class, 'category_tag_id');
    }
}
