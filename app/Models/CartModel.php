<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartModel extends Model
{
    use HasFactory;
    protected $table = 'cart';
    protected $with = ['productdetail'];
    protected $guarded = NULL;
    public function productdetail()
    {
        return $this->hasOne(product::class, 'id', 'product_id');
    }
}
