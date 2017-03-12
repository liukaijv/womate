<?php
use Illuminate\Contracts\View\Factory as ViewFactory;

function asset_backend($path, $secure = null)
{
    $path = substr($path, 0, 1) == '/' ? $path : '/' . $path;
    return asset('backend' . $path, $secure);
}

function view_backend($view = null, $data = [], $mergeData = [])
{
    $factory = app(ViewFactory::class);

    if (func_num_args() === 0) {
        return $factory;
    }

    if(!str_contains($view, 'backend.')){
        $view = 'backend.'.$view;
    }

    return $factory->make($view, $data, $mergeData);
}