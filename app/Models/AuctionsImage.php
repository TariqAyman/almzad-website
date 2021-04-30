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
 * Class AuctionsImage
 *
 * @property int $id
 * @property int $auction_id
 * @property string $image
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Auction $auction
 *
 * @package App\Models
 */
class AuctionsImage extends Model
{
    use HasFactory;
	use SoftDeletes;
    use LogsActivity;
    protected $table = 'auctions_images';

    protected static $logFillable = true;
    protected static $logName = 'auctions_images';
    protected static $logOnlyDirty = true;

	protected $casts = [
		'auction_id' => 'int'
	];

	protected $fillable = [
		'auction_id',
		'image'
	];

	public function auction()
	{
		return $this->belongsTo(Auction::class);
	}
}
