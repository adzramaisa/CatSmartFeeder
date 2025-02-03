<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Devices extends Model
{
    protected $table = 'devices';
    protected $guarded = 'id';

    public function food(){
        return $this->belongsTo('food_id', Foods::class);
    }

    public function controls(){
        return $this->hasMany(Controls::class);
    }
}
