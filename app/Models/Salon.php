<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * Salon
 *
 * @package App
 */
class Salon extends Model
{
    /**
     * Salon autos
     */
    public function autos()
    {
        return $this->belongsToMany(Auto::class, 'salon_auto');
    }

    /**
     * Get dealer
     */
    public function dealer()
    {
        return $this->belongsTo(Dealer::class);
    }

    /**
     * Get city
     */
    public function city()
    {
        return $this->belongsTo(City::class);
    }
}
