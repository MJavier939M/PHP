<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['user_id','flight_id','passengers','notes'];

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function flights() {
        return $this->belongsToMany(Flight::class);
    }
}
