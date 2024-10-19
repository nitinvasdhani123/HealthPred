@extends('layouts.app')
@section('content')
    <header class=page>
        <div class="page_main container-fluid">
            <div class=container>
                <h1 class=page_header>Alzhiemer Disease Predictor</h1>
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
                                <label for="age">Age(60 to 90 years):</label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="age" name="Age" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="gender">Gender:</label>
                                <select class="contacts_form-form_field field required" id="gender" name="Gender" required>
                                    <option value="">Select</option>
                                    <option value="0">Male</option>
                                    <option value="1">Female</option>
                                </select>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="ethnicity">Ethnicity:</label>
                                <select class="contacts_form-form_field field required" id="ethnicity" name="Ethnicity" required>
                                    <option value="">Select</option>
                                    <option value="0">Caucasian</option>
                                    <option value="1">African American</option>
                                    <option value="2">Asian</option>
                                    <option value="3">Other</option>
                                </select>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="educationLevel">Education Level:</label>
                                <select class="contacts_form-form_field field required" id="educationLevel" name="EducationLevel" required>
                                    <option value="">Select</option>
                                    <option value="0">None</option>
                                    <option value="1">High School</option>
                                    <option value="2">Bachelor's</option>
                                    <option value="3">Higher</option>
                                </select>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="bmi">BMI(15 to 40):</label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="bmi" name="BMI" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="smoking">Smoking:</label>
                                <select class="contacts_form-form_field field required" id="smoking" name="Smoking" required>
                                    <option value="">Select</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="alcoholConsumption">Alcohol Consumption(0 to 20 in units):</label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="AlcoholConsumption" name="AlcoholConsumption" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="physicalActivity">Physical Activity(0 to 10 in hours):</label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="PhysicalActivity" name="PhysicalActivity" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="dietQuality">Diet Quality(0 to 10):</label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="DietQuality" name="DietQuality" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="sleepQuality">Sleep Quality(4 to 10):</label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="SleepQuality" name="SleepQuality" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="familyHistoryAlzheimers">Family History of Alzheimer's:</label>
                                <select class="contacts_form-form_field field required" id="familyHistoryAlzheimers" name="FamilyHistoryAlzheimers" required>
                                    <option value="">Select</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="cardiovascularDisease">Cardiovascular Disease:</label>
                                <select class="contacts_form-form_field field required" id="cardiovascularDisease" name="CardiovascularDisease" required>
                                    <option value="">Select</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="diabetes">Diabetes:</label>
                                <select class="contacts_form-form_field field required" id="diabetes" name="Diabetes" required>
                                    <option value="">Select</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="depression">Depression:</label>
                                <select class="contacts_form-form_field field required" id="depression" name="Depression" required>
                                    <option value="">Select</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="headInjury">Head Injury:</label>
                                <select class="contacts_form-form_field field required" id="headInjury" name="HeadInjury" required>
                                    <option value="">Select</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="hypertension">Hypertension:</label>
                                <select class="contacts_form-form_field field required" id="hypertension" name="Hypertension" required>
                                    <option value="">Select</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="systolicBP">Systolic BP(90 to 180 mmHg):</label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="systolicBP" name="SystolicBP" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="diastolicBP">Diastolic BP(60 to 120 mmHg):</label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="diastolicBP" name="DiastolicBP" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="cholesterolTotal">Cholesterol Total(150 to 300 mg/dL):</label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="cholesterolTotal" name="CholesterolTotal" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="cholesterolLDL">Cholesterol LDL(50 to 200 mg/dL):</label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="cholesterolLDL" name="CholesterolLDL" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="cholesterolHDL">Cholesterol HDL(20 to 100 mg/dL):</label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="cholesterolHDL" name="CholesterolHDL" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="cholesterolTriglycerides">Cholesterol Triglycerides(50 to 400 mg/dL):</label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="cholesterolTriglycerides" name="CholesterolTriglycerides" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="mmse">Mini-Mental State Examination score(MMSE)(0 to 30):</label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="mmse" name="MMSE" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="functionalAssessment">Functional Assessment(0 to 10):</label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="functionalAssessment" name="FunctionalAssessment" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="memoryComplaints">Memory Complaints:</label>
                                <select class="contacts_form-form_field field required" id="memoryComplaints" name="MemoryComplaints" required>
                                    <option value="">Select</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="behavioralProblems">Behavioral Problems:</label>
                                <select class="contacts_form-form_field field required" id="behavioralProblems" name="BehavioralProblems" required>
                                    <option value="">Select</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="adl">Activities of Daily Living score(ADL?)(0 to 10):</label>
                                <input class="contacts_form-form_field field required" type="number" step="any" id="adl" name="ADL" required><br><br>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="confusion">Confusion:</label>
                                <select class="contacts_form-form_field field required" id="confusion" name="Confusion" required>
                                    <option value="">Select</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="disorientation">Disorientation:</label>
                                <select class="contacts_form-form_field field required" id="disorientation" name="Disorientation" required>
                                    <option value="">Select</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="personalityChanges">Personality Changes:</label>
                                <select class="contacts_form-form_field field required" id="personalityChanges" name="PersonalityChanges" required>
                                    <option value="">Select</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="difficultyCompletingTasks">Difficulty Completing Tasks:</label>
                                <select class="contacts_form-form_field field required" id="difficultyCompletingTasks" name="DifficultyCompletingTasks" required>
                                    <option value="">Select</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                            </div>
                            <div class="contacts_form col-3 col-lg-3">
                                <label for="forgetfulness">Forgetfulness:</label>
                                <select class="contacts_form-form_field field required" id="forgetfulness" name="Forgetfulness" required>
                                    <option value="">Select</option>
                                    <option value="0">No</option>
                                    <option value="1">Yes</option>
                                </select>
                             </div>   
                            <div class="contacts_form col-3 col-lg-3">
                                <button class="contacts_form-form_btn btn" type="submit">Predict</button>
                             </div>   
                         </div>   
            
                    </form>
                </div>
            </div>
        </div>
         <!-- Prediction Result Card -->
        <div id="predictionResult" class="card" style="display:none; margin: 20px auto; max-width: 600px;">
            <div class="card-body">
                <h5 class="card-title">Prediction Result</h5>
                <p id="predictionMessage" class="card-text"></p>
                <p id="diseaseResult" class="card-text"></p>
            </div>
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
                    field: ["Age", "Gender", "Ethnicity", "EducationLevel", "BMI", "Smoking", "AlcoholConsumption", "PhysicalActivity", "DietQuality", "SleepQuality", "FamilyHistoryAlzheimers", "CardiovascularDisease", "Diabetes", 
                    "Depression", "HeadInjury", "Hypertension", "SystolicBP", "DiastolicBP", "CholesterolTotal", "CholesterolLDL", "CholesterolHDL", "CholesterolTriglycerides", "MMSE", "FunctionalAssessment", 
                    "MemoryComplaints", "BehavioralProblems", "ADL", "Confusion", "Disorientation", "PersonalityChanges", "DifficultyCompletingTasks", "Forgetfulness"],
                    values: [values]
                }]
            };

            fetch('/alzhiemer-disease/predictor/get-token', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ apiKey: 'zLEM2COKLDM6zvg2fHKpMvpzoN3HloSU25fDG1Lr0eOY' }) // Replace with your actual IBM API key
            })
            .then(response => response.json())
            .then(tokenResponse => {
                return fetch('/alzhiemer-disease/predictor/predict', {
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

                if (prediction === 1) {
                    predictionMessage.textContent = "Based on the provided data, the model has predicted that there is a risk of Alzheimer's disease.  So consult the doctor";
                    diseaseResult.textContent = "Positive";
                    diseaseResult.style.color = "#dc3545"; // Red color for positive result
                } else {
                    predictionMessage.textContent = "Based on the provided data, the model has predicted that there is no risk of Alzheimer's disease.";
                    diseaseResult.textContent = "Negative";
                    diseaseResult.style.color = "#28a745"; // Green color for negative result
                }

                // Show the prediction result card
                document.getElementById('predictionResult').style.display = 'block';
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Prediction failed. Please try again later.');
            });
        });
    </script>
@endsection