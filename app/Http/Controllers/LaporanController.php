<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;

class LaporanController extends Controller
{
    public function indexmasuk()
    {
        $products = Laporan::all();
        $user = Auth::user();
        return view('Laporan.barang_masuk', compact('user','products'));
    }
    public function indexkeluar()
    {
        $products = Laporan::all();
        $user = Auth::user();
        return view('Laporan.barang_keluar', compact('user','products'));
    }
    public function printMasuk()
    {
        $datas = Laporan::all();

        $pdf = PDF::loadview('printMasuk', ['datas' => $datas]);
        return $pdf->download('laporanMasuk.pdf');
    }
    public function printKeluar()
    {
        $datas = Laporan::all();

        $pdf = PDF::loadview('printKeluar', ['datas' => $datas]);
        return $pdf->download('laporanKeluar.pdf');
    }
}
