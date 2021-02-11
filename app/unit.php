<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class unit extends Model
{
    protected $table ='units';
    public function pengelola()
    {
        return $this->hasMany(pengelola::class,'id_unit','id');
    }
}
