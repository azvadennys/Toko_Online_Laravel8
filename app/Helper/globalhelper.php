<?php

use App\Models\CategoryModel;

if (!function_exists('category')) {
    function category()
    {
        return CategoryModel::all();
    }
}
