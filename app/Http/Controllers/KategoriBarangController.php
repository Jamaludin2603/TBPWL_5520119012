<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KategoriBarangController extends Controller
{
    public function index()
    {
        $categories=Category::all();
        $user=Auth::user();
        return view('KategoriBarang.category', compact('user','categories'));
    }
    public function tbkategori()
    {
        $user=Auth::user();
        return view('KategoriBarang.tambah', compact('user'));
    }
    public function insertKategori(Request $req)
    {
        $category = new Category();
        $category->name = $req->get('name');
        $category->description = $req->get('description');
        $category->save();

        return redirect()->route('admin.kategori');
    }
    public function hpscategory(Request $req)
    {
        $category = Category::find($req->get('id'));
        $category->delete();

        return redirect()->route('admin.kategori');
    }
    public function editKategori($id)
    {
        $datas = DB::table('categories')->where('id',$id)->get();
        return view('KategoriBarang.edit', compact('datas'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->get('name');
        $category->description = $request->get('description');
        
        $category->save();

        return redirect()->route('admin.kategori');
    }
}
