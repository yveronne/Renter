<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rent extends Model
{
    //
    use SoftDeletes;
    protected $fillable = [
        'amount', 'rentMonth', 'advance', 'monthAdvance', 'residue', 'monthResidue',
        'paymentDate', 'tenantID'
    ];


    protected $dates = ['deleted_at'];

    public function tenant(){

        return $this->belongsTo('App\Tenant', 'tenantID');
    }
}
