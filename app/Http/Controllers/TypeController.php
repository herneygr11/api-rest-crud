<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class TypeController extends Controller
{

    public function __construct()
    {
        //
    } # End method __construct

    public function index(Request $request)
    {
        # Validacion para solo request tipo json
        if (!$request->isJson()) {
            return response()->json(['error' => 'Unauthorized'], 400);
        }

        # Recuperamos todos los tipos
        $types = Type::all();

        # Respondemos con todos los tipos
        return response()->json($types, 200);
    } # End method index

    public function create(Request $request)
    {
        # Validacion para solo request tipo json
        if (!$request->isJson()) {
            return response()->json(['error' => 'Unauthorized'], 400);
        }

        try {
            # Recuperamos los datos para crear el nuevo tipo
            $data = $request->json()->all();

            # Creamos el nuevo tipo
            $type = Type::create($data);

            # Respondemos con el tipo creado
            return response()->json($type, 201);
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
            # Traemos el tipo por su id
            $type = Type::findOrFail($id);

            # Recuperamos los datos actualizar el tipo
            $data = $request->json()->all();

            # Actualizamos el tipo
            $type->update($data);

            # Respondemos el tipo actualizado
            return response()->json($type, 200);
        } catch (ModelNotFoundException $e) {
            # Error - Control
            return response()->json(['error' => 'No content'], 406);
        }
    } # End method update

    public function delete(Request $request, $id)
    {
        # Validacion para solo request tipo json
        if (!$request->isJson()) {
            return response()->json(['error' => 'Unauthorized']);
        }

        try {
            # Traemos el tipo por su id
            $type = Type::findOrFail($id);

            # Eliminamos el tipo
            $type->delete();

            #Respondemos con el tipo borrado
            return response()->json($type, 200);
        } catch (ModelNotFoundException $e) {
            # Error - Control
            return response()->json(['error' =>  'No content'], 406);
        }
    } # End method delete

} # End class TypeController
