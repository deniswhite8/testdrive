<?php

namespace App\Models;

use App\Models\Auto\Generation;
use App\Models\Auto\Mark;
use App\Models\Auto\Model;

/**
 * Dealer
 *
 * @package App\Models
 */
class Order extends AbstractModel
{
    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = ['mark_id', 'model_id', 'generation_id', 'salon_id',
        'contacts', 'datetime', 'comment'];

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
     * Get salon
     */
    public function salon()
    {
        return $this->belongsTo(Salon::class);
    }

    /**
     * Set generation id attribute
     *
     * @param $value
     */
    public function setGenerationIdAttribute($value)
    {
        $this->attributes['generation_id'] = $value ?: null;
    }
}
