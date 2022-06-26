<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'categories';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name_en', 'name_fr', 'site_id', 'photo_id'
    ];

    protected $with = ['photo', 'site'];

    public function photo()
    {
        return $this->belongsTo(File::class, 'photo_id');
    }

    public function site()
    {
        return $this->belongsTo(Site::class, 'site_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
