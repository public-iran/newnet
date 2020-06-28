<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Listpeople extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
