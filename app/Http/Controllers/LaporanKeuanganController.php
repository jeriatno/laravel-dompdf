<?php

namespace App\Http\Controllers;

use DB;
use PDF;
use Illuminate\Http\Request;
use App\Models\LaporanKeuangan;

class LaporanKeuanganController extends Controller
{
    // index
	public function index() {
		static $total_saldo = 0;

		$data = LaporanKeuangan::all();
		// total 
		$total_debet  = DB::table('laporan_keuangan')->sum('debet');
		$total_kredit = DB::table('laporan_keuangan')->sum('kredit');
		$total_saldo  = DB::table('laporan_keuangan')->sum('saldo');

		return view('index', compact('data','total_debet', 'total_kredit', 'total_saldo'));
	}

	// preview
	public function previewFile() {
		$data = LaporanKeuangan::all();

		// total 
		$total_debet  = DB::table('laporan_keuangan')->sum('debet');
		$total_kredit = DB::table('laporan_keuangan')->sum('kredit');
		$total_saldo  = DB::table('laporan_keuangan')->sum('saldo');

		$pdf = PDF::loadView('file', compact('data', 'total_debet', 'total_kredit', 'total_saldo'))->setPaper('a4', 'landscape');
		return $pdf->stream('file.pdf');
	}

	// export file
    public function exportFile(Request $request)
	{	
		$data = LaporanKeuangan::all();
		// total 
		$total_debet  = DB::table('laporan_keuangan')->sum('debet');
		$total_kredit = DB::table('laporan_keuangan')->sum('kredit');
		$total_saldo  = DB::table('laporan_keuangan')->sum('saldo');

		$pdf = PDF::loadView('file', compact('data', 'total_debet', 'total_kredit', 'total_saldo'))->setPaper('a4', 'landscape');
		return $pdf->save('file/file.pdf')->download('file.pdf');
	}
}
