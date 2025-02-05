<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Controls extends Model
{
    protected $table = 'controls';
    protected $guarded = ['id'];

    public function devices(){
        return $this->belongsTo(Devices::class, 'device_id');
    }

    protected function timeStart(): Attribute
    {
        return Attribute::get(fn ($value) => date('H:i', strtotime($value)));
    }

    protected function timeEnd(): Attribute
    {
        return Attribute::get(fn ($value) => date('H:i', strtotime($value)));
    }
}
