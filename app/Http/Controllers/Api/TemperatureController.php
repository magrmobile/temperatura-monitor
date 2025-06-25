<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Temperature;
use Illuminate\Http\Request;

class TemperatureController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'valor' => 'required|numeric', // Validating temperature value
        ]);

        $temp = Temperature::create([
            'valor' => $request->valor,
        ]);

        return response()->json(['success' => true, 'id' => $temp->id]);
    }
}
