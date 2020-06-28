<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
//    protected $casts = [
//        'sound' => 'array',
//        'photos' => 'array',
//        'image' => 'array',
//        'video' => 'array',
//        'pdf' => 'array',
//    ];
    public function surface()
    {
        return $this->belongsTo(Surface::class);
    }
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
    public function files()
    {
        return $this->belongsTo(File::class);
    }


}
