<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class pengelola extends Model
{
    protected $fillable = [
        'name',
        'penanggung_jawab',
        'id_unit',
        'telp',
        'email',
        'password',
      ];
    public function unit()
    {
        return $this->belongsTo(unit::class,'id_unit','id');
    }
    //public function platform()
    //{
    //    return $this->belongsTo(platform::class,'id_platform');
    //}
}
