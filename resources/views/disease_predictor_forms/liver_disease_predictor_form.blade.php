@extends('layouts.app')
@section('content')
    <header class="page">
        <div class="page_main container-fluid">
            <div class="container">
                <h1 class="page_header">Liver Disease Predictor</h1>
            </div>
        </div>
    </header>
    <main>
        <div class="contacts section">
            <div class="container d-flex flex-wrap flex-xl-nowrap justify-content-between">
                <div class="contacts_form col-12 col-lg-12">
                    <div class="contacts_form-header">
                            <h2 class="contacts_form-header_title">Liver Disease Presence Prediction</h2>
                            <p class="contacts_form-header_text">Fill out this form to predict liver disease based on various health parameters. Please provide accurate information for the best prediction results.</p>
                        </div>
                    <form class="contacts_form-form d-flex flex-column" id="predictionForm">
                        <div class="row">
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="age">Age(20 to 80 years):</label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="age" name="Age" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="gender">Gender:</label>
                                <select class="contacts_form-form_field field required no-enhance" id="gender" name="Gender" required>
                                    <option value="">Select</option>
                                    <option value="0">Male</option>
                                    <option value="1">Female</option>
                                </select><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="bmi">BMI(15 to 40):</label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="bmi" name="BMI" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="alcoholConsumption">Alcohol Consumption(0 to 20 units per week):</label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="alcoholConsumption" name="AlcoholConsumption" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="smoking">Smoking:</label>
                                <select class="contacts_form-form_field field required" id="smoking" name="Smoking" required>
                                    <option value="">Select</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="geneticRisk">Genetic Risk:</label>
                                <select class="contacts_form-form_field field required" id="geneticRisk" name="GeneticRisk" required>
                                    <option value="">Select</option>
                                    <option value="0">Low</option>
                                    <option value="1">Medium</option>
                                    <option value="2">High</option>
                                </select><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="physicalActivity">Physical Activity(0 to 10 hours per week):</label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="physicalActivity" name="PhysicalActivity" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="diabetes">Diabetes:</label>
                                <select class="contacts_form-form_field field required" id="diabetes" name="Diabetes" required>
                                    <option value="">Select</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="hypertension">Hypertension:</label>
                                <select class="contacts_form-form_field field required" id="hypertension" name="Hypertension" required>
                                    <option value="">Select</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="liverFunctionTest">Liver Function Test(20 to 100):</label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="liverFunctionTest" name="LiverFunctionTest" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
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
        <!--<div id="response" class="result"></div>-->
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
                    field: ["Age", "Gender", "BMI", "AlcoholConsumption", "Smoking", "GeneticRisk", "PhysicalActivity", "Diabetes", "Hypertension", "LiverFunctionTest"],
                    values: [values]
                }]
            };

            fetch('/liver-disease/predictor/get-token', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ apiKey: '3ez1i79hiCCMEk50TJg_x9EFxG_kj7Q5D6pLtFI2Y76K' }) // Replace with your actual IBM API key
            })
            .then(response => response.json())
            .then(tokenResponse => {
                return fetch('/liver-disease/predictor/predict', {
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
                // Check prediction result and display appropriate message
                const prediction = parsedPostResponse.predictions[0].values[0][0];
                const predictionMessage = document.getElementById('predictionMessage');
                const diseaseResult = document.getElementById('diseaseResult');
                const solutionLink = document.getElementById('solutionLink');
                
                if (prediction === 1) {
                    predictionMessage.textContent = "Based on the provided data, the model has predicted that there is a risk of liver disease. So consult the doctor";
                    diseaseResult.textContent = "Positive";
                    diseaseResult.style.color = "#dc3545"; // Red color for positive result
                    solutionLink.href = "{{url('/liver-disease/prediction/positive/solution')}}";
                } else {
                    predictionMessage.textContent = "Based on the provided data, the model has predicted that there is no risk of liver disease.";
                    diseaseResult.textContent = "Negative";
                    diseaseResult.style.color = "#28a745"; // Green color for negative result
                    solutionLink.href = "{{url('/liver-disease/prediction/negative/solution')}}";
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
