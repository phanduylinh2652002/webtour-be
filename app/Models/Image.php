<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $tour_id
 * @property string $image
 */
class Image extends Model
{
    use HasFactory;

    protected $table = 'images';

    /**
     * @var string[]
     */
    protected $fillable = [
        'tour_id',
        'image',
    ];

    public function tour(): HasMany
    {
        return $this->hasMany(Tour::class);
    }
}
