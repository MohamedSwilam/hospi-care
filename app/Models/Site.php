<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'about', 'phone', 'email', 'location_description', 'location_url',
        'photo_id', 'catalog_file_id'
    ];

    protected $with = ['photo', 'catalog'];

    public function photo()
    {
        return $this->belongsTo(File::class, 'photo_id');
    }

    public function catalog()
    {
        return $this->belongsTo(File::class, 'catalog_file_id');
    }

    public function categories()
    {
        return $this->hasMany(Category::class);
    }

    public function sliders()
    {
        return $this->hasMany(Slider::class);
    }

    public function news()
    {
        return $this->hasMany(News::class);
    }

    public function testimonials()
    {
        return $this->hasMany(Testimonial::class);
    }
}
