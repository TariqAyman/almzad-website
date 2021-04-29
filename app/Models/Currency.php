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

/**
 * Class Currency
 *
 * @property int $id
 * @property string $name_ar
 * @property string $name_en
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|Auction[] $auctions
 * @property Collection|Wallet[] $wallets
 *
 * @package App\Models
 */
class Currency extends Model
{
    use HasFactory;
	use SoftDeletes;
	protected $table = 'currencies';

    protected $casts = [
        'status' => 'bool'
    ];

	protected $fillable = [
		'name_ar',
		'name_en',
        'symbol_ar',
        'symbol_en',
        'status'
	];

	protected $appends = [
	  'name'
    ];

	public function auctions()
	{
		return $this->hasMany(Auction::class);
	}

	public function wallets()
	{
		return $this->hasMany(Wallet::class);
	}

    public function getNameAttribute()
    {
        return $this->attributes['name_ar'];
    }
}
