@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header bg-primary"><center>Parqueaderos disponibles</center></div>
                <div class="card-body">                                
                    @foreach($parkingDetails as $parkingDetail)
                    <div class="card">    
                        <div class="card-header bg-primary"><center>Piso {{ $parkingDetail->piso_det }}</center></div>
                            <div class="card-body">   
                            @for($i=0;$i<$parkingDetail->total_det;$i++)
                                @if($i<$parkingDetail->espacio_det  )
                                    <button type="button" onclick="parqueadero('{{$parkingDetail->piso_det}}')" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                                    disponible
                                    </button>
                                @else
                                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                    ocupado
                                    </button>
                                @endif 
                            @endfor
                            </div>
                        
                    </div>
                    @endforeach
                   
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="{{ route('payment') }}"> 
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                <input type="hidden" name="parking_id" value="{{ $parking_id }}" />
                <input type="hidden" name="piso" id="piso"/>
                
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label>Placa:</label>
                    <input type="text" maxlength="6" class="form-control" name="placa" id="placa" required>
                </div>
                <div class="form-group">
                    <label>Tipo de identificación:</label>
                    <select class="form-control" name="tipo" id="tipo">
                        @foreach($documentTypes as $documentType)
                            <option value="{{ $documentType->id }}">{{ $documentType->nombre_doc }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label>Numero de identificación:</label>
                    <input type="text" maxlength="15" class="form-control" name="identificacion" id="identificacion" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');"  required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <input type="submit" class="btn btn-primary" value="Guardar datos">
            </div>
            </form>
        </div>
    </div>
</div>

@endsection
<script>
    function parqueadero(piso){
        document.getElementById('piso').value =piso
    }
</script>