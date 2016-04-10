<?php

namespace App\Models\Auto;
use Illuminate\Database\Eloquent\Model;
use App\Models\Auto;

/**
 * Gearbox type
 *
 * @package App\Model\Auto
 */
class GearboxType extends Model
{
    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'auto_gearbox_types';

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
