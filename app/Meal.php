<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meal extends Model
{
    ////////// relation entre les modèles ///////////
    protected $guarded = []; /// pour ajouter les lignes en bases de données en masse (create)////
    
    public function orderLines()
    {
        return $this->hasMany('App\OrderLine');
    }

}
