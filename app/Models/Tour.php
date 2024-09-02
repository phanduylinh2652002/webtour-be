<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $id
 * @property int $category_id
 * @property int $tour_guide_id
 * @property int $place_id_start
 * @property int $place_id_end
 * @property string $name
 * @property int $price
 * @property int $discount
 * @property string $start_at
 * @property int $quantity
 * @property string $description
 */
class Tour extends Model
{
    use HasFactory;

    protected $table = 'tours';
    protected $primaryKey = "id";
    protected $keyType = "string";

    protected $fillable = [
        'id',
        'name',
        'price',
        'discount',
        'description',
        'trip',
        'image',
        'place',
        'vehicle',
        'locationStart',
        'locationEnd',
        'quantytiDate',
        'dateStart',
        'dateEnd',
        'quantityPerson',
        'category_id',
        'tour_guide_id'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function guide(): BelongsTo
    {
        return $this->belongsTo(TourGuide::class, 'tour_guide_id');
    }

    public function orders(): HasMany
    {
        return $this->hasMany(BillDetail::class);
    }
}
