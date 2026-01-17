<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Divisi extends Model
{
    protected $guarded = ['id'];

    public function pegawai() {
        return $this->hasMany(Pegawai::class);
    }
}
