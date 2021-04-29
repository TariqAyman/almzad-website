<?php

/**
 * Created by GenCode.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AuctionsUser
 *
 * @property int $id
 * @property int $user_id
 * @property int $auction_id
 * @property bool $price
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Auction $auction
 * @property User $user
 *
 * @package App\Models
 */
class AuctionsUser extends Model
{
    use HasFactory;
	use SoftDeletes;
	protected $table = 'auctions_users';

	protected $casts = [
		'user_id' => 'int',
		'auction_id' => 'int',
		'price' => 'float'
	];

	protected $fillable = [
		'user_id',
		'auction_id',
		'price'
	];

	public function auction()
	{
		return $this->belongsTo(Auction::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
