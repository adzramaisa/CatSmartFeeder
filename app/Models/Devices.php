<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Devices extends Model
{
    protected $table = 'devices';
    protected $guarded = 'id';

    public function food(){
        return $this->belongsTo(Foods::class, 'food_id', 'id');
    }

    public function controls(){
        return $this->hasMany(Controls::class, 'device_id')->where('category', 'management');
    }
}
