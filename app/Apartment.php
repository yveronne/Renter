<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    //
    protected $fillable = [
        'apartmentNumber', 'monthlyRent', 'livingRoomsNumber', 'kitchensNumber',
        'bedroomsNumber', 'bathroomsNumber'
    ];

    protected $guarded = [
        'buildingID'
    ];

    public function building(){

        return $this->belongsTo('App\Building', 'buildingID');
    }

    public function tenant(){

        return $this->hasOne('App\Tenant', 'apartmentID');
    }
}
