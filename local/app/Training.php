<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    public function files()
    {
        return $this->belongsTo(File::class);
    }
}
