<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PredictionController extends Controller
{
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

        // $response = Http::post(
        //     config('services.ml_api.url') . '/predict',
        //     $validated
        // );

        $response = Http::post(
            'https://itsdrsw-diabetes-randomforest.hf.space/predict',
            $request->all()
        )->json();

        if ($response->failed()) {
            return response()->json([
                'success' => false,
                'message' => 'ML API error'
            ], 500);
        }

        return response()->json([
            'success' => true,
            'prediction' => $response['prediction'],
            'label' => $response['label'],
            'probability' => $response['probability'],
            'risk_level' => $response['risk_level'],
            'threshold' => $response['threshold'] ?? null
        ]);
    }
}
