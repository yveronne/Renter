<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Payment extends Model    //todo Add payment request
{
    use SoftDeletes;

    protected $fillable = [
        'amount', 'paymentDate', 'rentID'
    ];

    public function rent(){

        return $this->belongsTo('App\Rent', 'rentID');
    }
}
