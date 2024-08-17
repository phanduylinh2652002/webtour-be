<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $order_id
 * @property int $total
 * @property string $date
 */
class Bill extends Model
{
    use HasFactory;

    protected $table = 'bills';

    protected $fillable = [
        'order_id',
        'total',
        'date',
    ];

    public function order(): HasOne
    {
        return $this->hasOne(Order::class);
    }
}
