@extends('layouts.app')
@section('content')
    <header class=page>
        <div class="page_main container-fluid">
            <div class=container>
                <h1 class=page_header>Heart Disease Predictor</h1>
            </div>
        </div>
    </header>
    <main>
        <div class="contacts section">
            <div class="container d-flex flex-wrap flex-xl-nowrap justify-content-between">
                <div class="contacts_form col-12 col-lg-12">
                    <div class=contacts_form-header>
                        <h2 class=contacts_form-header_title>Heart Disease Prediction</h2>
                        <p class=contacts_form-header_text>Use this form to predict heart disease based on various parameters. Ensure you fill in all the required details accurately for a precise prediction.</p>
                    </div>
                    <form class="contacts_form-form d-flex flex-column" id="predictionForm">
                        <div class="row">
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="age">Age(in years):</label>
                                <input class="contacts_form-form_field field required" type="number" id="age" name="age" required><br><br>
                            </div>
                            
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="sex">Sex:</label>
                                <select class="contacts_form-form_field field required" id="sex" name="sex" required>
                                    <option value="">Select</option>
                                    <option value="0">Female</option>
                                    <option value="1">Male</option>
                                </select><br><br>
                            </div>
                            
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="cp">Chest Pain Type (4 values):</label>
                                <select class="contacts_form-form_field field required" id="cp" name="cp" required>
                                    <option value="">Select</option>
                                    <option value="0">Typical Angina</option>
                                    <option value="1">Atypical Angina</option>
                                    <option value="2">Non-anginal Pain</option>
                                    <option value="3">Asymptomatic</option>
                                </select><br><br>
                            </div>
                            
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="trestbps">Resting Blood Pressure(in mmHg):</label>
                                <input class="contacts_form-form_field field required" type="number" id="trestbps" name="trestbps" required><br><br>
                            </div>
                            
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="chol">Serum Cholestoral (in mg/dl):</label>
                                <input class="contacts_form-form_field field required" type="number" id="chol" name="chol" required><br><br>
                            </div>
                            
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="fbs">Fasting Blood Sugar > 120 mg/dl:</label>
                                <select class="contacts_form-form_field field required" id="fbs" name="fbs" required>
                                    <option value="">Select</option>
                                    <option value="0">false</option>
                                    <option value="1">true</option>
                                </select><br><br>
                            </div>
                            
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="restecg">Resting Electro Cardiographic Results:</label>
                                <select class="contacts_form-form_field field required" id="restecg" name="restecg" required>
                                    <option value="">Select</option>
                                    <option value="0">Normal</option>
                                    <option value="1">ST-T Abnormality</option>
                                    <option value="2">Left Ventricular Hypertrophy</option>
                                </select><br><br>
                            </div>
                            
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="thalach">Maximum Heart Rate Achieved (in bpm):</label>
                                <input class="contacts_form-form_field field required" type="number" id="thalach" name="thalach" required><br><br>
                            
                            </div>
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="exang">Exercise Induced Angina:</label>
                                <select class="contacts_form-form_field field required" id="exang" name="exang" required>
                                    <option value="">Select</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="oldpeak">ST depression induced by exercise relative to rest (in mm):</label>
                                <input class="contacts_form-form_field field required" type="number" id="oldpeak" name="oldpeak" required><br><br>
                            </div>
                            
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="slope">Slope:</label>
                                <select class="contacts_form-form_field field required" id="slope" name="slope" required>
                                    <option value="">Select</option>
                                    <option value="0">Upsloping</option>
                                    <option value="1">Flat</option>
                                    <option value="2">Downsloping</option>
                                </select><br><br>
                            </div>
                            
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="ca">Number of major vessels colored by flourosopy:</label>
                                <input class="contacts_form-form_field field required" type="number" id="ca" name="ca" required><br><br>
                            </div>
                            
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="thal">Thal:</label>
                                <select class="contacts_form-form_field field required" id="thal" name="thal" required>
                                    <option value="">Select</option>
                                    <option value="0">Normal</option>
                                    <option value="1">Thalassemia minor</option>
                                    <option value="2">Thalassemia intermediate</option>
                                    <option value="3">Thalassemia major</option>
                                </select><br><br>
                            </div>
                            
                            <div class="contacts_form col-3 col-lg-4">
                                <button class="contacts_form-form_btn btn" type="submit" id="predictButton">Predict</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card" id="predictionResult" style="display: none;">
            <div class="card-header">Disease Prediction Result</div>
            <div class="card-content">
                <p id="predictionMessage"></p>
                <p class="card-result" id="diseaseResult"></p>
            </div>
            <a id="solutionLink" href="">Solution</a>
        </div>
    </main>
    <script>
        document.getElementById('predictionForm').addEventListener('submit', function (e) {
            e.preventDefault();
            const predictButton = document.getElementById('predictButton');
            predictButton.disabled = true; // Disable the predict button
            predictButton.style.color = "#fffff";

            const formData = new FormData(e.target);
            const values = [];
            formData.forEach((value, key) => {
                values.push(Number(value));
            });

            const payload = {
                input_data: [{
                    field: ["age", "sex", "cp", "trestbps", "chol", "fbs", "restecg", "thalach", "exang", "oldpeak", "slope", "ca", "thal"],
                    values: [values]
                }]
            };

            fetch('/heart-disease/predictor/get-token', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ apiKey: 'psZLGpl8O6nRZfpIsvMPMoTQVtphT1SrnVlwWo_4Kjsr' }) // Replace with your actual IBM API key
            })
            .then(response => response.json())
            .then(tokenResponse => {
                return fetch('/heart-disease/predictor/predict', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({ token: tokenResponse.access_token, payload: payload })
                });
            })
            .then(response => response.json())
            .then(parsedPostResponse => {
                const prediction = parsedPostResponse.predictions[0].values[0][0];
                const predictionMessage = document.getElementById('predictionMessage');
                const diseaseResult = document.getElementById('diseaseResult');
                const solutionLink = document.getElementById('solutionLink');
                
                if (prediction === 1) {
                    predictionMessage.textContent = "Based on the provided data, the model has predicted that there is a risk of heart disease. So consult the doctor";
                    diseaseResult.textContent = "Positive";
                    diseaseResult.style.color = "#dc3545"; // Red color for positive result
                    solutionLink.href = "{{url('/heart-disease/prediction/positive/solution')}}";
                } else {
                    predictionMessage.textContent = "Based on the provided data, the model has predicted that there is no risk of heart disease.";
                    diseaseResult.textContent = "Negative";
                    diseaseResult.style.color = "#28a745"; // Green color for negative result
                    solutionLink.href = "{{url('/heart-disease/prediction/negative/solution')}}";
                }
                // Show the prediction result card
                document.getElementById('predictionResult').style.display = 'block';
            })
            .catch(error => {
                alert('This deployment cannot be processed because it exceeds the allocated capacity unit hours (CUH). Increase the compute resources for this job and try again');
            })
            .finally(() => {
                predictButton.disabled = false; // Re-enable the predict button
                predictButton.style.color = "#214842";
            });
        });
    </script>
@endsection