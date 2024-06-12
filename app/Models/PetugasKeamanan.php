<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PetugasKeamanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'tanggal_lahir',
        'jenis_kelamin',
        'telepon',
        'nik',
        'id_perumahan',
        'sk_satpam',
    ];

    public function perumahan()
    {
        return $this->belongsTo(Perumahan::class, 'id_perumahan');
    }


}


