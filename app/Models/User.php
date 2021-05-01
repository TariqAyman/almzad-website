<?php

/**
 * Created by GenCode.
 */

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class User
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $username
 * @property string $email
 * @property string|null $phone_number
 * @property string|null $profile_photo
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property bool $status
 * @property string|null $remember_token
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|Auction[] $auctions
 * @property Collection|ContactU[] $contact_us
 * @property Collection|Review[] $reviews
 * @property Collection|Store[] $stores
 * @property Collection|Wallet[] $wallets
 *
 * @package App\Models
 */
class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, LogsActivity, ThrottlesLogins;

    use HasFactory;
	use SoftDeletes;
	protected $table = 'users';

	protected $casts = [
		'status' => 'bool'
	];

	protected $dates = [
		'email_verified_at'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'first_name',
		'last_name',
		'username',
        'address',
		'email',
		'phone_number',
		'profile_photo',
		'email_verified_at',
		'password',
		'status',
		'remember_token'
	];

	protected $appends = [
	    'name'
    ];


    protected static $logFillable = true;
    protected static $logName = 'users';
    protected static $logOnlyDirty = true;


    public function setPasswordAttribute($password)
    {
        if (Hash::needsRehash($password)) {
            $password = Hash::make($password);
            $this->attributes['password'] = $password;
        }
    }

	public function auctions()
	{
		return $this->belongsToMany(Auction::class, 'auctions_users')
					->withPivot('id', 'price', 'deleted_at')
					->withTimestamps();
	}

	public function contact_us()
	{
		return $this->hasMany(ContactU::class);
	}

	public function reviews()
	{
		return $this->hasMany(Review::class);
	}

	public function stores()
	{
		return $this->hasMany(Store::class);
	}

	public function wallets()
	{
		return $this->hasMany(Wallet::class);
	}

    public function getNameAttribute()
    {
        return $this->attributes['first_name'];
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function store()
    {
        return $this->hasOne(Store::class);
    }
}
