<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;
    protected $table = 'category';
    protected $with = ['productlist'];
    public function productlist()
    {
        return $this->hasMany(product::class, 'category_id', 'id');
    }
}
