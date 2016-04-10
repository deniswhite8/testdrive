<?php

namespace App\Models;
use App\Models\Auto\BodyType;
use App\Models\Auto\GearboxType;
use App\Models\Auto\Generation;
use App\Models\Auto\Mark;
use App\Models\Auto\Model;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Auto model
 *
 * @package App\Models
 */
class Auto extends EloquentModel
{
    /**
     * Auto salons
     */
    public function salons()
    {
        return $this->belongsToMany(Salon::class, 'salon_auto');
    }

    /**
     * Get mark
     */
    public function mark()
    {
        return $this->belongsTo(Mark::class);
    }

    /**
     * Get model
     */
    public function model()
    {
        return $this->belongsTo(Model::class);
    }

    /**
     * Get generation
     */
    public function generation()
    {
        return $this->belongsTo(Generation::class);
    }

    /**
     * Get body type
     */
    public function bodyType()
    {
        return $this->belongsTo(BodyType::class);
    }

    /**
     * Get gearbox type
     */
    public function gearboxType()
    {
        return $this->belongsTo(GearboxType::class);
    }
}
