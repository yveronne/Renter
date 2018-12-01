<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Building extends Model
{
    //
    use SoftDeletes;

    protected $fillable = ['buildingName', 'buildingLocation', 'floorsNumber'];


    public function renter(){

        return $this->belongsTo('App\User', 'renterID');
    }

    public function apartments(){

        return $this->hasMany('App\Apartment', 'buildingID');
    }

    public function getTenantsNumber(){

        return $this->apartments->where('currentTenantID', '!=', null)->count();
    }
}
