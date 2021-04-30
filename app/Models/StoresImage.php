<?php

/**
 * Created by GenCode.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * Class StoresImage
 *
 * @property int $id
 * @property int $store_id
 * @property string $image
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Store $store
 *
 * @package App\Models
 */
class StoresImage extends Model
{
    use HasFactory;
	use SoftDeletes;
	protected $table = 'stores_images';

	protected $casts = [
		'store_id' => 'int'
	];

	protected $fillable = [
		'store_id',
		'image'
	];


    use LogsActivity;

    protected static $logFillable = true;
    protected static $logName = 'stores_images';
    protected static $logOnlyDirty = true;


    public function store()
	{
		return $this->belongsTo(Store::class);
	}
}
