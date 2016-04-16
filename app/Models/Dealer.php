<?php

namespace App\Models;

/**
 * Dealer
 *
 * @package App\Models
 */
class Dealer extends AbstractModel
{
    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['name', 'description', 'image'];

    /**
     * Get dealer salons
     */
    public function salons()
    {
        return $this->hasMany(Salon::class);
    }
}
