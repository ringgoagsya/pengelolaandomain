<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class domain extends Model
{
    public function pengajuan()
    {
        return $this->hasOne(pengajuan::class,'id','id_pengajuan');
    }
}
