<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Auth;
use App\Models\{Parkings,ParkingDetails,DocumentTypes,Clients,Quotas,Rates,HourDetails,Bills};
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
        $parkingDetails = ParkingDetails::where('parking_id',$request->parking)->get();   
        $documentTypes = DocumentTypes::all();      
        return view('quota',['parking_id'=>$request->parking,'parkingDetails' => $parkingDetails, 'documentTypes'=>$documentTypes]) ;
    }

    public function payment(Request $request)
    {   
        return view('payment',['placa'=>$request->placa,'tipo'=>$request->tipo,'identificacion'=>$request->identificacion,'parking_id'=>$request->parking_id,'piso'=>$request->piso]) ;
    }

    public function price(Request $request)
    {
        
        $hourDetails = HourDetails::where('parking_id',$request->parking_id)->first();
        $rates = Rates::whereId($hourDetails['rate_id'])->first();
        $now = new \DateTime();
        $fecha_actual =  $now->format('d-m-Y H:i:s');
        $userId = Auth::id();
        $exist = Clients::where('user_id',$userId)->count();
        if($exist != 0){
            $client = new Clients();
            $client->user_id = $userId;
            $client->payment_type_id  = 2;
            $client->placa= $request->placa;
            $client->save();

            $quotas = new Quotas();
            $quotas->parking_detail_id = $request->parking_id;
            $quotas->client_id  = $client->id;
            $quotas->employee_id   = 1;
            $quotas->fecha_entrada_cup = $now;
            $quotas->save();
        }
        return view('price',['fecha_actual'=>$fecha_actual,'precio'=> $rates->precio_tar]) ;
    }

    public function finish(Request $request){
        $bills = new Bills();
        $bills->precio_salida_fac = $request->priceFinish;
        $bills->save();

        Auth::logout();
        return redirect('/login');      
    }
}
