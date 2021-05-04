<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';
    protected static $logFillable = true;
    protected static $logName = 'transactions';
    protected static $logOnlyDirty = true;

    protected $casts = [
        'user_id' => 'int',
        'auction_id' => 'int',
        //		'currency_id' => 'int',
        'amount' => 'float',
        'payment_id' => 'int',
    ];

    protected $fillable = [
        'user_id',
        'auction_id',
        //		'currency_id' => 'int',
        'amount',
        'note',
        'payment_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->belongsTo(AlrajhiPayment::class);
    }
}
