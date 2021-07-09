<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    ////////// relation entre les modèles ///////////

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    
    //créer une date à partir de chaine de caractère et créer 2 fonctions return 2 requettes différentes en terme de date//

    protected $date = ['booking_date'];

    public function scopeComingBookings($query)
    {
        return $query->where('booking_date', '>=', now());
    }

    public function scopePassedBookings($query)
    {
        return $query->where('booking_date', '<', now());
    }

}
