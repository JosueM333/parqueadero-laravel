<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;
use Carbon\Carbon; 

class VehiculoController extends Controller
{
    
    public function index()
    {
        $vehiculos = Vehiculo::all(); 
        return view('vehiculos.index', compact('vehiculos'));
    }

    
    public function create()
    {
        return view('vehiculos.create');
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'placa' => 'required|max:10',
            'tipo' => 'required',
        ]);

        Vehiculo::createVehiculo($request);

        return redirect()->route('vehiculos.index')
            ->with('success', 'Vehículo registrado exitosamente.');
    }

    public function edit(Vehiculo $vehiculo)
    {
        return view('vehiculos.edit', compact('vehiculo'));
    }

    public function update(Request $request, Vehiculo $vehiculo)
    {
        $request->validate([
            'placa' => 'required|max:10',
            'tipo' => 'required',
        ]);

        $vehiculo->update($request->all());

        return redirect()->route('vehiculos.index')
            ->with('success', 'Datos del vehículo actualizados.');
    }


    public function destroy(Vehiculo $vehiculo)
    {
      
        $entrada = $vehiculo->created_at; 
        $salida = now(); 
        
       
    
   
        $horas = $entrada->diffInHours($salida);
        $minutosExtra = $entrada->diffInMinutes($salida) % 60;
        
        if ($minutosExtra > 0 || $horas == 0) {
            $horas++; 
        }

        
        $totalPagar = $horas * 5;

        
        $vehiculo->delete();

        
        return redirect()->route('vehiculos.index')
            ->with('success', "Salida registrada. Tiempo: $horas horas. Total a pagar: $$totalPagar");
    }
}