<?php

namespace App\Models\Auto;
use Illuminate\Database\Eloquent\Model;
use App\Models\Auto;

/**
 * Auto mark
 *
 * @package App\Models\Auto
 */
class Mark extends Model
{
    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'auto_marks';

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
        return $this->hasMany(\App\Models\Auto\Model::class);
    }

    /**
     * Get autos
     */
    public function autos()
    {
        return $this->hasMany(Auto::class);
    }
}
