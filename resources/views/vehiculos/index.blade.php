@extends('layouts.app')
@section('titulo', 'Vehículos Estacionados')
@section('contenido')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Vehículos in the Park</h1>
    <a href="{{ route('vehiculos.create') }}" class="btn btn-primary btn-lg">+ Ingresar Vehículo</a>
</div>

<div class="card shadow-sm">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Placa</th>
                        <th>Tipo</th>
                        <th>Propietario</th>
                        <th>Hora Ingreso</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($vehiculos as $vehiculo)
                    <tr>
                        <td class="fw-bold">{{ $vehiculo->placa }}</td>
                        <td>
                            @if($vehiculo->tipo == 'Automóvil')
                                <span class="badge bg-success">Automóvil</span>
                            @elseif($vehiculo->tipo == 'Motocicleta')
                                <span class="badge bg-warning text-dark">Moto</span>
                            @else
                                <span class="badge bg-info text-dark">{{ $vehiculo->tipo }}</span>
                            @endif
                        </td>
                        <td>{{ $vehiculo->propietario ?? 'No registrado' }}</td>
                        <td>{{ $vehiculo->created_at->format('d/m/Y h:i A') }}</td>
                        <td class="text-center">
                            
                            <a href="{{ route('vehiculos.edit', $vehiculo) }}" class="btn btn-sm btn-outline-secondary">
                                Editar
                            </a>

                            <form action="{{ route('vehiculos.destroy', $vehiculo) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger ms-1" 
                                        onclick="return confirm('¿Confirmar salida del vehículo {{ $vehiculo->placa }}? Se calculará el cobro.')">
                                    Marcar Salida ($)
                                </button>
                            </form>

                        </td>
                    </tr> 
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-4 text-muted">
                            No hay absolutamente nada.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection