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
 * Class Review
 *
 * @property int $id
 * @property int $user_id
 * @property string $note
 * @property float $status
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property User $user
 *
 * @package App\Models
 */
class Review extends Model
{
    use HasFactory;
	use SoftDeletes;
	protected $table = 'reviews';

	protected $casts = [
		'user_id' => 'int',
		'status' => 'bool'
	];

	protected $fillable = [
		'user_id',
		'review',
		'status'
	];

    use LogsActivity;

    protected static $logFillable = true;
    protected static $logName = 'reviews';
    protected static $logOnlyDirty = true;


    public function user()
	{
		return $this->belongsTo(User::class);
	}
}
