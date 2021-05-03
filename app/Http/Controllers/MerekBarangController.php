<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MerekBarangController extends Controller
{
    public function index()
    {
        $brands = Brand::all();
        $user = Auth::user();
        return view('MerkBarang.brand', compact('brands','user'));
    }
    public function tbmerek()
    {
        $user = Auth::user();
        return view('MerkBarang.tambah', compact('user'));
    }
    public function insert(Request $req)
    {
        $brand = new Brand();
        $brand->name = $req->get('name');
        $brand->description = $req->get('description');

        $brand->save();

        return redirect()->route('admin.merk');
    }
    public function hpsmerk(Request $req)
    {
        $brand = Brand::find($req->get('id'));
        $brand->delete();

        return redirect()->route('admin.merk');
    }
    public function editMerek($id)
    {
        $datas = DB::table('brands')->where('id',$id)->get();
        return view('MerkBarang.edit', compact('datas'));
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);
        $brand->name = $request->get('name');
        $brand->description = $request->get('description');
        
        $brand->save();

        return redirect()->route('admin.merk');
    }
}
