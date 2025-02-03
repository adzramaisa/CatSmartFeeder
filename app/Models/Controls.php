<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Controls extends Model
{
    protected $table = 'controls';
    protected $guarded = 'id';
    protected $casts = [
        'time_start' => 'date:hh:mm',
        'time_end' => 'date:hh:mm'
    ];

    public function devices(){
        return $this->belongsTo(Devices::class);
    }
}
