<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Http\Requests\TenantRequest;
use App\Rent;
use App\Tenant;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mpdf\MpdfException;

class TenantController extends Controller
{
    //
    public function _construct(){

        return $this->middleware('auth');
    }

    //Liste des locataires d'un bailleur
    public function index(){

        $user = Auth::user();
        $user->load(['buildings', 'apartments', 'tenant']);
    }

    public function create(){

    }

    //Créer un locataire
    public function store(TenantRequest $request, Apartment $apartment){

        $apartment->tenant()->create([
            'lastName' => $request->lastName,
            'firstName' => $request->firstName,
            'email' => $request->email,
            'cniNumber' => $request->cniNumber,
            'profession' => $request->profession,
            'phoneNumber' => $request->phoneNumber,
            'maritalStatus' => $request->maritalStatus,
            'tenureDate' => $request->tenureDate
        ]);

    }

    public function show(Tenant $tenant){

        Tenant::findOrFail($tenant->id);
    }

    public function edit(){

    }

    public function update(TenantRequest $request, Tenant $tenant){

        $tenant->update([
            'lastName' => $request->lastName,
            'firstName' => $request->firstName,
            'email' => $request->email,
            'cniNumber' => $request->cniNumber,
            'profession' => $request->profession,
            'phoneNumber' => $request->phoneNumber,
            'maritalStatus' => $request->maritalStatus,
        ]);
    }

    public function destroy(Tenant $tenant){

        $apartment = $tenant->apartment;
        $apartment->tenant()->dissociate;
        $tenant->delete();
    }

    public function addTenantView(Apartment $apartment){
        return view('apartments.addTenant', compact('apartment'));
    }

    public function addTenant(TenantRequest $request, Apartment $apartment){

        $apartment = Apartment::findOrFail($apartment->id);

        if(!is_null($request->mister))  $civility = $request->mister;
        if(!is_null($request->miss))  $civility = $request->miss;
        if(!is_null($request->maried))  $maritalStatus = $request->maried;
        if(!is_null($request->single))  $maritalStatus = $request->single;
        $tenant = Tenant::create([
            'civility' => $civility,
            'lastName' => $request->lastName,
            'firstName' => $request->firstName,
            'email' => $request->email,
            'cniNumber' => $request->cniNumber,
            'profession' => $request->profession,
            'phoneNumber' => $request->phoneNumber,
            'tenureDate' => $request->tenureDate,
            'maritalStatus' => $maritalStatus,
            'caution' => $request->caution,
            'apartmentID' => $apartment->id
        ]);

        $advance = $request->advance;
        $currentMonth = new \DateTime();
        for($i=1; $i<=$advance; $i++){
            $j = $i-1;
            try {
                Rent::create([
                    'amount' => $apartment->monthlyRent,
                    'paymentDate' => $tenant->tenureDate,
                    'rentMonth' => ($currentMonth->add(new \DateInterval('P' . $j . 'M')))->format('Y-m-d'),
                    'tenantID' => $tenant->id,
                    'apartmentID' => $apartment->id
                ]);
            } catch (\Exception $e) {           // todo Add redirection to view errors and delete the tenant created
            }
        }

        $civility = $tenant->civility;
        $caution = $tenant->caution;
        $tenantFirstName = $tenant->firstName;
        $tenantLastName = $tenant->lastName;
        $tenureDate = new \DateTime($tenant->tenureDate);
        $contract = view('documents.contract', compact('apartment', 'caution', 'advance',
            'tenantFirstName', 'tenantLastName', 'tenureDate', 'civility'));

        try {
            $mpdf = new \Mpdf\Mpdf();
            $mpdf->WriteHTML($contract);

            $filename = 'Contrat+'.$tenantLastName.'+'.$tenantFirstName.'.pdf';
            $mpdf->Output(storage_path('app/').$filename, \Mpdf\Output\Destination::FILE);
            $mpdf->Output($filename, \Mpdf\Output\Destination::DOWNLOAD);
            return redirect('/apartments');

        } catch (MpdfException $e) {
            $tenant->delete();
            return "Une erreur est survenue lors de la génération du contrat de bail";
        }

    }
}
