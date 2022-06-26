<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url', 'file_name', 'file_extension'
    ];

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
