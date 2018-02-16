<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Http\Requests\ApartmentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApartmentController extends Controller
{
    //
    public function _construct(){

        return $this->middleware('auth');
    }

    public function index(){

        /*$apartments = [];
        $buildings = Auth::user()->buildings;

        return view('apartments', compact('apartments'));*/
    }

    //Créer à partir d'une propriété (argument id présent et on va envoyer ça à la vue)
    //ou alors créer à partir de rien et on va envoyer la liste des propriétés à la vue
    public function create(){

    }

    public function store(ApartmentRequest $request){

        Apartment::create([
            'apartmentNumber' => $request->apartmentNumber,
            'monthlyRent' => $request->monthlyRent,
            'livingRoomsNumber' => $request->livingRoomsNumber,
            'kitchensNumber' => $request->kitchensNumber,
            'bedroomsNumber' => $request->bedroomsNumber,
            'bathroomsNumber' => $request->bathroomsNumber,
            'buildingID' => $request->buildingID
        ]);
    }
}
