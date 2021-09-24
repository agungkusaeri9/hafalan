<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bab extends Model
{
    protected $table = 'bab';
    protected $guarded =['id'];

    public function kitab()
    {
        return $this->belongsTo(Kitab::class);
    }
}
