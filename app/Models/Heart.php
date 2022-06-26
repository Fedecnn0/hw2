<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Heart extends Model
{
    public function posts(){
        return $this->belongsTo('App\Models\Post');
    }
}