<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RefundRequest extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'refund_requests';

    protected $fillable = [
        'user_id',
        'note',
        'amount',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
