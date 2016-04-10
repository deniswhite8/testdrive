<?php

namespace App\Models\Auto;
use Illuminate\Database\Eloquent\Model;
use App\Models\Auto;

/**
 * Body type
 *
 * @package App\Model\Auto
 */
class BodyType extends Model
{
    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'auto_body_types';

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
