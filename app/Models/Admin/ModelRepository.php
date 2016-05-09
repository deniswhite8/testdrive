<?php

namespace App\Models\Admin;
use Illuminate\Support\Facades\Schema;

/**
 * Class ModelRepository
 *
 * @package App\Model\Admin
 */
class ModelRepository
{
    /**
     * Apply filters
     *
     * @param array $config
     * @param array $filters
     *
     * @return mixed
     */
    public function applyFilters($config, $filters)
    {
        $model = new $config['class'];
        $total = $model->count();
        $builder = $this->_joinFields($model, $config);

        $this->_addOrder($builder, $filters);
        $appliedSearch = $this->_addSearch($builder, $filters, $config) ||
            $this->_addFilters($builder, $filters);

        $requestId = data_get($filters, 'request_id');
        return $this->_paginate($builder, $filters, $total, $requestId, $appliedSearch);
    }

    /**
     * Join fields
     *
     * @param \Illuminate\Database\Eloquent\Model $model
     * @param array $config
     *
     * @return mixed
     */
    protected function _joinFields($model, $config)
    {
        $with = data_get($config, 'with', []);
        return $model->includes($with);
    }

    /**
     * Add order
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param array $filters
     *
     * @return void
     */
    protected function _addOrder($builder, $filters)
    {
        $dir = data_get($filters, 'dir', 'asc');

        if ($field = data_get($filters, 'order')) {
            $builder->orderBy($field, $dir);
        }

        $builder->orderBy('id', $dir);
    }

    /**
     * Add search
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param array $filters
     * @param array $config
     *
     * @return bool
     */
    protected function _addSearch($builder, $filters, $config)
    {
        $search = str_replace('%', '', (string) data_get($filters, 'search'));
        if (!$search) {
            return false;
        }

        $table = $builder->getModel()->getTable();
        foreach ((array) data_get($config, 'search', []) as $searchField) {
            if (strpos($searchField, '.') === false) {
                $searchField = "$table.$searchField";
            }

            $builder->orWhere($searchField, 'like', "%$search%");
        }

        return true;
    }

    /**
     * Add filters
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param array $filters
     *
     * @return bool
     */
    protected function _addFilters($builder, $filters)
    {
        $tableFields = Schema::getColumnListing($builder->getModel()->getTable());
        $isApplied = false;

        foreach ($filters as $key => $value) {
            if (!in_array($key, $tableFields) || empty($value)) {
                continue;
            }

            $builder->where($key, $value);
            $isApplied = true;
        }

        return $isApplied;
    }

    /**
     * Paginate
     *
     * @param \Illuminate\Database\Eloquent\Builder $builder
     * @param array $filters
     * @param int $total
     * @param int $requestId
     * @param bool $appliedSearch
     *
     * @return mixed
     */
    protected function _paginate($builder, $filters, $total, $requestId, $appliedSearch)
    {
        $count = max(0, min(config('api.max_per_page'), (int) data_get($filters, 'count')));

        $pageName = 'page';
        $page = Paginator::resolveCurrentPage($pageName);
        $perPage = $count ?: $builder->getModel()->getPerPage();

        $builder->forPage($page, $perPage);
        $data = $builder->get(['*']);

        $filteredTotal = $appliedSearch ? $builder->toBase()->getCountForPagination() : $total;

        return new Paginator($data, $total, $filteredTotal, $requestId, $perPage, $page);
    }
}