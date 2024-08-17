<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $name
 */
class Place extends Model
{
    use HasFactory;

    protected $table = 'places';

    protected $fillable = [
        'name',
    ];

    public function tourStart(): HasMany
    {
        return $this->hasMany(Tour::class, 'place_id_start');
    }

    public function tourEnd(): HasMany
    {
        return $this->hasMany(Tour::class, 'place_id_end');
    }
}
