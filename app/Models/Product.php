<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_en', 'title_fr', 'overview_en', 'overview_fr', 'description_en', 'description_fr', 'category_id'
    ];

    protected $with = ['productDetails', 'productPhotos', 'category'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function productDetails()
    {
        return $this->hasMany(ProductDetail::class);
    }

    public function productPhotos()
    {
        return $this->hasMany(ProductPhoto::class);
    }
}
