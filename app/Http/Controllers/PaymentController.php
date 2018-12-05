<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentRequest;
use App\Payment;
use App\Rent;
use App\Tenant;

class PaymentController extends Controller
{
    //
    public function addPayment(PaymentRequest $request, Tenant $tenant)
    {
        $amount = $request['amount'];
        $tenant = Tenant::findOrFail($tenant->id);
        $date = $request['date'];
        $monthlyRent = $tenant->apartment->monthlyRent;
        $uncompletedRents = $tenant->rents->where('apartmentID', $tenant->apartment->id)
            ->where('settled', false)->sortBy('id');

        while ($amount > 0) {
            while ($tenant->getUncompletedRents() > 0) {
                foreach ($uncompletedRents as $rent) {
                    $left = $monthlyRent - $rent->getTotalAmountOfPayments();
                    if ($left <= $amount) {
                        $amount -= $left;

                        $rent->settled = true;
                        $rent->save();

                        Payment::create([
                            'amount' => $left,
                            'rentID' => $rent->id,
                            'paymentDate' => (new \DateTime($date))->format('Y-m-d')
                        ]);
                    }
                    else {
                        $rent->settled = false;
                        $rent->save();

                        Payment::create([
                            'amount' => $amount,
                            'rentID' => $rent->id,
                            'paymentDate' => (new \DateTime($date))->format('Y-m-d')
                        ]);
                        break 3;
                    }
                }
            }
            $lastRentPaid = (new \DateTime($tenant->getLastRent()->rentMonth));
            while($amount > 0){
                $rent = Rent::create([
                    'rentMonth' => ($lastRentPaid->add(new \DateInterval('P1M')))->format('Y-m-d'),
                    'tenantID' => $tenant->id,
                    'apartmentID' => $tenant->apartment->id
                ]);
                if($amount >= $monthlyRent){
                    Payment::create([
                        'amount' => $monthlyRent,
                        'paymentDate' => (new \DateTime($date))->format('Y-m-d'),
                        'rentID' => $rent->id
                    ]);
                    $rent->settled = true;
                    $rent->save();
                    $amount -= $monthlyRent;
                }
                else{
                    Payment::create([
                        'amount' => $amount,
                        'paymentDate' => (new \DateTime($date))->format('Y-m-d'),
                        'rentID' => $rent->id
                    ]);
                    break 2;
                }

            }
        }
        return redirect('/tenants/details/'.$tenant->id)->with('status', 'Le paiement a correctement été enregistré');
    }
}
