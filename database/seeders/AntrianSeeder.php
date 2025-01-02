<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AntrianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('antrian')->insert([
            [
                'pasien_id' => 1,
                'tanggal_antrian' => '2024-03-12',
                'nomor_antrian' => 1,
                'poli' => 'umum',
                'status' => 'menunggu',
            ],
            [
                'pasien_id' => 2,
                'tanggal_antrian' => '2024-09-21',
                'nomor_antrian' => 2,
                'poli' => 'gigi',
                'status' => 'dilayani',
            ],
        ]);
    }
}
