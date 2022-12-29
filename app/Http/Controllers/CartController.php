<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\CategoryModel;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CartController extends Controller
{
    public function createcart(Request $request, $id)
    {
        $cek = CartModel::where('user_id', auth()->user()->id)->where('product_id', $id)->first();
        if ($cek == NULL) {
            CartModel::create([
                'user_id' => auth()->user()->id,
                'product_id' => $id,
                'quantity' => $request->qty,
            ]);
            return redirect()->back()->with('success', 'Produk sudah dimasukkan kedalam keranjang');
        } else {
            CartModel::where('user_id', auth()->user()->id)->where('product_id', $id)->update([
                'quantity' => ($cek->quantity + $request->qty),
            ]);
            return redirect()->back()->with('success', 'Jumlah Produk sudah ditambah kedalam keranjang');
        }
    }
    public function deletecart($id)
    {
        CartModel::where('id', $id)->delete();
        return redirect()->back()->with('success', 'Produk berhasil dihapus dari keranjang');
    }
    public function cart()
    {
        $data = [
            'cart' => CartModel::where('user_id', auth()->user()->id)->get(),
            // 'category' => CategoryModel::all(),
        ];
        // dd($data['cart']);
        return view('product.cart', $data);
    }
}
