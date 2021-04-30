<?php

/**
 * Created by GenCode.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * Class Category
 *
 * @property int $id
 * @property string $name_ar
 * @property string $name_en
 * @property string $slug_ar
 * @property string $slug_en
 * @property bool $status
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|Auction[] $auctions
 *
 * @package App\Models
 */
class Category extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categories';

    protected $casts = [
        'status' => 'bool'
    ];

    protected $fillable = [
        'name_ar',
        'name_en',
        'slug_ar',
        'slug_en',
        'status'
    ];

    protected $appends = [
        'name', 'slug'
    ];

    use LogsActivity;

    protected static $logFillable = true;
    protected static $logName = 'categories';
    protected static $logOnlyDirty = true;

    public function auctions()
    {
        return $this->hasMany(Auction::class);
    }

    public function getNameAttribute()
    {
        return $this->attributes['name_ar'];
    }

    public function getSlugAttribute()
    {
        return $this->attributes['slug_ar'];
    }
}
