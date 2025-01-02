<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Antrian extends Model
{
    protected $table = 'antrian';
    protected $guard = 'antrian';
    protected $fillable = [
        'pasien_id',
        'poli',
        'tanggal_antrian',
        'nomor_antrian',
        'status',
    ];

    public function pasien(){
        return $this->belongsTo(Pasien::class);
    }

}
