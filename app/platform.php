<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class platform extends Model
{
    public function pengajuan()
    {
        return $this->hasMany(pengelola::class,'id_platform','id');
   }
}
