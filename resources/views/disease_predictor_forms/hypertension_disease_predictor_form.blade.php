@extends('layouts.app')
@section('content')
    <header class=page>
        <div class="page_main container-fluid">
            <div class=container>
                <h1 class=page_header>HyperTension Disease Predictor</h1>
            </div>
        </div>
    </header>
    <main>
        <div class="contacts section">
            <div class="container d-flex flex-wrap flex-xl-nowrap justify-content-between">
                <div class="contacts_form col-12 col-lg-12">
                    <div class="contacts_form-header">
                        <h2 class="contacts_form-header_title">HyperTension Disease Prediction</h2>
                        <p class="contacts_form-header_text">Use this form to predict hypertension disease based on various parameters. Ensure you fill in all the required details accurately for a precise prediction.</p>
                    </div>
                    <form class="contacts_form-form d-flex flex-column" id="predictionForm">
                        <div class="row">
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="male">Gender:</label>
                                <select class="contacts_form-form_field field required" id="male" name="male" required>
                                    <option value="">Select</option>
                                    <option value="0">Male</option>
                                    <option value="1">Female</option>
                                </select>
                            </div>
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="age">Age:</label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="age" name="age" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="currentSmoker">Smoking:</label>
                                <select class="contacts_form-form_field field required" id="currentSmoker" name="currentSmoker" required>
                                    <option value="">Select</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="cigsPerDay">Cigarette Per Day:</label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="cigsPerDay" name="cigsPerDay" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="BPMeds">BP Medicine:</label>
                                <select class="contacts_form-form_field field required" id="BPMeds" name="BPMeds" required>
                                    <option value="">Select</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="diabetes">Diabetes:</label>
                                <select class="contacts_form-form_field field required" id="diabetes" name="diabetes" required>
                                    <option value="">Select</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="totChol">Total Cholesterol:</label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="totChol" name="totChol" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="sysBP">Systolic BP:</label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="sysBP" name="sysBP" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="diaBP">Diastolic BP:</label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="diaBP" name="diaBP" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="BMI">BMI:</label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="BMI" name="BMI" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="heartRate">Heart Rate:</label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="heartRate" name="heartRate" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="glucose">Glucose:</label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="glucose" name="glucose" required><br><br>
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
                values.push(parseFloat(value));
            });

            const payload = {
                input_data: [{
                    field: ["male", "age", "currentSmoker", "cigsPerDay", "BPMeds", "diabetes", "totChol", "sysBP", "diaBP", "BMI", "heartRate", "glucose"],
                    values: [values]
                }]
            };

            fetch('/hypertension-disease/predictor/get-token', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ apiKey: 'Ea35vx7cAb1FoxHM154uTC_B08Q9PBdAP9uAdRgL6rl7' }) // Replace with your actual IBM API key
            })
            .then(response => response.json())
            .then(tokenResponse => {
                return fetch('/hypertension-disease/predictor/predict', {
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
                    predictionMessage.textContent = "Based on the provided data, the model has predicted that there is a risk of hyper tension. So consult the doctor";
                    diseaseResult.textContent = "Positive";
                    diseaseResult.style.color = "#dc3545"; // Red color for positive result
                    solutionLink.href = "{{url('/hypertension/prediction/positive/solution')}}";
                } else {
                    predictionMessage.textContent = "Based on the provided data, the model has predicted that there is no risk of hyper tension.";
                    diseaseResult.textContent = "Negative";
                    diseaseResult.style.color = "#28a745"; // Green color for negative result
                    solutionLink.href = "{{url('/hypertension/prediction/negative/solution')}}";
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