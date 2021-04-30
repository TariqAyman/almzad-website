<?php

/**
 * Created by GenCode.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'comments';

    protected $casts = [
        'status' => 'bool'
    ];

    protected $fillable = [
        'user_id',
        'auction_id',
        'comment',
        'status'
    ];

    use LogsActivity;

    protected static $logFillable = true;
    protected static $logName = 'comments';
    protected static $logOnlyDirty = true;


    public function auctions()
    {
        return $this->belongsTo(Auction::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
