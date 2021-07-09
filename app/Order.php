<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    ////////// relation entre les modèles ///////////
    
    public function orderLines()
    {
        return $this->hasMany('App\OrderLine');
    }
}
