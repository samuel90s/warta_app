<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perumahaan extends Model
{
    use HasFactory;
    protected $fillable = ['nama_perumahaan','alamat_perumahaan', 'jumlah_unit','pengembang'];
}
