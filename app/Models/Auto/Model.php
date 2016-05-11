<?php

namespace App\Models\Auto;
use App\Models\AbstractModel;
use App\Models\Auto;

/**
 * Auto models
 *
 * @package App\Models\Auto
 */
class Model extends AbstractModel
{
    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 300;

    /**
     * Indicates if the model should be timestamped
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['name', 'mark_id'];

    /**
     * Get mark
     */
    public function mark()
    {
        return $this->belongsTo(Mark::class);
    }

    /**
     * Get mark generations
     */
    public function generations()
    {
        return $this->hasMany(Generation::class);
    }

    /**
     * Get autos
     */
    public function autos()
    {
        return $this->hasMany(Auto::class);
    }
}
