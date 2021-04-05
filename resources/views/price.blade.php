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
                                </h1>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-lg btn-success" value="Pagar">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label><h1>Minuto:</h1></label>
                        </div>
                        <div class="form-group">
                            <label><h1>Hora:</h1></label>
                        </div>
                    </div>        
                </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
<script>
    //create variables for each time entity
var centesimas = 0; //hundreds
var segundos = 0; //seconds
var minutos = 0; // minutes
var horas = 0; //hours

//function that makes the timer start to run when the click at the "start" button
function inicio () {
	control = setInterval(cronometro,10); //it runs the "cronometro" function and set the time interval to change the time displayed every 1/10 of second
  
  //after starting the timer, do not allow the "start" and "resume" button to be clicked
	document.getElementById("inicio").disabled = true;
	document.getElementById("parar").disabled = false;
	document.getElementById("continuar").disabled = true;
	document.getElementById("reinicio").disabled = false;
}

//function that runs when the "stop" button is clicked;
function parar () {
  
  //method to make the time stop
	clearInterval(control);
  
  //it disables the "stop" button, and allow us to click at the "resume" button
	document.getElementById("parar").disabled = true;
	document.getElementById("continuar").disabled = false;
}

//function that happen when we click at the "reset" button
function reinicio () {
  
  //method to make the time stop
	clearInterval(control);
  
  //it reset all the time variables to 0
	centesimas = 0;
	segundos = 0;
	minutos = 0;
	horas = 0;
  
  //the time values showed at the page are set
	Centesimas.innerHTML = ":00";
	Segundos.innerHTML = ":00";
	Minutos.innerHTML = ":00";
	Horas.innerHTML = "00";
  
  //it gives the disabled button status
	document.getElementById("inicio").disabled = false;
	document.getElementById("parar").disabled = true;
	document.getElementById("continuar").disabled = true;
	document.getElementById("reinicio").disabled = true;
}

//this is the main function, it manages the cronometer running functionality
function cronometro () {
  
//define the maximum number for the hundreds  
	if (centesimas < 99) {
		centesimas++;
  
//adds a 0 before the hundreds when it is between 1 and 9
		if (centesimas < 10) { centesimas = "0"+centesimas }
		Centesimas.innerHTML = ":"+centesimas;
	}
  
//when the hundreds arrives at 99 it is reset to 0 and the "second" value is increased in 1
	if (centesimas == 99) {
		centesimas = -1
	}
	if (centesimas == 0) {
		segundos ++;
    
  // adds a 0 before the "seconds" value, if it is between 0 and 9
		if (segundos < 10) { segundos = "0"+segundos }
		Segundos.innerHTML = ":"+segundos;
	}
  
  //every time the "seconds" value arrives in 59, reset it to 0
	if (segundos == 59) {
		segundos = -1;
	}
  
  //every time the seconds and hundreds of second value arrives are equal to 0, add 1 to the minutes value
	if ( (centesimas == 0)&&(segundos == 0) ) {
		minutos++;
    
//add a 0 before the minutes value if it is between 0 and 9
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
</script>