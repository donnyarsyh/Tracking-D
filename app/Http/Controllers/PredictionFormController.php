<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PredictionFormController extends Controller
{
    public function form()
    {
        return view('page.diabetes');
    }

    public function predict(Request $request)
    {
        $validated = $request->validate([
            'Pregnancies' => 'required|numeric',
            'Glucose' => 'required|numeric',
            'BloodPressure' => 'required|numeric',
            'SkinThickness' => 'required|numeric',
            'Insulin' => 'required|numeric',
            'BMI' => 'required|numeric',
            'DiabetesPedigreeFunction' => 'required|numeric',
            'Age' => 'required|numeric',
        ]);

        $response = Http::post(
            config('services.ml_api.url') . '/predict',
            $validated
        )->json();

        return view('page.diabetes', compact('validated', 'response'));
    }
}
