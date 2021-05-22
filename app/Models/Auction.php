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
use Illuminate\Support\Str;
use Spatie\Activitylog\Traits\LogsActivity;

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
 * @property int $start_from
 * @property int $price
 * @property Carbon $start_date
 * @property Carbon $end_date
 * @property bool $shipping
 * @property bool $shipping_free
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

    use LogsActivity;

    protected static $logFillable = true;
    protected static $logName = 'auctions';
    protected static $logOnlyDirty = true;

    protected $casts = [
        //        'currency_id' => 'int',
        'type_id' => 'int',
        'category_id' => 'int',
        'user_id' => 'int',
        'status' => 'bool',
        'start_from' => 'int',
        'purchase_price' => 'int',
        'shipping' => 'bool',
        'shipping_free' => 'bool',
        'multi_auction' => 'bool',
        'sale_amount' => 'float'
    ];

    protected $dates = [
        'start_date',
        'end_date'
    ];

    protected $fillable = [
        //        'currency_id',
        'type_id',
        'category_id',
        'user_id',
        'name_ar',
        'name_en',
        'description_ar',
        'description_en',
        'conditions_ar',
        'conditions_en',
        'shipping_conditions_en',
        'shipping_conditions_ar',
        'slug_ar',
        'slug_en',
        'status',
        'start_from',
        'purchase_price',
        'start_date',
        'end_date',
        'shipping',
        'shipping_free',
        'multi_auction',
        'last_bid',
        'is_sold',
        'sold_to',
        'sale_amount'
    ];

    protected $appends = [
        'image',
        'name',
        'slug',
        'is_expired',
        'expired_in',
        'description',
        'conditions',
        'highest_price',
        'shipping_conditions',
        'hold_balance_wallet',
        'highest_purchase_price'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

//    public function currency()
//    {
//        return $this->belongsTo(Currency::class);
//    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function soldTo()
    {
        return $this->belongsTo(User::class, 'sold_to');
    }

    public function auctionsImages()
    {
        return $this->hasMany(AuctionsImage::class);
    }

    public function auctionsUsers()
    {
        return $this->hasMany(AuctionsUser::class)->latest();
    }

    public function lastBid()
    {
        return $this->belongsTo(User::class);
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
        return $this->auctionsImages()->first() ?? null;
    }

    public function getNameAttribute()
    {
        if (\App::getLocale() == 'ar') {
            return $this->attributes['name_ar'];

        } else {
            return $this->attributes['name_en'];
        }
    }

    public function getSlugAttribute()
    {
        if (\App::getLocale() == 'ar') {
            return $this->attributes['slug_ar'];

        } else {
            return $this->attributes['slug_en'];
        }
    }

    public function getDescriptionAttribute()
    {
        if (\App::getLocale() == 'ar') {
            return $this->attributes['description_ar'];

        } else {
            return $this->attributes['description_en'];

        }
    }

    public function getConditionsAttribute()
    {
        if (\App::getLocale() == 'ar') {
            return $this->attributes['conditions_ar'];

        } else {
            return $this->attributes['conditions_en'];

        }
    }

    public function getShippingConditionsAttribute()
    {
        if (\App::getLocale() == 'ar') {
            return $this->attributes['shipping_conditions_en'];

        } else {
            return $this->attributes['shipping_conditions_ar'];
        }
    }

    public function getIsExpiredAttribute()
    {
        return Carbon::parse($this->attributes['end_date'])->isPast();
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->latest();
    }

    public function getExpiredInAttribute()
    {
        $expiredIn = Carbon::parse($this->attributes['end_date'])->diff();

        $days = str_pad($expiredIn->days, 2, '0', STR_PAD_LEFT);
        $hours = str_pad($expiredIn->h, 2, '0', STR_PAD_LEFT);
        $minutes = str_pad($expiredIn->m, 2, '0', STR_PAD_LEFT);
        $seconds = str_pad($expiredIn->s, 2, '0', STR_PAD_LEFT);

        return [
            'days' => $days,
            'days_split' => str_split($days),

            'hours' => $hours,
            'hours_split' => str_split($hours),

            'minutes' => $minutes,
            'minutes_split' => str_split($minutes),

            'seconds' => $seconds,
            'seconds_split' => str_split($seconds),
        ];
    }

    public function getHighestPriceAttribute()
    {
        return $this->auctionsUsers()->max('price') ?? $this->attributes['start_from'];
    }

    public function allowBid(): bool
    {
        if ($this->attributes['multi_auction']) return true;

        return !$this->auctionsUsers()->where('user_id', auth('user')->user()->id)->exists();
    }

    public function getHoldBalanceWalletAttribute()
    {
        $hold_balance_wallet = setting('hold_balance_wallet', 20);

        return (($this->highest_price * $hold_balance_wallet) / 100);
    }


    public function getHighestPurchasePriceAttribute()
    {
        if ($this->purchase_price){
            return (($auction->highest_price ?? $this->start_from) > $this->purchase_price ? ($this->highest_price ?? $this->start_from) : $this->purchase_price);
        }
        return  0;
    }
}
