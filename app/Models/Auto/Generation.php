<?php

namespace App\Models\Auto;
use Illuminate\Database\Eloquent\Model;
use App\Models\Auto;

/**
 * Auto generation
 *
 * @package App\Models\Auto
 */
class Generation extends Model
{
    use \SleepingOwl\WithJoin\WithJoinTrait;

    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'auto_generations';

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
    protected $fillable = ['name', 'model_id'];

    /**
     * Get model
     */
    public function model()
    {
        return $this->belongsTo(\App\Models\Auto\Model::class);
    }

    /**
     * Get autos
     */
    public function autos()
    {
        return $this->hasMany(Auto::class);
    }
}
