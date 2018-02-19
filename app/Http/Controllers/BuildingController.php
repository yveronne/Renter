<?php

namespace App\Http\Controllers;

use App\Building;
use App\Http\Requests\BuildingRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BuildingController extends Controller
{

    public function _construct(){

        $this->middleware('auth');
    }

    /**
     * Renvoie la liste des propriétés du bailleur authentifié
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $buildings = Auth::user()->buildings;
        return view('buildings', compact('buildings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('createBuilding');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BuildingRequest $request)
    {
        //

        $user = Auth::user();

        $user->buildings()->create([
            'buildingName' => $request->buildingName,
            'buildingLocation' => $request->buildingLocation,
            'floorsNumber' => $request->floorsNumber
        ]);

        return view('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function show(Building $building)
    {
        //
        Building::findOrFail($building->id);
        return view();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function edit(Building $building)
    {
        //
        return view();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function update(BuildingRequest $request, Building $building)
    {
        //
        $building->buildingName = $request->buildingName;
        $building->buildingLocation = $request->buildingLocation;
        $building->floorsNumber = $request->floorsNumber;
        $building->save();

        return redirect();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Building  $building
     * @return \Illuminate\Http\Response
     */
    public function destroy(Building $building)
    {
        //
        $building->delete();

        return redirect();
    }

}
