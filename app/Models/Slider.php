<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sliders';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'main_title_en', 'main_title_fr', 'sub_title_en', 'sub_title_fr', 'button_url', 'photo_id', 'site_id'
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
}
