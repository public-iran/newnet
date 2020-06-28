<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userrequest extends Model
{
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
