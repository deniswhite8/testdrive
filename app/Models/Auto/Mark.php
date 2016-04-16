<?php

namespace App\Models\Auto;
use App\Models\AbstractModel;
use App\Models\Auto;

/**
 * Auto mark
 *
 * @package App\Models\Auto
 */
class Mark extends AbstractModel
{
    /**
     * Indicates if the model should be timestamped
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];

    /**
     * Get mark models
     */
    public function models()
    {
        return $this->hasMany(Model::class);
    }

    /**
     * Get autos
     */
    public function autos()
    {
        return $this->hasMany(Auto::class);
    }
}
