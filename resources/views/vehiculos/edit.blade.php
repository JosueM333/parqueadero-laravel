@extends('layouts.app')

@section('titulo', 'Editar Vehículo')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-warning text-dark">
                <h4 class="mb-0">Editar Datos del Vehículo</h4>
            </div>
            <div class="card-body">
                
                <form action="{{ route('vehiculos.update', $vehiculo) }}" method="POST">
                    @csrf
                    @method('PUT') <div class="mb-3">
                        <label class="form-label fw-bold">Placa *</label>
                        <input type="text" name="placa" class="form-control" 
                               value="{{ $vehiculo->placa }}" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Tipo *</label>
                        <select name="tipo" class="form-select" required>
                            <option value="Automóvil" {{ $vehiculo->tipo == 'Automóvil' ? 'selected' : '' }}>Automóvil</option>
                            <option value="Motocicleta" {{ $vehiculo->tipo == 'Motocicleta' ? 'selected' : '' }}>Motocicleta</option>
                            <option value="Camioneta" {{ $vehiculo->tipo == 'Camioneta' ? 'selected' : '' }}>Camioneta</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Propietario</label>
                        <input type="text" name="propietario" class="form-control" 
                               value="{{ $vehiculo->propietario }}">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Observaciones</label>
                        <textarea name="observaciones" class="form-control" rows="2">{{ $vehiculo->observaciones }}</textarea>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-warning">Actualizar Datos</button>
                        <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection