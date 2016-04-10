<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * City
 *
 * @package App\Model
 */
class City extends Model
{
    /**
     * Indicates if the model should be timestamped
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get dealer salons
     */
    public function salons()
    {
        return $this->hasMany(Salon::class);
    }
}
