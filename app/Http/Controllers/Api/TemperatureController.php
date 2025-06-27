<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Temperature;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TemperatureController extends Controller
{
    /*public function store(Request $request)
    {
        $request->validate([
            'valor' => 'required|numeric', // Validating temperature value
        ]);

        try {
            $temp = Temperature::create([
                'valor' => $request->valor,
            ]);

            return response()->json(['success' => true, 'id' => $temp->id]);
        } catch (Exception $e) {
            Log::error("Error al guardar temperatura: " . $e->getMessage());
            return response()->json(['error' => 'No se pudo guardar la temperatura'], 500);
        }
    }*/

    public function store(Request $request)
    {
        Log::info('Headers:', $request->headers->all());
        Log::info('Raw content:', [$request->getContent()]);
        Log::info('Datos recibidos:', $request->all());

        return response()->json(['ok' => true]);
    }
}
