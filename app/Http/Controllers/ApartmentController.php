<?php

namespace App\Http\Controllers;

use App\Apartment;
use Illuminate\Http\Request;

class ApartmentController extends Controller
{
    //
    public function _construct(){

        $this->middleware('auth');
    }

    //Liste de tous les appartements
    public function index(){

        Apartment::all();
    }

    //Créer un appartement
    public function create(array $data, int $buildingID){

        Apartment::create([
            'apartmentNumber'=> $data['apartmentNumber'],
            'monthlyRent' => $data['monthlyRent'],
            'livingRoomsNumber' => $data['livingRoomsNumber'],
            'kitchensNumber' => $data['kitchensNumber'],
            'bedroomsNumber' => $data['bedroomsNumber'],
            'bathroomsNumber' => $data['bathroomsNumber'],
            'buildingID' => $buildingID
        ]);
    }

    //Modifier un appartement
    /*public function update(array $data , int $id){

        $apartment = Apartment::findOrFail($id);
        $apartment->apartmentNumber =
    }*/

    //Supprimer un appartement
    public function delete(int $id){

        Apartment::destroy($id);
    }
}
