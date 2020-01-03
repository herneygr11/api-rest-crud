<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CarController extends Controller
{
    public function __construct()
    {
        //
    }

    public function index(Request $request)
    {
        # Validacion para solo request tipo json
        if (!$request->isJson()) {
            return response()->json(['error' => 'Unauthorized'], 400);
        }

        # Recuperamos todos los Carros
        $cars = Car::all();

        # Respondemos con todos los carros
        return response()->json($cars, 200);
    } # End method index

    public function create(Request $request)
    {
        # Validacion para solo request tipo json
        if (!$request->isJson()) {
            return response()->json(['error' => 'Unauthorized'], 400);
        }

        try {
            # Concatenamos el K/H
            $request['max_speed'] = $request['max_speed'] . 'K/H';

            # Recuperamos los datos para crear el nuevo carro
            $data = $request->json()->all();

            # Creamos el nuevo carro
            $car = Car::create($data);

            # Respondemos con el carro creado
            return response()->json($car, 201);
        } catch (ModelNotFoundException $e) {
            # Error - Control
            return response()->json(['error' => 'No content'], 406);
        }
    } # End method create

    public function update(Request $request, $id)
    {
        # Validacion para solo request tipo json
        if (!$request->isJson()) {
            return response()->json(['error' => 'Unauthorized'], 400);
        }

        try {
            # Traemos el car por su id
            $car = Car::findOrFail($id);

            # Concatenamos el K/H
            $request['max_speed'] = $request['max_speed'] . 'K/H';

            # Recuperamos los datos para actualizar el nuevo carro
            $data = $request->json()->all();

            # Actualizamos el Carro
            $car->update($data);

            # Respondemos con el carro actulizado
            return response()->json($car, 201);
        } catch (ModelNotFoundException $e) {
            # Error - Control
            return response()->json(['error' => 'No content'], 406);
        }
    } # End method update

    public function delete(Request $request, $id)
    {
        # Validacion para solo request tipo json
        if (!$request->isJson()) {
            return response()->json(['error' => 'Unauthorized'], 400);
        }

        try {
            # Traemos el car por su id
            $car = Car::findOrFail($id);

            # Eliminamos el carro
            $car->delete();

            # Respondemos con el carro borrado
            return response()->json($car, 200);
        } catch (ModelNotFoundException $e) {
            # Error - Control
            return response()->json(['error' => 'No content'], 406);
        }
    } # End method delete

} # End class CarController
