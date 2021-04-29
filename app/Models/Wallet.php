<?php

/**
 * Created by GenCode.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Wallet
 * 
 * @property int $id
 * @property int $user_id
 * @property int|null $auction_id
 * @property int $currency_id
 * @property float $in
 * @property float $out
 * @property float $hold
 * @property float $balance
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Auction|null $auction
 * @property Currency $currency
 * @property User $user
 *
 * @package App\Models
 */
class Wallet extends Model
{
    use HasFactory;
	protected $table = 'wallets';

	protected $casts = [
		'user_id' => 'int',
		'auction_id' => 'int',
		'currency_id' => 'int',
		'in' => 'float',
		'out' => 'float',
		'hold' => 'float',
		'balance' => 'float'
	];

	protected $fillable = [
		'user_id',
		'auction_id',
		'currency_id',
		'in',
		'out',
		'hold',
		'balance'
	];

	public function auction()
	{
		return $this->belongsTo(Auction::class);
	}

	public function currency()
	{
		return $this->belongsTo(Currency::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
