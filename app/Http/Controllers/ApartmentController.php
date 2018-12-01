<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Building;
use App\Http\Requests\ApartmentRequest;
use App\Http\Requests\TenantRequest;
use App\Tenant;
use Illuminate\Support\Facades\Auth;

class ApartmentController extends Controller
{
    //
    public function _construct(){

        return $this->middleware('auth');
    }

    //Liste des appartements de l'utilisateur
    public function index(){

        $buildings = Building::all();
        return view('apartments.apartments', compact('buildings'));
    }

    public function show(Apartment $apartment){

        $apartment = Apartment::findOrFail($apartment->id);
        $tenant = $apartment->getCurrentTenant();
        return view('apartments.apartmentDetails', compact('apartment', 'tenant'));
    }


    public function update(Apartment $apartment, ApartmentRequest $request){
        $apartment = Apartment::findOrFail($apartment->id);
        $apartment->update([
            'apartmentNumber' => $request->apartmentNumber,
            'monthlyRent' => $request->monthlyRent,
            'livingRoomsNumber' => $request->livingRoomsNumber,
            'kitchensNumber' => $request->kitchensNumber,
            'bedroomsNumber' => $request->bedroomsNumber,
            'bathroomsNumber' => $request->bathroomsNumber
        ]);
        return redirect('/apartments/'.$apartment->id)->with('status', 'Les modifications ont bien été enregistrées.');

    }

    public function destroy(Apartment $apartment){
        $apartment = Apartment::whereKey($apartment->id);
        Apartment::destroy($apartment->id);
    }

    public function removeTenant(Apartment $apartment){

        $apartment = Apartment::findOrFail($apartment->id);
        $apartment->currentTenantID = null;
        $apartment->save();
        return redirect('/apartments/'.$apartment->id)->with('status', 'Le locataire a bien été retiré');
    }

}
