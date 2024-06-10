<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PetugasKeamanan extends Model
{
    protected $fillable = ['nik', 'id_perumahan', 'sk_satpam'];

    public function perumahan()
    {
        return $this->belongsTo(Perumahan::class, 'id_perumahan');
    }
}


