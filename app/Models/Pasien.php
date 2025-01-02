<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table = 'pasien';
    protected $guard = 'pasien';
    protected $fillable = [
        'nama',
        'ktp',
        'lahir_tempat',
        'lahir_tanggal',
        'jenis_kelamin',
        'provinsi',
        'kab_kota',
        'kecamatan',
        'rt_rw',
        'metode_pembayaran',
        'no_bpjs',
        'tanggal_reservasi'
    ];

    protected static function boot()
    {
        parent::boot();

        // Event sebelum menyimpan data
        static::saving(function ($pasien) {
            if ($pasien->metode_pembayaran === 'umum') {
                $pasien->no_bpjs = null; // Pastikan BPJS kosong jika metode pembayaran umum
            }
        });
    }

    public function antrian(){
        return $this->hasMany(Antrian::class);   
    }
}
