<?php

namespace App\Http\Controllers;

use App\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::all()->sortByDesc('paymentDate');
        $buildings = Auth::user()->buildings;
        $latestPayments = array();
        foreach($payments as $payment){
            if($payment->rent->apartment->building->renter->id == Auth::user()->id){
                array_push($latestPayments, $payment);
                if(sizeof($latestPayments) == 8)    break;
            }
        }
        return view('home', compact('latestPayments', 'buildings'));
    }
}
