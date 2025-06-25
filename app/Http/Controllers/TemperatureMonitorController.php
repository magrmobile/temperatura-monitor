<?php

namespace App\Http\Controllers;

use App\Models\Temperature;
use Illuminate\Http\Request;

class TemperatureMonitorController extends Controller
{
    public function index()
    {
        $temps = Temperature::latest()->take(50)->get();
        return view('monitor', compact('temps'));
    }
}
