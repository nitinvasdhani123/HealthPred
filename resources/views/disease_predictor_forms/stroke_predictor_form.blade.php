@extends('layouts.app')
@section('content')
    <header class=page>
        <div class="page_main container-fluid">
            <div class=container>
                <h1 class=page_header>Stroke Predictor</h1>
            </div>
        </div>
    </header>
    <main>
        <div class="contacts section">
            <div class="container d-flex flex-wrap flex-xl-nowrap justify-content-between">
                <div class="contacts_form col-12 col-lg-12">
                    <div class="contacts_form-header">
                        <h2 class="contacts_form-header_title">Stroke Prediction</h2>
                        <p class="contacts_form-header_text">Use this form to predict stroke based on various parameters. Ensure you fill in all the required details accurately for a precise prediction.</p>
                    </div>
                    <form class="contacts_form-form d-flex flex-column" id="predictionForm">
                        <div class="row">
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="gender">Gender:</label>
                                <select class="contacts_form-form_field field required" id="gender" name="gender" required>
                                    <option value="">Select</option>
                                    <option value="0">Male</option>
                                    <option value="1">Female</option>
                                </select><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="age">Age:</label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="age" name="age" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="hypertension">Hypertension:</label>
                                <select class="contacts_form-form_field field required" id="hypertension" name="hypertension" required>
                                    <option value="">Select</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="heart_disease">Heart Disease:</label>
                                <select class="contacts_form-form_field field required" id="heart_disease" name="heart_disease" required>
                                    <option value="">Select</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="ever_married">Ever Married:</label>
                                <select class="contacts_form-form_field field required" id="ever_married" name="ever_married" required>
                                    <option value="">Select</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="work_type">Work Type:</label>
                                <select class="contacts_form-form_field field required" id="work_type" name="work_type" required>
                                    <option value="">Select</option>
                                    <option value="1">Private</option>
                                    <option value="2">Self-employed</option>
                                    <option value="3">Govt Job</option>
                                    <option value="4">children</option>
                                    <option value="5">Never Worked</option>
                                </select><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="Residence_type">Residence Type:</label>
                                <select class="contacts_form-form_field field required" id="Residence_type" name="Residence_type" required>
                                    <option value="">Select</option>
                                    <option value="1">Rural</option>
                                    <option value="2">Urban</option>
                                </select><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="avg_glucose_level">Avg Glucose Level:</label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="avg_glucose_level" name="avg_glucose_level" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="bmi">bmi:</label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="bmi" name="bmi" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="smoking_status">Smoking Status:</label>
                                <select class="contacts_form-form_field field required" id="smoking_status" name="smoking_status" required>
                                    <option value="">Select</option>
                                    <option value="1">never smoked</option>
                                    <option value="2">Unk0wn</option>
                                    <option value="3">formerly smoked</option>
                                    <option value="4">smokes</option>
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
        <!-- Prediction Result Card -->
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
                    field: ["gravity", "ph", "osmo", "cond", "urea", "calc"],
                    values: [values]
                }]
            };

            fetch('/stroke/predictor/get-token', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ apiKey: 'HmN3gb17o5-9yFV5pbY82xJdc6MUzdxj8UOhqSXR9kxH' }) // Replace with your actual IBM API key
            })
            .then(response => response.json())
            .then(tokenResponse => {
                return fetch('/stroke/predictor/predict', {
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
                    predictionMessage.textContent = "Based on the provided data, the model has predicted that there is a risk of stroke. So consult the doctor";
                    diseaseResult.textContent = "Positive";
                    diseaseResult.style.color = "#dc3545"; // Red color for positive result
                    solutionLink.href = "{{url('/stroke/prediction/positive/solution')}}";
                } else {
                    predictionMessage.textContent = "Based on the provided data, the model has predicted that there is no risk of stroke.";
                    diseaseResult.textContent = "Negative";
                    diseaseResult.style.color = "#28a745"; // Green color for negative result
                    solutionLink.href = "{{url('/stroke/prediction/negative/solution')}}";
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