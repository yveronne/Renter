<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rent extends Model
{
    //
    use SoftDeletes;

    protected $fillable = [
        'rentMonth', 'tenantID', 'apartmentID'
    ];

    protected $dates = ['deleted_at'];

    public function tenant(){

        return $this->belongsTo('App\Tenant', 'tenantID');
    }

    public function apartment(){

        return $this->belongsTo('App\Apartment', 'apartmentID');
    }

    public function payments(){

        return $this->hasMany('App\Payment', 'rentID');
    }

    public function getTotalAmountOfPayments(){

        $amount = 0;
        foreach($this->payments as $payment){
            $amount += $payment->amount;
        }
        return $amount;
    }
}
