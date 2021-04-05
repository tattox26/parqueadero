<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{Parkings,ParkingDetails,DocumentTypes};
class QuotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getQuoat(Request $request)
    {
        $parkings = Parkings::whereId($request->parking)->first();
        $parkingDetails = ParkingDetails::where('parking_id',$request->parking)->get();   
        $documentTypes = DocumentTypes::all();      
        return view('quota',['parkings'=>$parkings,'parkingDetails' => $parkingDetails, 'documentTypes'=>$documentTypes]) ;
    }

    public function payment(Request $request)
    {
        return view('payment',['placa'=>$request->placa,'tipo'=>$request->tipo,'identificacion'=>$request->identificacion]) ;
    }

    public function price(Request $request)
    {
        //dd($request->all() );
        //$parkings = Parkings::whereId($request->parking)->first();
        //$parkingDetails = ParkingDetails::where('parking_id',$request->parking)->get();      
        //dd($parkings);
        return view('price') ;
    }
}
