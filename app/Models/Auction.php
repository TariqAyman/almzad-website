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
 * Class Auction
 *
 * @property int $id
 * @property int $currency_id
 * @property int $type_id
 * @property int $category_id
 * @property int $user_id
 * @property string $name_ar
 * @property string $name_en
 * @property string $description_ar
 * @property string $description_en
 * @property string $slug_ar
 * @property string $slug_en
 * @property bool $status
 * @property float $start_form
 * @property float $price
 * @property Carbon $start_date
 * @property Carbon $end_date
 * @property bool $shipping
 * @property bool $shippingFree
 * @property bool $multi_auction
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Category $category
 * @property Currency $currency
 * @property Type $type
 * @property User $user
 * @property Collection|AuctionsImage[] $auctionsImages
 * @property Collection|User[] $users
 * @property Collection|Wallet[] $wallets
 *
 * @package App\Models
 */
class Auction extends Model
{
    use HasFactory;
	use SoftDeletes;
	protected $table = 'auctions';

	protected $casts = [
		'currency_id' => 'int',
		'type_id' => 'int',
		'category_id' => 'int',
		'user_id' => 'int',
		'status' => 'bool',
		'start_form' => 'float',
		'price' => 'float',
		'shipping' => 'bool',
		'shippingFree' => 'bool',
		'multi_auction' => 'bool'
	];

	protected $dates = [
		'start_date',
		'end_date'
	];

	protected $fillable = [
		'currency_id',
		'type_id',
		'category_id',
		'user_id',
		'name_ar',
		'name_en',
		'description_ar',
		'description_en',
		'slug_ar',
		'slug_en',
		'status',
		'start_form',
		'price',
		'start_date',
		'end_date',
		'shipping',
		'shippingFree',
		'multi_auction'
	];

	protected $appends = [
	    'image',
        'name',
        'slug',
        'is_expired'
    ];

	public function category()
	{
		return $this->belongsTo(Category::class);
	}

	public function currency()
	{
		return $this->belongsTo(Currency::class);
	}

	public function type()
	{
		return $this->belongsTo(Type::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function auctionsImages()
	{
		return $this->hasMany(AuctionsImage::class);
	}

	public function users()
	{
		return $this->belongsToMany(User::class, 'auctions_users')->withTimestamps();
	}

	public function wallets()
	{
		return $this->hasMany(Wallet::class);
	}

    public function getImageAttribute()
    {
        return $this->auctionsImages()->first();
	}

    public function getNameAttribute()
    {
        return $this->attributes['name_ar'];
	}

    public function getSlugAttribute()
    {
        return $this->attributes['slug_ar'];
    }

    public function getIsExpiredAttribute()
    {
        return Carbon::parse($this->attributes['end_date'])->isPast();
    }
}
