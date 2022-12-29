<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionModel extends Model
{
    use HasFactory;
    protected $table = 'transaction';
    protected $with = ['transactiondetail'];
    protected $guarded = NULL;
    public function transactiondetail()
    {
        return $this->hasMany(DetailTransactionModel::class, 'transaction_id', 'id');
    }
}
