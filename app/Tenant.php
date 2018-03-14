<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use illuminate\Database\Eloquent\SoftDeletes;

class Tenant extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'lastName', 'firstName', 'email', 'cniNumber', 'profession', 'phoneNumber',
        'maritalStatus', 'tenureDate'
    ];

    protected $dates = ['deleted_at'];

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
