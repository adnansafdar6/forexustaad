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

    <div class="content container-fluid">
        <!-- Page Header -->
        <div class="page-header">
            <div class="row">
                <div class="col">
                    @include('admin.common.breadcrumbs')

                </div>
            </div>
        </div>
        <!-- /Page Header -->
        <div class="row border shadow p-2">
            <div class="col-12 col-sm-12 col-md-12 mt-2 ">
                <form class="form form-vertical" id="multi-step-form" action="{{ $action }}" method="POST"
                      enctype="multipart/form-data">
                <div class="card">
                    <div class="card-header">
                        <div class="row mb-4">
                            <div class="col-4">
                                <h4>{{ $pageHeading }} From</h4>
                            </div>
                            <div class="col-5">
                                <label for="title" style="margin-bottom: 10px;">Select Category</label>
                                <select type="number" class="custom-select" name="category_id" required>
                                    <option disabled>----Select Category----</option>
                                    @if($categories->isNotEmpty())
                                        @foreach($categories[0]['subcategories'] as  $value)
                                            <option value="{{ $value->id }}">{{ ucfirst( $value->name) }}</option>
                                        @endforeach
                                    @endif

                                </select>
                                @if($errors->has('category_id'))
                                    <p class="text-danger">{{ $errors->first('category_id') }}</p>
                                @endif
                            </div>

                        </div>


                    </div>
                </div>
                @include('admin.broker.form')
                </form>
            </div>
        </div>
    </div>
    </div>

@endsection
@push('script-page-level')
    <script type="text/javascript">
        ClassicEditor
            .create(document.querySelector('#ckeditor'), {
                ckfinder: {
                    uploadUrl: '{{route('admin.post.ckeditor').'?_token='.csrf_token()}}',

                }
            })
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.log(error);
            })
    </script>
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
    <script>
        $(document).ready(function () {
            var max_fields = 10;
            var wrapper = $(".container1");
            var add_button = $(".add_form_field");

            var x = 1;
            $(add_button).click(function (e) {
                e.preventDefault();
                if (x < max_fields) {
                    x++;
                    $(wrapper).append('<div class="rm mt-2"><label for="title" style="margin-bottom: 10px;">Take Profit ' + x + '</label>' +
                        '<div class="input-group">' +
                        '<input type="text" step="any" class="form-control" name="takeprofit[]">' +
                        '<span class="input-group-text"><i class="fa-solid fa-minus fa-xl del" style="color: #fa1900;"></i></span>' +
                        '</div></div>'); //add input box
                } else {
                    alert('You Reached the limits')
                }
            });

            $(wrapper).on("click", ".del", function (e) {
                e.preventDefault();
                $(this).closest('.rm').remove();
                // $(this).parent().parent('div').remove();
                x--;
            })
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#close-review-box3").click(function () {
                $("#post-review-box3").hide();
                $("#leavebtn3").show();
            });
            $("#open-review-box3").click(function () {
                $("#post-review-box3").show();
                $("#leavebtn3").hide();
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#close-review-box").click(function () {
                $("#post-review-box").hide();
                $("#leavebtn").show();
            });
            $("#open-review-box").click(function () {
                $("#post-review-box").show();
                $("#leavebtn").hide();
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#close-review-box2").click(function () {
                $("#post-review-box2").hide();
                $("#leavebtn2").show();
            });
            $("#open-review-box2").click(function () {
                $("#post-review-box2").show();
                $("#leavebtn2").hide();
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $("#close-publish").click(function () {
                $("#inputs").hide();
                $("#leavebtn1").show();
            });
            $("#open-publish").click(function () {
                $("#inputs").show();
                $("#leavebtn1").hide();
            });
        });
    </script>

@endpush
