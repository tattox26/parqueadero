<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Parkings,ParkingDetails};
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $parkings = Parkings::with('parkingDetail')->get();        
        return view('home',['parkings' => $parkings]) ;
    }
}
