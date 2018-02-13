<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    //
    protected $fillable = [
        'amount', 'rentMonth', 'advance', 'monthAdvance', 'residue', 'monthResidue',
    ];

    protected $guarded = [
        'paymentDate', 'tenantID'
    ];

    protected $softDelete = true;

    public function tenant(){

        return $this->belongsTo('App\Tenant', 'tenantID');
    }
}
