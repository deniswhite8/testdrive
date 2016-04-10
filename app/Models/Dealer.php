<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

/**
 * Dealer
 *
 * @package App\Models
 */
class Dealer extends Model
{
    /**
     * Get dealer salons
     */
    public function salons()
    {
        return $this->hasMany(Salon::class);
    }
}
