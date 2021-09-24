<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';
    protected $guarded = ['id'];
    
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function hafalan()
    {
        return $this->hasMany(Hafalan::class);
    }
}
