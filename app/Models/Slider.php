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
        'title_ar' ,
        'title_en' ,
        'sub_title_ar' ,
        'sub_title_en' ,
        'description_ar' ,
        'description_en' ,
        'status'
    ];

    protected $appends = [
        'name', 'title' ,'sub_title','description'
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
        return $this->attributes['name_ar'];
    }

    public function getTitleAttribute()
    {
        return $this->attributes['title_ar'];
    }

    public function getSubTitleAttribute()
    {
        return $this->attributes['sub_title_ar'];
    }

    public function getDescriptionAttribute()
    {
        return $this->attributes['description_ar'];
    }
}
