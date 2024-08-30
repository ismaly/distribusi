<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jenis_barang')->insert([
            'nama' => 'Konsumsi',
        ]);
        DB::table('jenis_barang')->insert([
            'nama' => 'Pembersih',
        ]);
    }
}
