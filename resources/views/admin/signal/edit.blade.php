@extends('admin.layouts.app')
@push('style-page-level')
    <style>
        .ck.ck-editor {
            max-width: 1000px;

        }

        figure {
            display: block;

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
                <div class="card">
                    <div class="card-header">
                        <h4>{{ $pageHeading }} From</h4>
                    </div>
                    <div class="card-body">
                        @include('admin.signal.form')
                    </div>
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
        var data = {
            orderTypes: [
                {
                    orderType: "Market Execution",
                    type: ["Buy", "Sell"],
                },
                {
                    orderType: "Pending Order ",
                    type: [
                        "Buy Limit",
                        "Sell Limit",
                        "Buy Stop",
                        "Sell Stop",

                    ],
                },

            ],
        };

        window.onload = function () {
            const selectOrderType = document.getElementById("orderType");
            const selectType = document.getElementById("type");
            selectType.disabled = true;

            //Add State Value to State Select option
            data.orderTypes.forEach((value) => {
                selectOrderType.appendChild(createOption(value.orderType, value.orderType));
            });

            selectOrderType.addEventListener("change", function (e) {
                selectType.disabled = false;
                data.orderTypes.forEach((detail, index) => {
                    //console.log(data.states[index].districts);
                    if (detail.orderType == e.target.value) {
                        selectType.innerHTML = "";
                        selectType.append(createOption("Select Buy Or Sell", ""));
                        data.orderTypes[index].type.forEach((type) => {
                            selectType.append(createOption(type, type));
                        });
                    }
                });
            });

            //Create New Option Tag With Value
            function createOption(displayMember, valueMember) {
                const newOption = document.createElement("option");
                newOption.value = valueMember;
                newOption.text = displayMember;
                return newOption;
            }
        };
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
            $('#category').on('change', function () {
                var category = this.value;
                $("#pair").html('');
                $.ajax({
                    url: "{{route('admin.signal.fetchPair')}}",
                    type: "POST",
                    data: {
                        category_id: category,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {

                        $('#pair').html('<option value="">----Select Pairs----</option>');
                        $.each(result.pair, function (key, value) {
                            $("#pair").append('<option value="' + value
                                .id + ' " >' + value.pair + '</option>');
                        });
                        // $('#pair').html('<option value="">Select Pairs</option>');
                    }
                });
            });

        });
    </script>
@endpush
