<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'product';
    protected $guarded = NULL;
    protected $dates = ['deleted_at'];
    public function categorydetail()
    {
        return $this->hasOne(CategoryModel::class, 'id', 'category_id');
    }
}
