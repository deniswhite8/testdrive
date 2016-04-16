<?php

namespace App\Models;
use App\Models\Auto\BodyType;
use App\Models\Auto\GearboxType;
use App\Models\Auto\Generation;
use App\Models\Auto\Mark;
use App\Models\Auto\Model;

/**
 * Auto model
 *
 * @package App\Models
 */
class Auto extends AbstractModel
{
    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['mark_id', 'model_id', 'generation_id',
        'body_type_id', 'gearbox_type_id', 'mileage', 'description', 'image'];

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
    public function body()
    {
        return $this->belongsTo(BodyType::class);
    }

    /**
     * Get gearbox type
     */
    public function gearbox()
    {
        return $this->belongsTo(GearboxType::class);
    }
}
