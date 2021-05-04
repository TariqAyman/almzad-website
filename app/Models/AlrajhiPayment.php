<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class AlrajhiPayment extends Model
{
    use HasFactory;

    protected $table = 'alrajhi_payments';

    protected $fillable = [
        "amount",
        "email",
        'data',
        'data_encrypted',
        'request_data',
        'user_id',
        'response_init',
        'response_callback_encrypted',
        'response_callback',
        'payment_id',
        'payment_iframe_url',
        'status',
        'transaction_id'
    ];

    protected $casts = [
        'amount' => 'float',
        'data' => 'json',
        'data_encrypted' => 'json',
        'request_data' => 'json',
        'response_callback' => 'json',
        'response_init' => 'json',
    ];

    use LogsActivity;

    protected static $logFillable = true;
    protected static $logName = 'alrajhi_payments';
    protected static $logOnlyDirty = true;


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transaction()
    {
//        return $this->belongsTo(Transaction::class);
    }

}
