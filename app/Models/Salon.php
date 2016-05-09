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
        'phone', 'email', 'work_time', 'latitude', 'longitude', 'image', 'auto_ids'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['auto_ids'];

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

    /**
     * Set auto ids attribute
     *
     * @param array|string $value
     */
    public function setAutoIdsAttribute($value)
    {
        if (!is_array($value)) {
            $value = array_filter(explode(',', $value));
        }
        $this->autos()->sync($value);
    }

    /**
     * Get auto ids attribute
     *
     * @return array
     */
    public function getAutoIdsAttribute()
    {
        return $this->autos()->get()->pluck('id')->toArray();
    }
}
