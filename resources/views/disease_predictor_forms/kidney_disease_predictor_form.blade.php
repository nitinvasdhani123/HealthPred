@extends('layouts.app')
@section('content')
    <header class=page>
        <div class="page_main container-fluid">
            <div class=container>
                <h1 class=page_header>Kidney Stone Predictor</h1>
            </div>
        </div>
    </header>
    <main>
        <div class="contacts section">
            <div class="container d-flex flex-wrap flex-xl-nowrap justify-content-between">
                <div class="contacts_form col-12 col-lg-12">
                    <div class="contacts_form-header">
                        <h2 class="contacts_form-header_title">Kidney Stone Presence Prediction</h2>
                        <p class="contacts_form-header_text">Use this form to predict kidney health based on various parameters. Ensure you fill in all the required details accurately for a precise prediction.</p>
                    </div>
                    <form class="contacts_form-form d-flex flex-column" id="predictionForm">
                        <div class="row">
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="gravity">Gravity : </label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="gravity" name="gravity" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="ph">PH : </label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="ph" name="ph" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="osmo">Osmo : </label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="osmo" name="osmo" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="cond">Cond : </label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="cond" name="cond" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="urea">Urea : </label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="urea" name="urea" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-4">
                                <label for="calc">Calc : </label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="calc" name="calc" required><br><br>
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

            fetch('/kidney-stone/predictor/get-token', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ apiKey: 'a2qPCt2HjeT38ZXfQB_62uqaSf4g52q25cqTpcz7vHTk' }) // Replace with your actual IBM API key
            })
            .then(response => response.json())
            .then(tokenResponse => {
                return fetch('/kidney-stone/predictor/predict', {
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
                    predictionMessage.textContent = "Based on the provided data, the model has predicted that there is a risk of existence of Kidney stone. So consult the doctor";
                    diseaseResult.textContent = "Positive";
                    diseaseResult.style.color = "#dc3545"; // Red color for positive result
                    solutionLink.href = "{{url('/kidney-stone/prediction/positive/solution')}}";
                } else {
                    predictionMessage.textContent = "Based on the provided data, the model has predicted that there is no risk of existence of Kidney stone.";
                    diseaseResult.textContent = "Negative";
                    diseaseResult.style.color = "#28a745"; // Green color for negative result
                    solutionLink.href = "{{url('/kidney-stone/prediction/negative/solution')}}";
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