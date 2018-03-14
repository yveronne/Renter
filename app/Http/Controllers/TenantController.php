<?php

namespace App\Http\Controllers;

use App\Apartment;
use App\Http\Requests\TenantRequest;
use App\Tenant;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
