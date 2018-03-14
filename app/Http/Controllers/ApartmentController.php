<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Building;
use App\Http\Requests\ApartmentRequest;
use Illuminate\Support\Facades\Auth;

class ApartmentController extends Controller
{
    //
    public function _construct(){

        return $this->middleware('auth');
    }

    //Liste des appartements de l'utilisateur
    public function index(){

        Auth::user()->buildings->apartments;
    }

    //Liste des appartements d'une propriété de l'utilisateur
    public function apartmentList(Building $building){

        $building->apartments;
    }

    //Créer à partir d'une propriété (argument id présent et on va envoyer ça à la vue)
    //ou alors créer à partir de rien et on va envoyer la liste des propriétés à la vue
    public function create(){

    }

    public function store(ApartmentRequest $request, Building $building){

        $building->apartments()->create([
            'apartmentNumber' => $request->apartmentNumber,
            'monthlyRent' => $request->monthlyRent,
            'livingRoomsNumber' => $request->livingRoomsNumber,
            'kitchensNumber' => $request->kitchensNumber,
            'bedroomsNumber' => $request->bedroomsNumber,
            'bathroomsNumber' => $request->bathroomsNumber,
        ]);
    }

    public function show(Apartment $apartment){

        Apartment::findOrFail($apartment->id);
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

        $apartment->delete();
    }
}
