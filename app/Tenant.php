<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tenant extends Model
{
    //
    protected $fillable = [
        'lastName', 'firstName', 'email', 'cniNumber', 'profession', 'phoneNumber',
        'maritalStatus'
    ];

    protected $guarded = [
        'apartmentID', 'tenureDate'
    ];

    //Pour ne pas supprimer un locataire de la base de données
    protected $softDelete = true;

    public function apartment(){

        return $this->belongsTo('App\Apartment', 'apartmentID');
    }

    public function rents(){

        return $this->hasMany('App\Rent', 'tenantID');
    }

    public function bills (){

        return $this->hasMany('App\Bill', 'tenantID');
    }
}
