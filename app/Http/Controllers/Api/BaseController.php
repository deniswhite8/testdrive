<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;

/**
 * Api base controller
 *
 * @package App\Http\Controllers\Admin
 */
class BaseController extends Controller
{
    public function index()
    {
        $name = request()->segment(2);
        $config = config("api.$name");
        $class = $config['class'];
        $with = isset($config['with']) ? (array) $config['with'] : [];
        $count = max(0, min(config('api.max_per_page'), (int) request('count')));

        return $class::with($with)->paginate($count);
    }
}
