<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

/**
 * Class IndexController
 *
 * @package App\Http\Controllers\Admin
 */
class IndexController extends Controller
{
    /**
     * Dashboard action
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    /**
     * Grid action
     *
     * @param string $name
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function grid($name)
    {
        return view('admin.grid', ['model' => $name]);
    }

    /**
     * Edit action
     *
     * @param string $name
     * @param string $id
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($name, $id)
    {

    }
}
