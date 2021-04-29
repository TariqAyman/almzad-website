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
 * Class ContactU
 * 
 * @property int $id
 * @property int|null $user_id
 * @property string $subject
 * @property string $email
 * @property string $phone
 * @property string $message
 * @property string $name
 * @property string|null $deleted_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property User|null $user
 *
 * @package App\Models
 */
class ContactU extends Model
{
    use HasFactory;
	use SoftDeletes;
	protected $table = 'contact_us';

	protected $casts = [
		'user_id' => 'int'
	];

	protected $fillable = [
		'user_id',
		'subject',
		'email',
		'phone',
		'message',
		'name'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
