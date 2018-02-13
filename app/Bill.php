<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    //
    protected $fillable =[
        'type', 'amount', 'billMonth', 'advance', 'monthAdvance', 'residue', 'monthResidue'
    ];

    protected $guarded = [
        'paymentDate', 'tenantID'
    ];

    protected $softDelete = true;

    public function tenant(){

        return $this->belongsTo('App\Tenant', 'tenantID');
    }
}
