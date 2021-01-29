<?php

namespace App\Http\Controllers;
use App\Http\Requests\CreateHotelRequest;
use App\Http\Requests\UpdateHotelRequest;
use Illuminate\Http\Request;
Use App\Hotel;

class HotelController extends Controller
{
    //Funcion para mostrar toda la tabla de habitaciones
    public function show(Hotel $hotel)
    {
        return $hotel;
    }
    //Funcion para agregar una habitacion (validaciones se encuentran en el modelo)
    public function store(CreateHotelRequest $request)
    {
        $hotel = Hotel::create($request->all());
        return response()->json($hotel, 201);
    }
    //Funcion para modificar habitacion ya existente (validaciones se encuentran en el modelo)
    public function update(UpdateHotelRequest $request, Hotel $hotel)
    {
        $input = $request->all();
        $hotel->update($input);
        return response()->json([
            'res' => true,
            'message' => 'Registro actualizado correctamente',
            'resultado' => $hotel,
        ], 200);
    }
    //Funcion para eliminar habitacion de la BD
    public function destroy(Hotel $hotel)
    {
        $hotel->delete();
        return response()->json([
            'res' => true,
            'message' => 'Eliminado exitosamente'
        ], 200);
    }
    //Funcion para ubicar habitaciones disponibles y no disponibles
    public function dispon()
    {
        //Obtener habitaciones disponibles
        $disponible = Hotel::where('vacante','si')->get();
        //Obtener habitaciones no disponibles
        $ocupada = Hotel::where('vacante','no')->get();
        return response()->json([
            'res' => true,
            'mensaje1'  =>  'Habitaciones Vacantes',
            'result1'   =>  $disponible,
            'mensaje2'  =>  'Habitaciones Ocupadas',
            'result2'   =>  $ocupada
        ], 200);
    }
}
