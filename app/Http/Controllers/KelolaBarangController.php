<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Laporan;
use Illuminate\Http\Request;
use App\Models\Product as Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class KelolaBarangController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $user = Auth::user();
        return view('KelolaBarang.barang', compact('products','user'));
        print_r($products);
    }

    public function tbbarang()
    {
        $brands = Brand::all();
        $categories = Category::all();
        return view('KelolaBarang.tambah', compact('brands','categories'));
    }

    public function insertBarang(Request $request)
    {
        $laporan = new Laporan();
        $laporan->name = $request->get('name');
        $laporan->qty = $request->get('qty');
        $laporan->jenis = 'masuk';
        $laporan->save();
        $product = new Product();
        $product->name = $request->get('name');
        $product->qty = $request->get('qty');
        $product->price = $request->get('price');
        $product->categories_id = $request->get('category');
        $product->brands_id = $request->get('brand');
        if ($request->hasFile('photo')) {
            $extension = $request->file('photo')->extension();
            $filename = 'photo_barang_' . time() . '.' . $extension;
            $request->file('photo')->storeAs('public/photo_barang', $filename);
            $product->photo = $filename;
        }

        $product->save();

        return redirect()->route('admin.barang');
    }
    public function hpsbarang(Request $req)
    {
        $product = Product::find($req->get('id'));
        $product->delete();
        Storage::delete('public/photo_barang/' . $req->get('photo'));

        return redirect()->route('admin.barang');
    }
    public function editBarang($id)
    {
        $datas = DB::table('products')->where('id',$id)->get();
        $datas->categories = Category::get();
        $datas->brands = Brand::get();
        return view('KelolaBarang.edit', compact('datas'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->name = $request->get('name');
        $product->qty = $request->get('qty');
        $product->price = $request->get('price');
        $product->categories_id = $request->get('category');
        $product->brands_id = $request->get('brand');
        if ($request->hasFile('photo')) {
            $extension = $request->file('photo')->extension();
            $filename = 'photo_barang_' . time() . '.' . $extension;
            $request->file('photo')->storeAs('public/photo_barang', $filename);
            $product->photo = $filename;
        Storage::delete('public/photo_user/' . $request->get('old_photo'));
        }
        

        $product->save();

        return redirect()->route('admin.barang');
    }
}
