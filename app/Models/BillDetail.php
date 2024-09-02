<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $tour_id
 * @property int $customer_id
 * @property int $bill_id
 * @property int $price
 * @property int $discount
 * @property int $quantity_oldPerson
 * @property int $quantity_youngPerson
 * @property int $quantity_children
 * @property int $quantity_infant
 * @property int $status
 * @property string $date_start
 * @property string $date_end
 * @property string $note
 */
class BillDetail extends Model
{
    use HasFactory;

    protected $table = 'bill-detail';

    protected $fillable = [
        'tour_id',
        'customer_id',
        'bill_id',
        'price',
        'discount',
        'quantity_oldPerson',
        'quantity_youngPerson',
        'quantity_children',
        'quantity_infant',
        'date_start',
        'date_end',
        'status',
        'note',
    ];

    public function bill(): BelongsTo
    {
        return $this->belongsTo(Bill::class);
    }

    public function tour(): BelongsTo
    {
        return $this->belongsTo(Tour::class);
    }
}
