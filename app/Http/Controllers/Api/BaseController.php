<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Support\Arr;

/**
 * Api base controller
 *
 * @package App\Http\Controllers\Admin
 */
class BaseController extends Controller
{
    /**
     * Get list
     *
     * @return mixed
     */
    public function index()
    {
        $config = $this->_getModelConfig();
        $class = $config['class'];
        $with = isset($config['with']) ? (array) $config['with'] : [];
        $count = max(0, min(config('api.max_per_page'), (int) request('count')));

        return $class::with($with)->paginate($count);
    }

    /**
     * Show
     *
     * @param $id
     * @return mixed
     */
    public function show($id)
    {
        $class = $this->_getModelConfig('class');
        return $class::find($id);
    }

    /**
     * Update
     *
     * @param $id
     * @return mixed
     */
    public function update($id)
    {
        $class = $this->_getModelConfig('class');
        $model = $class::find($id);
        $model->fill(request()->input())->save();
        return $model;
    }

    /**
     * Create
     *
     * @return mixed
     */
    public function store()
    {
        $class = $this->_getModelConfig('class');
        return $class::create(request()->input());
    }

    /**
     * Delete
     *
     * @param $id
     * @return mixed
     */
    public function destroy($id)
    {
        $class = $this->_getModelConfig('class');
        $class::destroy($id);
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
