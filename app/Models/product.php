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
    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('name', 'like', '%' . request('search') . '%');
        });
        // if (request('search')) {
        //     $query->where('nama_dinas', 'like', '%' . request('search') . '%');
        // }
    }
}
