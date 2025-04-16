<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = 'product_categories';
    protected $fillable = ['name', 'slug', 'description', 'image'];
    public function getImageAttribute()
    {
        return $this->image ?? 'https://placehold.co/300x300?text=' . urlencode(str_replace(' ', '+', $this->name));
    }
}