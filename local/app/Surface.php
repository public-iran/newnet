<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Surface extends Model
{
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

}
