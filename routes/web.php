<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

Route::get('/', function () {
    return view('home.home');
});
Route::get('/team', function () {
    return view('team.team');
});
Route::get('/liver-disease/predictor', function () {
    return view('disease_predictor_forms.liver_disease_predictor_form');
});
Route::post('/liver-disease/predictor/get-token', function (Request $request) {
    try {
        $response = Http::asForm()->post('https://iam.cloud.ibm.com/identity/token', [
            'grant_type' => 'urn:ibm:params:oauth:grant-type:apikey',
            'apikey' => $request->input('apiKey'),
        ]);
        if ($response->failed()) {
            return response()->json(['error' => 'Failed to retrieve token'], 500);
        }
        return $response->json();
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
});

Route::post('/liver-disease/predictor/predict', function (Request $request) {
    try {
        $token = $request->input('token');
        $payload = $request->input('payload');
        $scoringUrl = 'https://us-south.ml.cloud.ibm.com/ml/v4/deployments/a2c6d2b2-7a4d-43cb-aa71-b76b0093eb9e/predictions?version=2021-05-01';
        $response = Http::withToken($token)->post($scoringUrl, $payload);
        if ($response->failed()) {
            return response()->json(['error' => 'Failed to retrieve prediction'], 500);
        }
        return $response->json();
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
});
Route::get('/liver-disease/prediction/positive/solution',function(){
    return view('content.liver-infection-positive');
});
Route::get('/liver-disease/prediction/negative/solution',function(){
    return view('content.liver-infection-negative');
});
Route::get('/kidney-stone/predictor', function () {
    return view('disease_predictor_forms.kidney_disease_predictor_form');
});
Route::post('/kidney-stone/predictor/get-token', function (Request $request) {
    try {
        $response = Http::asForm()->post('https://iam.cloud.ibm.com/identity/token', [
            'grant_type' => 'urn:ibm:params:oauth:grant-type:apikey',
            'apikey' => $request->input('apiKey'),
        ]);
        if ($response->failed()) {
            return response()->json(['error' => 'Failed to retrieve token'], 500);
        }
        return $response->json();
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
});

Route::post('/kidney-stone/predictor/predict', function (Request $request) {
    try {
        $token = $request->input('token');
        $payload = $request->input('payload');
        $scoringUrl = 'https://us-south.ml.cloud.ibm.com/ml/v4/deployments/74fc168e-9ed5-474b-a4c0-97530644baec/predictions?version=2021-05-01';
        $response = Http::withToken($token)->post($scoringUrl, $payload);
        if ($response->failed()) {
            return response()->json(['error' => 'Failed to retrieve prediction'], 500);
        }
        return $response->json();
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
});
Route::get('/kidney-stone/prediction/positive/solution',function(){
    return view('content.kidney-stone-positive');
});
Route::get('/kidney-stone/prediction/negative/solution',function(){
    return view('content.kidney-stone-negative');
});
// above two modal are working
// below all model are showing limit reached
Route::get('/stroke/predictor', function () {
    return view('disease_predictor_forms.stroke_predictor_form');
});
Route::post('/stroke/predictor/get-token', function (Request $request) {
    try {
        $response = Http::asForm()->post('https://iam.cloud.ibm.com/identity/token', [
            'grant_type' => 'urn:ibm:params:oauth:grant-type:apikey',
            'apikey' => $request->input('apiKey'),
        ]);
        if ($response->failed()) {
            return response()->json(['error' => 'Failed to retrieve token'], 500);
        }
        return $response->json();
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
});
Route::post('/stroke/predictor/predict', function (Request $request) {
    try {
        $token = $request->input('token');
        $payload = $request->input('payload');
        $scoringUrl = 'https://us-south.ml.cloud.ibm.com/ml/v4/deployments/bcd20769-c017-46b6-97f7-e48f5db2e10c/predictions?version=2021-05-01';
        $response = Http::withToken($token)->post($scoringUrl, $payload);
        if ($response->failed()) {
            Log::info($response->failed());
            return response()->json(['error' => 'This deployment cannot be processed because it exceeds the allocated capacity unit hours (CUH). Increase the compute resources for this job and try again'], 500);
        }
        return $response->json();
    } catch (\Exception $e) {
        Log::info($e->getMessage());
        return response()->json(['error' => $e->getMessage()], 500);
    }
});
Route::get('/stroke/prediction/positive/solution',function(){
    return view('content.stroke-positive');
});
Route::get('/stroke/prediction/negative/solution',function(){
    return view('content.stroke-negative');
});
Route::get('/hypertension-disease/predictor', function () {
    return view('disease_predictor_forms.hypertension_disease_predictor_form');
});
Route::post('/hypertension-disease/predictor/get-token', function (Request $request) {
    try {
        $response = Http::asForm()->post('https://iam.cloud.ibm.com/identity/token', [
            'grant_type' => 'urn:ibm:params:oauth:grant-type:apikey',
            'apikey' => $request->input('apiKey'),
        ]);
        if ($response->failed()) {
            return response()->json(['error' => 'Failed to retrieve token'], 500);
        }
        return $response->json();
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
});
Route::post('/hypertension-disease/predictor/predict', function (Request $request) {
    try {
        $token = $request->input('token');
        $payload = $request->input('payload');
        $scoringUrl = 'https://us-south.ml.cloud.ibm.com/ml/v4/deployments/cded79c1-9c2c-464e-883a-e3ef58cbbe99/predictions?version=2021-05-01';
        $response = Http::withToken($token)->post($scoringUrl, $payload);
        if ($response->failed()) {
            return response()->json(['error' => 'Failed to retrieve prediction'], 500);
        }
        return $response->json();
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
});
Route::get('/hypertension/prediction/positive/solution',function(){
    return view('content.hypertension-positive');
});
Route::get('/hypertension/prediction/negative/solution',function(){
    return view('content.hypertension-negative');
});
Route::get('/heart-disease/predictor', function () {
    return view('disease_predictor_forms.heart_disease_predictor_form');
});
Route::post('/heart-disease/predictor/get-token', function (Request $request) {
    $response = Http::asForm()->post('https://iam.cloud.ibm.com/identity/token', [
        'grant_type' => 'urn:ibm:params:oauth:grant-type:apikey',
        'apikey' => $request->input('apiKey'),
    ]);
    if ($response->failed()) {
        return response()->json(['error' => 'Failed to retrieve token'], 500);
    }
    return $response->json();
});
Route::post('/heart-disease/predictor/predict', function (Request $request) {
    $token = $request->input('token');
    $payload = $request->input('payload');
    $scoringUrl = 'https://us-south.ml.cloud.ibm.com/ml/v4/deployments/b98df78e-0dac-452d-9052-5a2a967acd21/predictions?version=2021-05-01';
    $response = Http::withToken($token)->post($scoringUrl, $payload);
    if ($response->failed()) {
        return response()->json(['error' => 'Failed to retrieve prediction'], 500);
    }
    return $response->json();
});
Route::get('/heart-disease/prediction/positive/solution',function(){
    return view('content.heart-disease-positive');
});
Route::get('/heart-disease/prediction/negative/solution',function(){
    return view('content.heart-disease-negative');
});





// anurag's model parmanently stopped
// Route::get('/diabetes-disease/predictor', function () {
//     return view('disease_predictor_forms.diabetes_disease_predictor_form');
// });
// Route::post('/diabetes-disease/predictor/get-token', function (Request $request) {
//     try {
//         Log::info($request->input('apiKey'));
//         $response = Http::asForm()->post('https://iam.cloud.ibm.com/identity/token', [
//             'grant_type' => 'urn:ibm:params:oauth:grant-type:apikey',
//             'apikey' => $request->input('apiKey'),
//         ]);
//         if ($response->failed()) {
//             return response()->json(['error' => 'Failed to retrieve token'], 500);
//         }
//         return $response->json();
//     } catch (\Exception $e) {
//         return response()->json(['error' => $e->getMessage()], 500);
//     }
// });

// Route::post('/diabetes-disease/predictor/predict', function (Request $request) {
//     try {
//         $token = $request->input('token');
//         $payload = $request->input('payload');
//         $scoringUrl = 'https://us-south.ml.cloud.ibm.com/ml/v4/deployments/436f846a-ce0d-44be-8de6-49b65b2b6428/predictions?version=2021-05-01';
//         $response = Http::withToken($token)->post($scoringUrl, $payload);
//         if ($response->failed()) {
//             return response()->json(['error' => 'Failed to retrieve prediction'], 500);
//         }
//         return $response->json();
//     } catch (\Exception $e) {
//         return response()->json(['error' => $e->getMessage()], 500);
//     }
// });
// Route::get('/diabetes-disease/prediction/positive/solution',function(){
//     return view('content.diabetes-positive');
// });
// Route::get('/diabetes-disease/prediction/negative/solution',function(){
//     return view('content.diabetes-negative');
// });


// anup model parmanently stopped
// Route::get('/alzhiemer-disease/predictor', function () {
//     return view('disease_predictor_forms.alzhiemer_disease_predictor_form');
// });
// Route::post('/alzhiemer-disease/predictor/get-token', function (Request $request) {
//     $response = Http::asForm()->post('https://iam.cloud.ibm.com/identity/token', [
//         'grant_type' => 'urn:ibm:params:oauth:grant-type:apikey',
//         'apikey' => $request->input('apiKey'),
//     ]);
//     if ($response->failed()) {
//         return response()->json(['error' => 'Failed to retrieve token'], 500);
//     }
//     return $response->json();
// });
// Route::post('/alzhiemer-disease/predictor/predict', function (Request $request) {
//     $token = $request->input('token');
//     $payload = $request->input('payload');
//     $scoringUrl = 'https://us-south.ml.cloud.ibm.com/ml/v4/deployments/c8d48f2c-8ed6-433a-bc2a-335823eb65e5/predictions?version=2021-05-01';
//     $response = Http::withToken($token)->post($scoringUrl, $payload);
//     if ($response->failed()) {
//         return response()->json(['error' => 'Failed to retrieve prediction'], 500);
//     }
//     return $response->json();
// });
// Route::get('/alzhiemer-disease/prediction/positive/solution',function(){
//     return view('content.alzhiemer-disease-positive');
// });
// Route::get('/alzhiemer-disease/prediction/negative/solution',function(){
//     return view('content.alzhiemer-disease-negative');
// });