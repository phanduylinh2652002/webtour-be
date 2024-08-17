<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
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

    protected $fillable = [
        'category_id',
        'tour_guide_id',
        'place_id_start',
        'place_id_end',
        'name',
        'price',
        'discount',
        'start_at',
        'quantity',
        'description',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function vehicles(): BelongsToMany
    {
        return $this->belongsToMany(Vehicle::class, 'tour_vehicle', 'vehicle_id', 'tour_id');
    }

    public function placeStart(): BelongsTo
    {
        return $this->belongsTo(Place::class, 'place_id_start');
    }

    public function placeEnd(): BelongsTo
    {
        return $this->belongsTo(Place::class, 'place_id_end');
    }

    public function guide(): BelongsTo
    {
        return $this->belongsTo(TourGuide::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function images(): BelongsTo
    {
        return $this->belongsTo(Image::class);
    }
}
