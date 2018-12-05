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

    public function getLastRent(){

        return $this->rents->where('apartmentID', $this->apartment->id)
            ->sortByDesc('id')->first();
    }


    public function getPaidRents(){

        return $this->rents
            ->where('apartmentID', $this->apartment->id)
            ->where('settled', true)->count();
    }

    public function getUncompletedRents(){

        return $this->rents
            ->where('apartmentID', $this->apartment->id)
            ->where('settled', false)->count();
    }

    public function getUnpaidRents(){

        $lastRent = $this->rents->where('apartmentID', $this->apartment->id)
            ->sortByDesc('rentMonth')->first();


        $months =  (new \DateTime())->diff(new \DateTime($lastRent->rentMonth))->format('%R%m');
        if($months < 0)  return -$months;
        else return 0;
    }


    public function getPayments(){

        $rentsID = array();;
        foreach($this->rents as $rent){
            array_push($rentsID, $rent->id);
        }
        return Payment::all()->whereIn('rentID', $rentsID)->sortByDesc('id');
    }
}
