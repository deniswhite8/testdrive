<?php

namespace App\Models;

/**
 * Salon
 *
 * @package App
 */
class Salon extends AbstractModel
{
    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['dealer_id', 'city_id', 'name', 'description', 'address',
        'phone', 'email', 'work_time', 'latitude', 'longitude', 'image'];

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
