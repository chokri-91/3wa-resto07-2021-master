<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    ////////// relation entre les modèles ///////////
    
    public function meal()
    {
        return $this->belongsTo('App\Meal');
    }
    public function order()
    {
        return $this->belongsTo('App\Order');
    }
}
