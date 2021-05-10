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
 * Class Type
 *
 * @property int $id
 * @property string $name_ar
 * @property string $name_en
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|Auction[] $auctions
 *
 * @package App\Models
 */
class Type extends Model
{
    use HasFactory;
	use SoftDeletes;
	protected $table = 'types';

	protected $fillable = [
		'name_ar',
		'name_en',
        'status'
	];

    protected $casts = [
        'status' => 'bool'
    ];

	protected $appends =[
	    'name'
    ];


    use LogsActivity;

    protected static $logFillable = true;
    protected static $logName = 'types';
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
}
