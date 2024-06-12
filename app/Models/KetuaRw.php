<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KetuaRw extends Model
{
    use HasFactory;

    protected $table = 'ketua_rws'; // Nama tabel dalam database

    protected $primaryKey = 'id'; // Primary key

    protected $fillable = [
        'nama_ketua_rw',
        'telepon_ketua_rw',
        'id_perumahan',
    ];

    public function perumahan()
    {
        return $this->belongsTo(Perumahan::class, 'id_perumahan');
    }
}
