<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    public function file()
    {
        return $this->belongsTo(File::class);
    }

    public function level()
    {
        return $this->hasMany(Topseller::class);
    }
}
