<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request; 

class Vehiculo extends Model
{
    
    protected $table = 'vehiculos';

   
    protected $fillable = [
        'placa',
        'tipo',
        'propietario',
        'observaciones'
    ];

    

    static public function getVehiculos()
    {
        return self::all(); 
    }

    
    static public function getVehiculosById($id)
    {
        return self::find($id);
    }

    
    static public function createVehiculo(Request $request)
    {
        return self::create($request->all());
    }

   
    static public function updateVehiculo(Request $request, Vehiculo $vehiculo)
    {
        return $vehiculo->update($request->all());
    }

    
    static public function deleteVehiculo(Vehiculo $vehiculo)
    {
        return $vehiculo->delete();
    }
}