<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perumahan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_perumahan'; // Add this if your primary key is not 'id'

    protected $fillable = [
        'nama_perumahan',
        'alamat',
        'email',
        'pengembang',
    ];
}
