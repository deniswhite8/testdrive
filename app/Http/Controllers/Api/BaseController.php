<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Admin\ModelRepository;
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
        $class = $this->_getModelConfig('class');
        return $class::paginate();
    }

    /**
     * Query
     *
     * @return mixed
     */
    public function query()
    {
        $modelRepository = new ModelRepository();
        return $modelRepository->applyFilters($this->_getModelConfig(), request()->input());
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
