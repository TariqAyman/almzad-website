<?php

/**
 * Created by GenCode.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * Class Setting
 *
 * @property int $id
 * @property string $key
 * @property string|null $value
 *
 * @package App\Models
 */
class Setting extends Model
{
    use HasFactory;
	protected $table = 'settings';
	public $timestamps = false;

	protected $fillable = [
		'key',
		'value'
	];


    use LogsActivity;

    protected static $logFillable = true;
    protected static $logName = 'settings';
    protected static $logOnlyDirty = true;


}
