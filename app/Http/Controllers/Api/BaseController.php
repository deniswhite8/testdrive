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
        $model->fill($this->_getModelData())->save();
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
        return $class::create($this->_getModelData());
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

    /**
     * Get model data
     *
     * @return array
     */
    protected function _getModelData()
    {
        $class = $this->_getModelConfig('class');
        $uploadFolder = with(new $class)->getUploadFolder();
        $uploadDir = public_path("media/$uploadFolder");

        $data = request()->input();
        foreach (request()->file() as $key => $file) {
            if (isset($data[$key])) {
                continue;
            }

            $fileName = uniqid() . ".{$file->extension()}";
            $file->move($uploadDir, $fileName);
            $data[$key] = "$uploadFolder/$fileName";
        }

        return $data;
    }
}
