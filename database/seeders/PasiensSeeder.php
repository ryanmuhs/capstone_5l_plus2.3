<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PasiensSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pasien')->insert([
            [
                'nama' => 'Pasien 1',
                'ktp' => '327601',
                'lahir_tempat' => 'Jakarta',
                'lahir_tanggal' => '2001-01-01',
                'jenis_kelamin' => 'laki-laki',
                'provinsi' => 'DKI Jakarta',
                'kab_kota' => 'Jakarta Pusat',
                'kecamatan' => 'Gambir',
                'rt_rw' => '001/001',
                'no_bpjs' => null,
                'metode_pembayaran' => 'umum',
                'tanggal_reservasi' => '2024-12-01',
            ],
            [
                'nama' => 'Pasien 2',
                'ktp' => '327602',
                'lahir_tempat' => 'Jakarta',
                'lahir_tanggal' => '2001-01-03',
                'jenis_kelamin' => 'perempuan',
                'provinsi' => 'DKI Jakarta',
                'kab_kota' => 'Jakarta Pusat',
                'kecamatan' => 'Gambir',
                'rt_rw' => '001/001',
                'metode_pembayaran' => 'bpjs',
                'no_bpjs' => '1234567890',
                'tanggal_reservasi' => '2024-12-01',
            ],
        ]);
    }
}
