@extends('layouts.app')
@section('content')
    <header class=page>
        <div class="page_main container-fluid">
            <div class=container>
                <h1 class=page_header>Diabetes Disease Predictor</h1>
                <p class=page_text>Nibh tellus molestie nunc non blandit. Mi tempus imperdiet nulla malesuada pellentesque elit</p>
            </div>
        </div>
    </header>
    <main>
        <div class="contacts section">
            <div class="container d-flex flex-wrap flex-xl-nowrap justify-content-between">
                <div class="contacts_form col-12 col-lg-12">
                    <div class="contacts_form-header">
                        <h2 class="contacts_form-header_title">Have any Questions?</h2>
                        <p class="contacts_form-header_text">Elementum eu facilisis sed odio morbi quis commodo odio. Mauris rhoncus aenean vel elit scelerisque mauris pellentesque</p>
                    </div>
                    <form class="contacts_form-form d-flex flex-column" id="predictionForm">
                        <div class="row">
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="gender">Gender:</label>
                                <select class="contacts_form-form_field field required" id="gender" name="gender" required>
                                    <option value="">Select</option>
                                    <option value="0">Male</option>
                                    <option value="1">Female</option>
                                </select>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="age">Age(60 to 90 years):</label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="age" name="age" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="hypertension">Hypertension:</label>
                                <select class="contacts_form-form_field field required" id="hypertension" name="hypertension" required>
                                    <option value="">Select</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="heart_disease">Heart Disease:</label>
                                <select class="contacts_form-form_field field required" id="heart_disease" name="heart_disease" required>
                                    <option value="">Select</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="smoking_history">Smoking History:</label>
                                <select class="contacts_form-form_field field required" id="smoking_history" name="smoking_history" required>
                                    <option value="">Select</option>
                                    <option value="0">Not Current</option>
                                    <option value="1">Former</option>
                                    <option value="2">No Info</option>
                                    <option value="3">Current</option>
                                    <option value="4">Never</option>
                                    <option value="5">Ever</option>
                                </select>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="bmi">BMI:</label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="bmi" name="bmi" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="HbA1c_level">HbA1c (Hemoglobin A1c) level:</label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="HbA1c_level" name="HbA1c_level" required><br><br>
                            </div>
                            
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="blood_glucose_level">Blood Glucose Level:</label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="blood_glucose_level" name="blood_glucose_level" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <button class="contacts_form-form_btn btn" type="submit">Predict</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card" id="predictionResult">
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

            const formData = new FormData(e.target);
            const values = [];
            formData.forEach((value, key) => {
                values.push(parseFloat(value));
            });

            const payload = {
                input_data: [{
                    field: ["gender", "age", "hypertension", "heart_disease", "smoking_history", "bmi", "HbA1c_level", "blood_glucose_level"],
                    values: [values]
                }]
            };

            fetch('/diabetes-disease/predictor/get-token', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ apiKey: 'zVp6Y0R7Ek-c4NUmLNvkrCjwZIa6NLHHEodeqyoIeqqm' }) // Replace with your actual IBM API key
            })
            .then(response => response.json())
            .then(tokenResponse => {
                return fetch('/diabetes-disease/predictor/predict', {
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
                    predictionMessage.textContent = "Based on the provided data, the model has predicted that there is a risk of diabetes disease. So consult the doctor";
                    diseaseResult.textContent = "Positive";
                    diseaseResult.style.color = "#dc3545"; // Red color for positive result
                    solutionLink.href = "{{url('/diabetes-disease/prediction/positive/solution')}}";
                } else {
                    predictionMessage.textContent = "Based on the provided data, the model has predicted that there is no risk of diabetes disease.";
                    diseaseResult.textContent = "Negative";
                    diseaseResult.style.color = "#28a745"; // Green color for negative result
                    solutionLink.href = "{{url('/diabetes-disease/prediction/negative/solution')}}";
                }
                // Show the prediction result card
                document.getElementById('predictionResult').style.display = 'block';
            })
            .catch(error => {
                console.error('Error:', error);
                alert('This deployment cannot be processed because it exceeds the allocated capacity unit hours (CUH). Increase the compute resources for this job and try again');
            });
        });
    </script>
@endsection