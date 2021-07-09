<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    ////////// relation entre les modèles ///////////
    
    public function orderLines()
    {
        return $this->hasMany('App\OrderLine');
    }

}
