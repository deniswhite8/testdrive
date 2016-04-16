<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use SleepingOwl\WithJoin\WithJoinTrait;

/**
 * Abstract model
 *
 * @package App\Models\Auto
 */
abstract class AbstractModel extends Model
{
    use WithJoinTrait;
}
