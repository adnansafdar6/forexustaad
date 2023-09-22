@extends('admin.layouts.app')
@push('style-page-level')
    <style>
        .step-container {
            position: relative;
            text-align: center;
            transform: translateY(-43%);
        }

        .cont {
            position: relative;
            text-align: center;
        }

        .side {
            border-right: silver solid 2px;
        }

        .circle {
            height: auto;
            justify-content: center;
            background-color: #fff;
            line-height: 30px;
            font-weight: bold;
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            cursor: pointer;
        }


        .step-circle {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: #fff;
            border: 2px solid #007bff;
            line-height: 30px;
            font-weight: bold;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
            cursor: pointer; /* Added cursor pointer */
        }

        .step-line {
            position: absolute;
            top: 16px;
            left: 50px;
            width: calc(100% - 100px);
            height: 2px;
            background-color: #007bff;
            z-index: -1;
        }

        #multi-step-form {
            overflow-x: hidden;
        }

    </style>
@endpush

@section('content')
    <div id="container" class="container mt-5">
        <div class="progress px-1" style="height: 3px;">
            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0"
                 aria-valuemax="100"></div>
        </div>
        <div class="step-container d-flex justify-content-between">
            <div class="step-circle" onclick="displayStep(1)">1</div>
            <div class="step-circle" onclick="displayStep(2)">2</div>
            <div class="step-circle" onclick="displayStep(3)">3</div>
            <div class="step-circle" onclick="displayStep(4)">4</div>
            <div class="step-circle" onclick="displayStep(5)">5</div>
            <div class="step-circle" onclick="displayStep(6)">6</div>
            <div class="step-circle" onclick="displayStep(7)">7</div>
            <div class="step-circle" onclick="displayStep(8)">8</div>
            <div class="step-circle" onclick="displayStep(9)">9</div>
            <div class="step-circle" onclick="displayStep(10)">10</div>
        </div>
        <div class="row ">
            <div class="col-3 side">
                <div class=" cont justify-content-between">
                    <div class="circle circle-1" onclick="displayStep(1)">COMPANY INFORMATION</div>
                    <div class="circle circle-2" onclick="displayStep(2)">DEPOSIT & WITHDRAWAL</div>
                    <div class="circle circle-3" onclick="displayStep(3)">COMMISSIONS & FEES</div>
                    <div class="circle circle-4" onclick="displayStep(4)">ACCOUNT INFORMATION</div>
                    <div class="circle circle-5" onclick="displayStep(5)">TRADABLE ASSETS</div>
                    <div class="circle circle-6" onclick="displayStep(6)">TRADING PLATFORMS</div>
                    <div class="circle circle-7" onclick="displayStep(7)">TRADING FEATURES</div>
                    <div class="circle circle-8" onclick="displayStep(8)">CUSTOMER SERVICE</div>
                    <div class="circle circle-9" onclick="displayStep(9)">RESEARCH & EDUCATION</div>
                    <div class="circle circle-10" onclick="displayStep(10)">PROMOTIONS</div>
                </div>
            </div>
            <div class="col-8">
                <form id="multi-step-form">
                    <div class="step step-1">
                        <!-- Step 1 form fields here -->
                        <h3>COMPANY INFORMATION</h3>
                        <div class="mb-3">
                            <label for="field1" class="form-label">Field 1:</label>
                            <input type="text" class="form-control" id="field1" name="field1">
                        </div>
                        <button type="button" class="btn btn-primary next-step">Next</button>
                    </div>
                    <div class="step step-2">
                        <!-- Step 2 form fields here -->
                        <h3>DEPOSIT & WITHDRAWAL</h3>
                        <div class="mb-3">
                            <label for="field2" class="form-label">Field 2:</label>
                            <input type="text" class="form-control" id="field2" name="field2">
                        </div>
                        <button type="button" class="btn btn-primary prev-step">Previous</button>
                        <button type="button" class="btn btn-primary next-step">Next</button>
                    </div>
                    <div class="step step-3">
                        <!-- Step 2 form fields here -->
                        <h3>COMMISSIONS & FEES</h3>
                        <div class="mb-3">
                            <label for="field2" class="form-label">Field 2:</label>
                            <input type="text" class="form-control" id="field3" name="field2">
                        </div>
                        <button type="button" class="btn btn-primary prev-step">Previous</button>
                        <button type="button" class="btn btn-primary next-step">Next</button>
                    </div>
                    <div class="step step-4">
                        <!-- Step 2 form fields here -->
                        <h3>ACCOUNT INFORMATION</h3>
                        <div class="mb-3">
                            <label for="field2" class="form-label">Field 2:</label>
                            <input type="text" class="form-control" id="field4" name="field2">
                        </div>
                        <button type="button" class="btn btn-primary prev-step">Previous</button>
                        <button type="button" class="btn btn-primary next-step">Next</button>
                    </div>
                    <div class="step step-5">
                        <!-- Step 2 form fields here -->
                        <h3>TRADABLE ASSETS</h3>
                        <div class="mb-3">
                            <label for="field2" class="form-label">Field 2:</label>
                            <input type="text" class="form-control" id="field2" name="field2">
                        </div>
                        <button type="button" class="btn btn-primary prev-step">Previous</button>
                        <button type="button" class="btn btn-primary next-step">Next</button>
                    </div>
                    <div class="step step-6">
                        <!-- Step 2 form fields here -->
                        <h3>TRADING PLATFORMS</h3>
                        <div class="mb-3">
                            <label for="field2" class="form-label">Field 2:</label>
                            <input type="text" class="form-control" id="field2" name="field2">
                        </div>
                        <button type="button" class="btn btn-primary prev-step">Previous</button>
                        <button type="button" class="btn btn-primary next-step">Next</button>
                    </div>
                    <div class="step step-7">
                        <!-- Step 2 form fields here -->
                        <h3>TRADING FEATURES</h3>
                        <div class="mb-3">
                            <label for="field2" class="form-label">Field 2:</label>
                            <input type="text" class="form-control" id="field2" name="field2">
                        </div>
                        <button type="button" class="btn btn-primary prev-step">Previous</button>
                        <button type="button" class="btn btn-primary next-step">Next</button>
                    </div>
                    <div class="step step-8">
                        <!-- Step 2 form fields here -->
                        <h3>CUSTOMER SERVICE</h3>
                        <div class="mb-3">
                            <label for="field2" class="form-label">Field 2:</label>
                            <input type="text" class="form-control" id="field2" name="field2">
                        </div>
                        <button type="button" class="btn btn-primary prev-step">Previous</button>
                        <button type="button" class="btn btn-primary next-step">Next</button>
                    </div>
                    <div class="step step-9">
                        <!-- Step 2 form fields here -->
                        <h3>RESEARCH & EDUCATION</h3>
                        <div class="mb-3">
                            <label for="field2" class="form-label">Field 2:</label>
                            <input type="text" class="form-control" id="field2" name="field2">
                        </div>
                        <button type="button" class="btn btn-primary prev-step">Previous</button>
                        <button type="button" class="btn btn-primary next-step">Next</button>
                    </div>
                    <div class="step step-10">
                        <!-- Step 3 form fields here -->
                        <h3>PROMOTIONS</h3>
                        <div class="mb-3">
                            <label for="field3" class="form-label">Field 3:</label>
                            <input type="text" class="form-control" id="field10" name="field3">
                        </div>
                        <button type="button" class="btn btn-primary prev-step">Previous</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script-page-level')
    <script>
        var currentStep = 1;
        var updateProgressBar;

        function displayStep(stepNumber) {

            if (stepNumber >= 1 && stepNumber <= 10) {
                $(".step-" + currentStep).hide();
                $(".step-" + stepNumber).show();
                currentStep = stepNumber;
                updateProgressBar();
            }
        }

        $(document).ready(function () {
            $('#multi-step-form').find('.step').slice(1).hide();

            $(".next-step").click(function () {
                if (currentStep < 10) {
                    $(".step-" + currentStep).addClass("animate__animated animate__fadeOutLeft");
                    // $(".circle-" + currentStep).addClass("active");
                    currentStep++;
                    setTimeout(function () {
                        $(".step").removeClass("animate__animated animate__fadeOutLeft").hide();
                        $(".step-" + currentStep).show().addClass("animate__animated animate__fadeInRight");
                        updateProgressBar();
                    }, 500);
                }
            });

            $(".prev-step").click(function () {
                if (currentStep > 1) {
                    $(".step-" + currentStep).addClass("animate__animated animate__fadeOutRight");
                    // $(".circle-" + currentStep).removeClass("active");
                    currentStep--;
                    setTimeout(function () {
                        $(".step").removeClass("animate__animated animate__fadeOutRight").hide();
                        $(".step-" + currentStep).show().addClass("animate__animated animate__fadeInLeft");
                        updateProgressBar();
                    }, 500);
                }
            });

            updateProgressBar = function () {
                var progressPercentage = ((currentStep - 1) / 9) * 100;
                console.log(progressPercentage);
                $(".progress-bar").css("width", progressPercentage + "%");
            }
        });
    </script>
@endpush
