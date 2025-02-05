<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Foods extends Model
{
    //

    protected $table = 'foods';

    protected $guarded = 'id';

    public function getPresentaseAttribute()
    {
        $weight = $this->weight;
        $current = $this->current_stock;

        if ($weight <= 0) {
            return 0;
        }

        return ($current / $weight) * 100;
    }


    public function devices(){
        return $this->belongsTo(Devices::class);
    }
}
