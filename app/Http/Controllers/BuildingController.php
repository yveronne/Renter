<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Building;
use App\Http\Requests\ApartmentRequest;
use App\Http\Requests\BuildingRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuildingController extends Controller
{

    public function _construct(){

        $this->middleware('auth');
    }

    public function index()
    {
        //
        $buildings = Auth::user()->buildings;
        return view('buildings.buildings', compact('buildings'));
    }


    public function store(BuildingRequest $request)
    {
        $user = Auth::user();

        $user->buildings()->create([
            'buildingName' => $request->buildingName,
            'buildingLocation' => $request->buildingLocation,
            'floorsNumber' => $request->floorsNumber
        ]);

        return redirect('/buildings')->with('status' , 'Votre propriété a bien été créée');
    }


    public function show(Building $building)
    {
        //
        $building = Building::findOrFail($building->id);
        return view('buildings.buildingDetails', compact('building'));

    }


    public function update(Building $building, BuildingRequest $request)
    {

        $building = Building::findOrFail($building->id);
        $building->update([
            'buildingName' => $request->buildingName,
            'buildingLocation' => $request->buildingLocation,
            'floorsNumber' => $request->floorsNumber,
        ]);

        return redirect('buildings/' .$building->id)->with('status', 'Vos modifications ont bien été enregistrées');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function destroy(Building $building)
    {
        Building::destroy($building->id);

        return redirect('buildings')->with('status', 'La propriété a bien été supprimée');
    }

    public function addApartmentView(Building $building){

        $building = Building::findOrFail($building->id);
        return view('buildings.addApartment', compact('building'));
    }

    public function addApartment(Building $building, ApartmentRequest $request){

        $building = Building::findOrFail($building->id);
        Apartment::create([
            'apartmentNumber' => $request['apartmentNumber'],
            'monthlyRent' => $request['monthlyRent'],
            'livingRoomsNumber' => $request['livingRoomsNumber'],
            'kitchensNumber' => $request['kitchensNumber'],
            'bedroomsNumber' => $request['bedroomsNumber'],
            'bathroomsNumber' => $request['bathroomsNumber'],
            'buildingID' => $building->id
        ]);
        return redirect('/buildings/'.$building->id)->with('status', 'L\'appartement a bien été ajouté');
    }

}
