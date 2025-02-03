<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foods extends Model
{
    //

    protected $table = 'foods';

    protected $guarded = 'id';

    public function devices(){
        return $this->belongsTo(Devices::class);
    }
}
