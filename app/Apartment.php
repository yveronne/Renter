<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Apartment extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'apartmentNumber', 'monthlyRent', 'livingRoomsNumber', 'kitchensNumber',
        'bedroomsNumber', 'bathroomsNumber', 'buildingID','currentTenantID'
    ];


    public function building(){

        return $this->belongsTo('App\Building', 'buildingID');
    }

    public function tenants(){

        return $this->hasMany('App\Tenant', 'apartmentID');
    }

    public function rents(){

        return $this->hasMany('App\Rent', 'apartmentID');
    }

    public function getCurrentTenant(){
        return Tenant::whereKey($this->currentTenantID)->first();
    }
}
