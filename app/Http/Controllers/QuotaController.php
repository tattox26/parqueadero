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
    public function getQuoat(Request $request){
        $parkingDetails = ParkingDetails::where('parking_id',$request->parking)->get();   
        //dd($parkingDetails);
        $documentTypes = DocumentTypes::all();      
        return view('quota',['parking_id'=>$request->parking,'parkingDetails' => $parkingDetails, 'documentTypes'=>$documentTypes]) ;
    }

    public function payment(Request $request){   
        
        $existPark = ParkingDetails::where('id',$request->parking_id)->count();
        if($existPark != 0){
        return view('payment',['placa'=>$request->placa,'tipo'=>$request->tipo,'identificacion'=>$request->identificacion,'parking_id'=>$request->parking_id]) ;
        }else{
            return view('home') ;
        }
    }

    public function price(Request $request){
       
        $existPark = ParkingDetails::where('id',$request->parking_id)->count();
        if($existPark != 0){
            $parkingDetails = ParkingDetails::where('id',$request->parking_id)->first();
            $hourDetails = HourDetails::where('id',$request->parking_id)->first();
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

               
                $espacio_det = $parkingDetails->espacio_det;
                $espacio_det = $espacio_det-1;
                $ocupado_det = $parkingDetails->ocupado_det;
                $ocupado_det = $ocupado_det+1;
                
                ParkingDetails::where('id',$request->parking_id)->update(['espacio_det' => $espacio_det, 'ocupado_det' => $ocupado_det]); 
            }else{

            }
            return view('price',['parkingDetails' => $request->parking_id ,'fecha_actual'=>$fecha_actual,'precio'=> $rates->precio_tar]) ;
        }else{
            return view('home') ;
        }
    }

    public function finish(Request $request){
        
        $parkingDetails = ParkingDetails::where('id',$request->parkingDetails)->first();
        $espacio_det = $parkingDetails->espacio_det;
        $espacio_det = $espacio_det+1;
        $ocupado_det = $parkingDetails->ocupado_det;
        $ocupado_det = $ocupado_det-1;
        
        ParkingDetails::where('id',$parkingDetails->id)->update(['espacio_det' => $espacio_det, 'ocupado_det' => $ocupado_det]); 

        $bills = new Bills();
        $bills->precio_salida_fac = $request->priceFinish;
        $bills->save();

        Auth::logout();
        return redirect('/login');      
    }
}
