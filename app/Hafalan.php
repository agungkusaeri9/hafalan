<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hafalan extends Model
{
    protected $table = 'hafalan';
    protected $guarded = ['id'];
    public $dates = ['tanggal'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function kitab()
    {
        return $this->belongsTo(Kitab::class);
    }
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
    public function bab()
    {
        return $this->belongsTo(Bab::class);
    }

}
