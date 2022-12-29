<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\CategoryModel;
use App\Models\DetailTransactionModel;
use App\Models\product;
use App\Models\TransactionModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Transaction;

class TransactionController extends Controller
{
    public function history()
    {
        $data = [
            'transaction' => TransactionModel::where('user_id', auth()->user()->id)->orderby('created_at', 'DESC')->get(),
            // 'category' => CategoryModel::all(),
        ];
        // dd($data['cart']);
        return view('product.history', $data);
    }
}
