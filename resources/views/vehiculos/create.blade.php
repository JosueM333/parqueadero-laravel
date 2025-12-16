@extends('layouts.app')

@section('titulo', 'Registrar Ingreso')

@section('contenido')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Registrar Nuevo Ingreso</h4>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('vehiculos.store') }}" method="POST">
                    @csrf <div class="mb-3">
                        <label class="form-label fw-bold">Placa *</label>
                        <input type="text" name="placa" class="form-control form-control-lg text-uppercase" 
                               placeholder="ABC-1234" required>
                        <div class="form-text">Ingrese la placa sin guiones o con ellos.</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-bold">Tipo de Vehículo *</label>
                        <select name="tipo" class="form-select" required>
                            <option value="">Seleccione...</option>
                            <option value="Automóvil">Automóvil</option>
                            <option value="Motocicleta">Motocicleta</option>
                            <option value="Camioneta">Camioneta</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nombre del Propietario</label>
                        <input type="text" name="propietario" class="form-control" placeholder="Opcional">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Observaciones</label>
                        <textarea name="observaciones" class="form-control" rows="2" 
                                  placeholder="Ej: Rayón en puerta derecha..."></textarea>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary btn-lg">Registrar Entrada</button>
                        <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection