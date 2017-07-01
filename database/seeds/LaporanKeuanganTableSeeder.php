<?php

use Illuminate\Database\Seeder;

class LaporanKeuanganTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('laporan_keuangan')->insert(
        	[
	            'tanggal'   => '2017-01-01',
	            'keterangan'=> 'Beli Kertas',
	            'debet'		=> 200000.00,
	            'kredit'	=> 0.00,
	            'saldo'		=> 800000.00
        	]
        );
    }
}
