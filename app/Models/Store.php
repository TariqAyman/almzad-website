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
 * Class Store
 *
 * @property int $id
 * @property int $user_id
 * @property string $name_ar
 * @property string $name_en
 * @property string $description_ar
 * @property string $description_en
 * @property string $slug_ar
 * @property string $slug_en
 * @property string $phone_number
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property User $user
 * @property Collection|StoresImage[] $stores_images
 *
 * @package App\Models
 */
class Store extends Model
{
    use HasFactory;
	use SoftDeletes;
	protected $table = 'stores';

	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'name_ar',
		'name_en',
		'description_ar',
		'description_en',
		'slug_ar',
		'slug_en',
		'phone_number'
	];

    protected $appends = [
        'name', 'slug'
    ];

    public function user()
	{
		return $this->belongsTo(User::class);
	}

	public function storesImages()
	{
		return $this->hasMany(StoresImage::class);
	}

    public function getNameAttribute()
    {
        return $this->attributes['name_ar'];
    }

    public function getSlugAttribute()
    {
        return $this->attributes['slug_ar'];
    }
}
