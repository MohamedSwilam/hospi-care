<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'news';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title_en', 'title_fr', 'details_en', 'details_fr', 'photo_id', 'site_id'
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
