<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tenant extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'civility', 'lastName', 'firstName', 'email', 'cniNumber', 'profession', 'phoneNumber',
        'maritalStatus', 'tenureDate', 'caution', 'apartmentID'
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
