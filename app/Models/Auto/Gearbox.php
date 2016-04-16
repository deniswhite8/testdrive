<?php

namespace App\Models\Auto;
use App\Models\AbstractModel;
use App\Models\Auto;

/**
 * Gearbox type
 *
 * @package App\Model\Auto
 */
class Gearbox extends AbstractModel
{
    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Indicates if the model should be timestamped
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get autos
     */
    public function autos()
    {
        return $this->hasMany(Auto::class);
    }
}
