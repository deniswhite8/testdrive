<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use SleepingOwl\WithJoin\WithJoinTrait;

/**
 * Abstract model
 *
 * @package App\Models
 */
abstract class AbstractModel extends Model
{
    use WithJoinTrait;

    /**
     * Upload direction
     *
     * @var string
     */
    protected $_uploadDir;

    /**
     * Get upload folder
     *
     * @return string
     */
    public function getUploadFolder()
    {
        return $this->_uploadDir ?: Str::snake(class_basename($this));
    }

    /**
     * Get the table associated with the model.
     *
     * @return string
     */
    public function getTable()
    {
        if (isset($this->table)) {
            return $this->table;
        }

        $className = str_replace(__NAMESPACE__ . '\\', '', get_class($this));
        return str_replace('\\', '', Str::snake(Str::plural($className)));
    }
}
