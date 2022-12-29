<?php

namespace Database\Seeders;

use App\Http\Controllers\CategoryModelController;
use App\Models\CategoryModel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class categoryseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CategoryModel::create([
            'name' => 'Camera',
        ]);
        CategoryModel::create([
            'name' => 'Beauty',
        ]);
    }
}
