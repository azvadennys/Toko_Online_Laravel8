<?php

namespace App\Http\Controllers;

use App\Models\CartModel;
use App\Models\CategoryModel;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function manageproduct()
    {
        $data = [
            'product' => product::paginate(10)->withQueryString(),
            // 'category' => CategoryModel::all(),
        ];
        return view('manageproduct.index', $data);
    }
   
    public function productcategory($id)
    {
        $data = [
            'product' => product::with('categorydetail')->where('category_id', $id)->paginate(12),
        ];
        return view('product.productcategory', $data);
    }
    public function searchproduct(Request $request)
    {
        $data = [
            'product' => product::with('categorydetail')->where('name', 'like', '%' . $request->search . '%')->paginate(12),
            'searchold' => $request->search,
        ];
        return view('product.search', $data);
    }
    public function addproduct()
    {
        $data = [
            'category' => CategoryModel::all(),
        ];
        return view('manageproduct.add', $data);
    }
    public function editproduct($id)
    {
        $data = [
            'product' => product::where('id', $id)->first(),
            'category' => CategoryModel::all(),
        ];
        return view('manageproduct.edit', $data);
    }
    public function detailproduct($id)
    {
        $data = [
            'product' => product::where('id', $id)->first(),
            'category' => CategoryModel::all(),
        ];
        return view('manageproduct.detail', $data);
    }
    public function createproduct(Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'detail' => 'required',
            'price' => 'required|numeric',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:50000',
        ]);

        $imageName = time() . '.' . $request->file('photo')->getClientOriginalExtension();
        $request->file('photo')->move(public_path('storage/images'), $imageName);
        product::create([
            'name' => $request->name,
            'category_id' => $request->category,
            'description' => $request->detail,
            'price' => $request->price,
            'photo' => $imageName,
        ]);
        return redirect()->back()->with('success', 'Product Has Been Created!.');
    }
    public function updateproduct(Request $request, $id)
    {
        // dd($request);
        $product = product::where('id', $id)->first();
        $validatedData = $request->validate([
            'name' => 'required',
            'category' => 'required',
            'detail' => 'required',
            'price' => 'required|numeric',
            // 'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:50000',
        ]);
        $imageName = $product->photo;
        if ($request->file('photo')) {
            $request->validate(['photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:50000',]);
            unlink('storage/images/' . $product->photo);
            $imageName = time() . '.' . $request->file('photo')->getClientOriginalExtension();
            $request->file('photo')->move(public_path('storage/images'), $imageName);
        }

        product::where('id', $id)->update([
            'name' => $request->name,
            'category_id' => $request->category,
            'description' => $request->detail,
            'price' => $request->price,
            'photo' => $imageName,
        ]);
        return redirect()->back()->with('success', 'Product Has Been Updated!.');
    }
    public function deleteproduct($id)
    {
        // dd($request);
        $product = product::where('id', $id)->first();
        product::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Product Has Been Delete!.');
    }
}
