<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Flight extends Model
{
    protected $fillable = ['airline_id','origin_airport_id','destination_airport_id','departure_time','arrival_time','price','available_seats'];

    public function reservation() {
        return $this->hasMany(Reservation::class);
    }

    public function airlines() {
        return $this->belongsTo(Airline::class);
    }

    public function origin_airports() {
        return $this->belongsTo(Airport::class,'origin_airport_id');
    }

    
    public function destiny_airports() {
        return $this->belongsTo(Airport::class,'destination_airport_id');
    }

    public function reservations() {
        return $this->belongsToMany(Reservation::class);
    }

}
