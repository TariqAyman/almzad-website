<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Slider extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'sliders';

    protected $casts = [
        'status' => 'bool'
    ];

    protected $fillable = [
        'name_ar',
        'name_en',
        'title_ar',
        'title_en',
        'sub_title_ar',
        'sub_title_en',
        'description_ar',
        'description_en',
        'image_ar',
        'image_en',
        'status'
    ];

    protected $appends = [
        'name', 'title', 'sub_title', 'description'
    ];

    use LogsActivity;

    protected static $logFillable = true;
    protected static $logName = 'sliders';
    protected static $logOnlyDirty = true;

    public function auctions()
    {
        return $this->hasMany(Auction::class);
    }

    public function getNameAttribute()
    {
        if (\App::getLocale() == 'ar') {
            return $this->attributes['name_ar'];

        } else {
            return $this->attributes['name_en'];
        }
    }

    public function getTitleAttribute()
    {
        if (\App::getLocale() == 'ar') {
            return $this->attributes['title_ar'];

        } else {
            return $this->attributes['title_en'];
        }

    }

    public function getSubTitleAttribute()
    {
        if (\App::getLocale() == 'ar') {
            return $this->attributes['sub_title_ar'];

        } else {
            return $this->attributes['sub_title_en'];
        }

    }

    public function getDescriptionAttribute()
    {
        if (\App::getLocale() == 'ar') {
            return $this->attributes['description_ar'];

        } else {
            return $this->attributes['description_en'];
        }

    }

    public function getImageAttribute()
    {
        if (\App::getLocale() == 'ar') {
            return $this->attributes['image_ar'];

        } else {
            return $this->attributes['image_en'];
        }
    }

    public function getMinBidAttribute()
    {
        if (auth('user')->check()){
            if ($this->attributes['min_bid'] == 0 || $this->attributes['min_bid'] == null ) return setting('min_bid');
        }

        return $this->attributes['min_bid'];
    }
}
