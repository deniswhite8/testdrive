<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;

/**
 * Api base relation controller
 *
 * @package App\Http\Controllers\Admin
 */
class BaseRelationController extends Controller
{
    /**
     * Get list
     *
     * @param $id
     * @return mixed
     */
    public function index($id)
    {
        $baseClass = Arr::get(config('api.' . request()->segment(2)), 'class');
        $relationName = str_plural(request()->segment(4));

        return $baseClass::findOrFail($id)->$relationName()->paginate();
    }

    /**
     * Get model config
     *
     * @param $key
     * @return array
     */
    protected function _getModelConfig($key = null)
    {
        $name = request()->segment(2);
        return Arr::get(config("api.$name"), $key);
    }
}
