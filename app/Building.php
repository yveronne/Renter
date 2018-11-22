<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    //
    protected $fillable = ['buildingName', 'buildingLocation', 'floorsNumber'];


    public function renter(){

        return $this->belongsTo('App\User', 'renterID');
    }

    public function apartments(){

        return $this->hasMany('App\Apartment', 'buildingID');
    }
}
