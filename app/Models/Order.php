<?php

namespace App\Models;

use App\Models\Auto\Generation;
use App\Models\Auto\Mark;
use App\Models\Auto\Model;
use Illuminate\Database\Eloquent\Model as EloquentModel;

/**
 * Dealer
 *
 * @package App\Models
 */
class Order extends EloquentModel
{
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
}
