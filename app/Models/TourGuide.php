<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $avatar
 * @property string $birthday
 * @property int $gender
 */
class TourGuide extends Model
{
    use HasFactory;

    protected $table = 'tour_guides';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'avatar',
        'birthday',
        'gender',
    ];

    public function tours(): HasMany
    {
        return $this->hasMany(Tour::class);
    }
}
