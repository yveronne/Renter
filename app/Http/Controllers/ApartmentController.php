<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Building;
use App\Http\Requests\ApartmentRequest;
use App\Http\Requests\TenantRequest;
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

    public function create(){

    }

    public function store(ApartmentRequest $request, $id){

        $building = Building::findOrFail($id);
        Apartment::create([
            'apartmentNumber' => $request->apartmentNumber,
            'monthlyRent' => $request->monthlyRent,
            'livingRoomsNumber' => $request->livingRoomsNumber,
            'kitchensNumber' => $request->kitchensNumber,
            'bedroomsNumber' => $request->bedroomsNumber,
            'bathroomsNumber' => $request->bathroomsNumber,
            'buildingID' => $building->id
        ]);

        return redirect('buildings/' .$building->id)->with('status', 'L\'appartement a bien été ajouté');
    }

    public function show(Apartment $apartment){

        $apartment = Apartment::findOrFail($apartment->id);
        return view('apartments.apartmentDetails', compact('apartment'));
    }

    public function edit(){

    }

    public function update(ApartmentRequest $request, Apartment $apartment){

        $apartment->update([
            'apartmentNumber' => $request->apartmentNumber,
            'monthlyRent' => $request->monthlyRent,
            'livingRoomsNumber' => $request->livingRoomsNumber,
            'kitchensNumber' => $request->kitchensNumber,
            'bedroomsNumber' => $request->bedroomsNumber,
            'bathroomsNumber' => $request->bathroomsNumber
        ]);
    }

    public function destroy(Apartment $apartment){
        $apartment = Apartment::whereKey($apartment->id);
        Apartment::destroy($apartment->id);
    }

    public function addTenantView(Apartment $apartment){
        return view('apartments.addTenant', compact('apartment'));
    }

    public function addTenant(TenantRequest $request, Apartment $apartment){

    }
}
