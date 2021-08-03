@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header bg-primary"><center>Tiempo</center></div>
                <div class="card-body"> 
                <div class="row">                               
                    <div class="col-md-5 offset-2">
                        <div class="form-group">
                            <div id="contenedor">
                                <h1>
                                    <span id="Horas">00</span>
                                    <span  id="Minutos">:00</span>
                                    <span id="Segundos">:00</span>
                                    <span id="Centesimas">:00</span>
                                </h1>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" onclick="parar()" class="btn btn-lg btn-success" value="Pagar">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label><h1>Minuto: $<span id="precio">{{ $precio }}</span> </h1></label>
                        </div>
                        <div class="form-group">
                            <label><h1>Hora: ${{ $precio*60 }}</h1></label>
                        </div>
                    </div>   
                    
                    <div class="col-md-10 offset-2" id="total">
                        <div class="form-group" >
                            <label><h1>Total a pagar: $<span id="totalPago"><span> </h1></label><br>
                            <form method="post" action="{{ route('finish') }}"> 
                                <input type="hidden" name="_token" value="{{ csrf_token() }}" /> 
                                <input type="hidden" name="priceFinish" id="priceFinish"/>
                                <input type="hidden" name="parkingDetails" id="parkingDetails" value="{{ $parkingDetails }}" />
                                <input type="submit" class="btn btn-lg btn-success" value="Finalizar">
                            </form>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
   $( document ).ready(function() {
        $("#total").css("display","none");
        var centesimas = 0; 
        var segundos = 0; 
        var minutos = 0; 
        var horas = 0; 
        control = setInterval(cronometro,10); 
        
        function reinicio () {
            clearInterval(control);
            centesimas = 0;
            segundos = 0;
            minutos = 0;
            horas = 0;
            Centesimas.innerHTML = ":00";
            Segundos.innerHTML = ":00";
            Minutos.innerHTML = ":00";
            Horas.innerHTML = "00";
            document.getElementById("inicio").disabled = false;
            document.getElementById("parar").disabled = true;
            document.getElementById("continuar").disabled = true;
            document.getElementById("reinicio").disabled = true;
        }
        function cronometro () {
        
            if (centesimas < 99) {
                centesimas++;
                if (centesimas < 10) { centesimas = "0"+centesimas }
                Centesimas.innerHTML = ":"+centesimas;
            }
        
            if (centesimas == 99) {
                centesimas = -1
            }
            if (centesimas == 0) {
                segundos ++;
        
                if (segundos < 10) { segundos = "0"+segundos }
                Segundos.innerHTML = ":"+segundos;
            }
        
            if (segundos == 59) {
                segundos = -1;
            }
        
            if ( (centesimas == 0)&&(segundos == 0) ) {
                minutos++;
            
                if (minutos < 10) { minutos = "0"+minutos }
                Minutos.innerHTML = ":"+minutos;
            }
            if (minutos == 59) {
                minutos = -1;
            }
            if ( (centesimas == 0)&&(segundos == 0)&&(minutos == 0) ) {
                horas ++;
                if (horas < 10) { horas = "0"+horas }
                Horas.innerHTML = horas;
            }
        }
    });

    function parar() {
            clearInterval(control);
            
            var minutos = $("#Minutos").text();
            var precio = $("#precio").text();
            if(minutos == ":00"){
                console.log(0);
                $("#totalPago").text(0);
                $("#priceFinish").val(0);
            }else{
                console.log(2);
                minutos = minutos.replace(':', '');
                total = parseInt(minutos)*parseInt(precio);
                $("#totalPago").text(total);
                $("#priceFinish").val(total);
            }            
            $("#total").css("display","block"); 
        }

</script>