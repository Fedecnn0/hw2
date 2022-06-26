<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function hearts(){
        return $this->hasMany('App\Models\Heart');
    }
}