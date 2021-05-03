<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Laporan;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = Product::all();
        $user = Auth::user();
        return view('dashboard', compact('user', 'products'));
    }
    public function indexadmin()
    {
        $products = Product::all();
        $user = Auth::user();
        return view('admin_dashboard', compact('user', 'products'));
    }

    public function indexbeli($id)
    {
        $datas = DB::table('products')->where('id',$id)->get();
        $user = Auth::user();
        return view('beli', compact('datas','user'));
    }
    public function beli(Request $request, $id)
    {
        $laporan = new Laporan();
        $laporan->name = $request->get('name');
        $laporan->qty = $request->get('qty');
        $laporan->jenis = 'keluar';
        $laporan->save();
        $product = Product::findOrFail($id);
        $product->qty -= $request->get('qty');
        if ($product->qty == 0) {
            $product->delete();
        }
        $product->save();
        return redirect()->route('dashboard');
    }
}
