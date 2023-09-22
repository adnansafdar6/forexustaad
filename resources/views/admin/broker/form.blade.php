

<div class="card-body">
    <div id="container" class="container ">
        <div class="progress px-1" style="height: 3px;">
            <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0"
                 aria-valuemin="0"
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

{{--                {{dd($broker->data)}}--}}
{{--                <form class="form form-vertical" id="multi-step-form" action="{{ $action }}" method="POST"--}}
{{--                      enctype="multipart/form-data">--}}
                    <input type="hidden" value="{{ $broker->img }}" name="image">
                    @csrf
                    <input type="hidden" name="id" value="{{old('id', $broker->id )}}">
                    <input type="hidden" value="PUT" name="_method">

                    <div class="step step-1">
                        <h3>COMPANY INFORMATION</h3>
                        <input type="hidden" name="COMPANY INFORMATION[]">
                        <div class="row">
                            <div class="col">
                                @if(!is_null($broker->img))
                                    <img class="ml-4 mb-3" src="{{ asset($broker->img) }}"
                                         style="width: 100px; height: 100px;"
                                         alt="no image">
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-6 mt-3">
                                    <label for="img" style="margin-bottom: 10px;">Company Logo</label>
                                    <input type="file" id="img" class="form-control" name="img"
                                           value="{{ old('img', $broker->img) }}" {{ (($broker->id == 0 ) ? 'required' : '') }}>
                                    @if($errors->has('img'))
                                        <p class="text-danger">{{ $errors->first('img') }}</p>
                                    @endif

                                </div>
                                <div class="col-6 mt-3">
{{--                                    {{dd($broker)}}--}}
                                    <label for="title" style="margin-bottom: 10px;">Company Name</label>
                                    <input type="text" id="title" class="form-control" name="name"
                                           value="{{ $broker->data!=null ? old('name', $broker->data['COMPANY_INFORMATION']['name']) : '' }}"
                                           placeholder="Enter Name" required>
                                    @if($errors->has('name'))
                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                    @endif
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="title" style="margin-bottom: 10px;">Regulations</label>
                                    <input type="text" id="title" class="form-control" name="regulations"
                                           value="{{ $broker->data!=null ? old('regulations', $broker->data['COMPANY_INFORMATION']['regulations']) : '' }}"
                                           placeholder="Enter Title" required>
                                    @if($errors->has('regulations'))
                                        <p class="text-danger">{{ $errors->first('regulations') }}</p>
                                    @endif
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="title" style="margin-bottom: 10px;">Headquarters Country</label>
                                    <input type="text" id="title" class="form-control" name="headcount"
                                           value="{{ $broker->data!=null ? old('headcount', $broker->data['COMPANY_INFORMATION']['headcount']) : '' }}"
                                           placeholder="Enter Country" required>
                                    @if($errors->has('headcount'))
                                        <p class="text-danger">{{ $errors->first('headcount') }}</p>
                                    @endif
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="title" style="margin-bottom: 10px;">Foundation Year</label>
                                    <input type="text" id="title" class="form-control" name="foundation"
                                           value="{{ $broker->data!=null ? old('foundation', $broker->data['COMPANY_INFORMATION']['foundation']) : '' }}"
                                           placeholder="Enter Foundation" required>
                                    @if($errors->has('foundation'))
                                        <p class="text-danger">{{ $errors->first('foundation') }}</p>
                                    @endif
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="title" style="margin-bottom: 10px;">Publicly Traded </label>
                                    <input type="text" id="title" class="form-control" name="publictrade"
                                           value="{{ $broker->data!=null ? old('publictrade', $broker->data['COMPANY_INFORMATION']['publictrade']) : '' }}"
                                           placeholder="Enter Publicly Traded" required>
                                    @if($errors->has('publictrade'))
                                        <p class="text-danger">{{ $errors->first('publictrade') }}</p>
                                    @endif
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="title" style="margin-bottom: 10px;">Number of Employee </label>
                                    <input type="text" id="title" class="form-control" name="noe"
                                           value="{{ $broker->data!=null ? old('noe', $broker->data['COMPANY_INFORMATION']['noe']) : '' }}"
                                           placeholder="Enter Number" required>
                                    @if($errors->has('noe'))
                                        <p class="text-danger">{{ $errors->first('noe') }}</p>
                                    @endif
                                </div>

                                <div class="col-6 mt-3">
                                    <label for="title" style="margin-bottom: 10px;">Start Date</label>
                                    <input type="date" id="title" class="form-control" name="sdate"
                                           value="{{ $broker->data!=null ? old('sdate', $broker->data['COMPANY_INFORMATION']['sdate']) : '' }}"
                                           placeholder="Enter Date" required>
                                    @if($errors->has('sdate'))
                                        <p class="text-danger">{{ $errors->first('sdate') }}</p>
                                    @endif
                                </div>
                                <div class="col-6 mt-3">
                                    <label for="title" style="margin-bottom: 10px;">End Date</label>
                                    <input type="date" id="title" class="form-control" name="edate"
                                           value="{{ $broker->data!=null ? old('edate', $broker->data['COMPANY_INFORMATION']['edate']) : '' }}"
                                           placeholder="Enter Date" required>
                                    @if($errors->has('edate'))
                                        <p class="text-danger">{{ $errors->first('edate') }}</p>
                                    @endif
                                </div>
                                <div class="row ml-2 mt-4">
                                    <div class="col-2 ">
                                        <input class="form-check-input" id="is_active" type="checkbox"
                                               name="is_active" {{ old('is_active', $broker->is_active) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">
                                            &nbsp;&nbsp;Is Active
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end mt-4">

                                    <button type="button" class="btn btn-primary me-1 mb-1 next-step">Next</button>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="step step-2">
                        <!-- Step 1 form fields here -->
                        <h3>DEPOSIT & WITHDRAWAL</h3>
                        <input type="hidden" name="DEPOSIT & WITHDRAWAL[]">
                        <div class="row">

                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Deposit Option</label>
                                <input type="text" id="title" class="form-control" name="depositoption"
                                       value="{{ $broker->data!=null ? old('depositoption', $broker->data['DEPOSIT_&_WITHDRAWAL']['depositoption']) : '' }}"
                                       placeholder="Enter Deposit Option" required>
                                @if($errors->has('depositoption'))
                                    <p class="text-danger">{{ $errors->first('depositoption') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Withdrawal Option</label>
                                <input type="text" id="title" class="form-control" name="withdrawaloption"
                                       value="{{ $broker->data!=null ? old('withdrawaloption', $broker->data['DEPOSIT_&_WITHDRAWAL']['withdrawaloption']) : '' }}"
                                       placeholder="Enter Withdrawal Option" required>
                                @if($errors->has('withdrawaloption'))
                                    <p class="text-danger">{{ $errors->first('withdrawaloption') }}</p>
                                @endif
                            </div>
                            <div class="col-12 d-flex justify-content-end mt-4">
                                <button type="button" class="btn btn-primary me-1 mb-1 prev-step">Previous</button>
                                <button type="button" class="btn btn-primary me-1 mb-1 next-step">Next</button>

                            </div>
                        </div>
                    </div>
                    <div class="step step-3">
                        <!-- Step 1 form fields here -->
                        <h3>COMMISSIONS & FEES</h3>
                        <input type="hidden" name="COMMISSIONS & FEES[]">
                        <div class="row">

                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Commission</label>
                                <input type="text" id="title" class="form-control" name="commission"
                                       value="{{ $broker->data!=null ? old('commission', $broker->data['COMMISSIONS_&_FEES']['commission']) : '' }}"
                                       placeholder="Enter Commission" required>
                                @if($errors->has('commission'))
                                    <p class="text-danger">{{ $errors->first('commission') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Fees</label>
                                <input type="text" id="title" class="form-control" name="fees"
                                       value="{{ $broker->data!=null ? old('fees', $broker->data['COMMISSIONS_&_FEES']['fees']) : '' }}"
                                       placeholder="Enter Fees" required>
                                @if($errors->has('fees'))
                                    <p class="text-danger">{{ $errors->first('fees') }}</p>
                                @endif
                            </div>
                            <div class="col-12 d-flex justify-content-end mt-4">
                                <button type="button" class="btn btn-primary me-1 mb-1 prev-step">Previous</button>
                                <button type="button" class="btn btn-primary me-1 mb-1 next-step">Next</button>

                            </div>
                        </div>
                    </div>
                    <div class="step step-4">

                        <h3>ACCOUNT INFORMATION</h3>
                        <input type="hidden" name="ACCOUNT INFORMATION[]">
                        <div class="row">
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Trading Desk Type</label>
                                <input type="text" id="title" class="form-control" name="tgt"
                                       value="{{ $broker->data!=null ? old('tgt', $broker->data['ACCOUNT_INFORMATION']['tgt']) : '' }}"
                                       placeholder="Enter Trading Desk Type" required>
                                @if($errors->has('tgt'))
                                    <p class="text-danger">{{ $errors->first('tgt') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Min Deposit</label>
                                <input type="text" id="title" class="form-control" name="md"
                                       value="{{ $broker->data!=null ? old('md', $broker->data['ACCOUNT_INFORMATION']['md']) : '' }}"
                                       placeholder="Enter Min Deposit" required>
                                @if($errors->has('md'))
                                    <p class="text-danger">{{ $errors->first('md') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Max Leverage</label>
                                <input type="text" id="title" class="form-control" name="ml"
                                       value="{{ $broker->data!=null ? old('ml', $broker->data['ACCOUNT_INFORMATION']['ml']) : '' }}"
                                       placeholder="Enter Max Leverage" required>
                                @if($errors->has('ml'))
                                    <p class="text-danger">{{ $errors->first('ml') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Mini Account</label>
                                <input type="text" id="title" class="form-control" name="ma"
                                       value="{{ $broker->data!=null ? old('ma', $broker->data['ACCOUNT_INFORMATION']['ma']) : '' }}"
                                       placeholder="Enter Mini Account" required>
                                @if($errors->has('ma'))
                                    <p class="text-danger">{{ $errors->first('ma') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Premium Account</label>
                                <input type="text" id="title" class="form-control" name="pa"
                                       value="{{ $broker->data!=null ? old('pa', $broker->data['ACCOUNT_INFORMATION']['pa']) : '' }}"
                                       placeholder="Enter Premium Account" required>
                                @if($errors->has('pa'))
                                    <p class="text-danger">{{ $errors->first('pa') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Demo Account</label>
                                <input type="text" id="title" class="form-control" name="da"
                                       value="{{ $broker->data!=null ? old('da', $broker->data['ACCOUNT_INFORMATION']['da']) : '' }}"
                                       placeholder="Enter Demo Account" required>
                                @if($errors->has('da'))
                                    <p class="text-danger">{{ $errors->first('da') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Islamic Account</label>
                                <input type="text" id="title" class="form-control" name="ia"
                                       value="{{ $broker->data!=null ? old('ia', $broker->data['ACCOUNT_INFORMATION']['ia']) : '' }}"
                                       placeholder="Enter Islamic Account" required>
                                @if($errors->has('ia'))
                                    <p class="text-danger">{{ $errors->first('ia') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Segregated Account</label>
                                <input type="text" id="title" class="form-control" name="sa"
                                       value="{{ $broker->data!=null ? old('sa', $broker->data['ACCOUNT_INFORMATION']['sa']) : '' }}"
                                       placeholder="Enter Segregated Account" required>
                                @if($errors->has('sa'))
                                    <p class="text-danger">{{ $errors->first('sa') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Managed Account</label>
                                <input type="text" id="title" class="form-control" name="ma"
                                       value="{{ $broker->data!=null ? old('ma', $broker->data['ACCOUNT_INFORMATION']['ma']) : '' }}"
                                       placeholder="Enter Managed Account" required>
                                @if($errors->has('ma'))
                                    <p class="text-danger">{{ $errors->first('ma') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Suitable For Beginners</label>
                                <input type="text" id="title" class="form-control" name="sfb"
                                       value="{{ $broker->data!=null ? old('sfb', $broker->data['ACCOUNT_INFORMATION']['sfb']) : '' }}"
                                       placeholder="Enter For Beginners" required>
                                @if($errors->has('sfb'))
                                    <p class="text-danger">{{ $errors->first('sfb') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Suitable For Professionals</label>
                                <input type="text" id="title" class="form-control" name="sfp"
                                       value="{{ $broker->data!=null ? old('sfp', $broker->data['ACCOUNT_INFORMATION']['sfp']) : '' }}"
                                       placeholder="Enter For Professionals" required>
                                @if($errors->has('sfp'))
                                    <p class="text-danger">{{ $errors->first('sfp') }}</p>
                                @endif
                            </div>

                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Suitable For Scalping</label>
                                <input type="text" id="title" class="form-control" name="sfs"
                                       value="{{ $broker->data!=null ? old('sfs', $broker->data['ACCOUNT_INFORMATION']['sfs']) : '' }}"
                                       placeholder="Enter For Scalping" required>
                                @if($errors->has('sfs'))
                                    <p class="text-danger">{{ $errors->first('sfs') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Suitable For Daily trading</label>
                                <input type="text" id="title" class="form-control" name="sfdt"
                                       value="{{ $broker->data!=null ? old('sfdt', $broker->data['ACCOUNT_INFORMATION']['sfdt']) : '' }}"
                                       placeholder="Enter For Daily trading" required>
                                @if($errors->has('sfdt'))
                                    <p class="text-danger">{{ $errors->first('sfdt') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Suitable For Weekly trading</label>
                                <input type="text" id="title" class="form-control" name="sfwt"
                                       value="{{ $broker->data!=null ? old('sfwt', $broker->data['ACCOUNT_INFORMATION']['sfwt']) : '' }}"
                                       placeholder="Enter For Weekly trading" required>
                                @if($errors->has('sfwt'))
                                    <p class="text-danger">{{ $errors->first('sfwt') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Suitable For Swing trading</label>
                                <input type="text" id="title" class="form-control" name="sfst"
                                       value="{{ $broker->data!=null ? old('sfst', $broker->data['ACCOUNT_INFORMATION']['sfst']) : '' }}"
                                       placeholder="Enter For Swing trading" required>
                                @if($errors->has('sfst'))
                                    <p class="text-danger">{{ $errors->first('sfst') }}</p>
                                @endif
                            </div>

                            <div class="col-12 d-flex justify-content-end mt-4">
                                <button type="button" class="btn btn-primary me-1 mb-1 prev-step">Previous</button>
                                <button type="button" class="btn btn-primary me-1 mb-1 next-step">Next</button>

                            </div>
                        </div>
                    </div>
                    <div class="step step-5">

                        <h3>TRADABLE ASSETS</h3>
                        <input type="hidden" name="TRADABLE ASSETS[]">
                        <div class="row">
                            {{--            <div class="col-4 mt-3">--}}
                            {{--                <div class="container1">--}}
                            {{--                    <label for="title" style="margin-bottom: 10px;">Take Profit</label>--}}
                            {{--                    <div class="input-group">--}}
                            {{--                        <input type="text" class="form-control" step="any" name="takeprofit[]">--}}
                            {{--                        <span class="input-group-text"><i class="fa-solid fa-plus fa-xl add_form_field"--}}
                            {{--                                                          style="color: #18d3ec;"></i></span>--}}
                            {{--                        @if($errors->has('takeprofit'))--}}
                            {{--                            <p class="text-danger">{{ $errors->first('takeprofit') }}</p>--}}
                            {{--                        @endif--}}
                            {{--                    </div>--}}
                            {{--                </div>--}}
                            {{--            </div>--}}
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Trades Currencies</label>
                                <input type="text" id="title" class="form-control" name="tcu"
                                       value="{{ $broker->data!=null ? old('tcu', $broker->data['TRADABLE_ASSETS']['tcu']) : '' }}"
                                       placeholder="Enter Trades Currencies" required>
                                @if($errors->has('tcu'))
                                    <p class="text-danger">{{ $errors->first('tcu') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Trades Commodities</label>
                                <input type="text" id="title" class="form-control" name="tco"
                                       value="{{ $broker->data!=null ? old('tco', $broker->data['TRADABLE_ASSETS']['tco']) : '' }}"
                                       placeholder="Enter Trades Commodities" required>
                                @if($errors->has('tco'))
                                    <p class="text-danger">{{ $errors->first('tco') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Trades Indices</label>
                                <input type="text" id="title" class="form-control" name="ti"
                                       value="{{ $broker->data!=null ? old('ti', $broker->data['TRADABLE_ASSETS']['ti']) : '' }}"
                                       placeholder="Enter Trades Indices" required>
                                @if($errors->has('ti'))
                                    <p class="text-danger">{{ $errors->first('ti') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Trades Stocks</label>
                                <input type="text" id="title" class="form-control" name="ts"
                                       value="{{ $broker->data!=null ? old('ts', $broker->data['TRADABLE_ASSETS']['ts']) : '' }}"
                                       placeholder="Enter Trades Stocks" required>
                                @if($errors->has('ts'))
                                    <p class="text-danger">{{ $errors->first('ts') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Trades CryptoCurrency</label>
                                <input type="text" id="title" class="form-control" name="tcc"
                                       value="{{ $broker->data!=null ? old('tcc', $broker->data['TRADABLE_ASSETS']['tcc']) : '' }}"
                                       placeholder="Enter Trades CryptoCurrency" required>
                                @if($errors->has('tcc'))
                                    <p class="text-danger">{{ $errors->first('tcc') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Trades ETF'S</label>
                                <input type="text" id="title" class="form-control" name="tes"
                                       value="{{ $broker->data!=null ? old('tes', $broker->data['TRADABLE_ASSETS']['tes']) : '' }}"
                                       placeholder="Enter ETF'S" required>
                                @if($errors->has('tes'))
                                    <p class="text-danger">{{ $errors->first('tes') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Trades Bonds</label>
                                <input type="text" id="title" class="form-control" name="tb"
                                       value="{{ $broker->data!=null ? old('tb', $broker->data['TRADABLE_ASSETS']['tb']) : '' }}"
                                       placeholder="Enter Bonds" required>
                                @if($errors->has('tb'))
                                    <p class="text-danger">{{ $errors->first('tb') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Trades Futures</label>
                                <input type="text" id="title" class="form-control" name="tf"
                                       value="{{ $broker->data!=null ? old('tf', $broker->data['TRADABLE_ASSETS']['tf']) : '' }}"
                                       placeholder="Enter Trades Futures" required>
                                @if($errors->has('tf'))
                                    <p class="text-danger">{{ $errors->first('tf') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Trades Otions</label>
                                <input type="text" id="title" class="form-control" name="to"
                                       value="{{ $broker->data!=null ? old('to', $broker->data['TRADABLE_ASSETS']['to']) : '' }}"
                                       placeholder="Enter MTrades Otions" required>
                                @if($errors->has('to'))
                                    <p class="text-danger">{{ $errors->first('to') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Supported CryptoCoins</label>
                                <input type="text" id="title" class="form-control" name="scc"
                                       value="{{ $broker->data!=null ? old('scc', $broker->data['TRADABLE_ASSETS']['scc']) : '' }}"
                                       placeholder="Enter Supported CryptoCoins" required>
                                @if($errors->has('scc'))
                                    <p class="text-danger">{{ $errors->first('scc') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Number OF Tradable Assets</label>
                                <input type="text" id="title" class="form-control" name="nots"
                                       value="{{ $broker->data!=null ? old('nots', $broker->data['TRADABLE_ASSETS']['nots']) : '' }}"
                                       placeholder="Enter Number OF Tradable Assets" required>
                                @if($errors->has('nots'))
                                    <p class="text-danger">{{ $errors->first('nots') }}</p>
                                @endif
                            </div>

                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Number OF Currency Pairs</label>
                                <input type="text" id="title" class="form-control" name="nocp"
                                       value="{{ $broker->data!=null ? old('nocp', $broker->data['TRADABLE_ASSETS']['nocp']) : '' }}"
                                       placeholder="Enter Number OF Currency Pairs" required>
                                @if($errors->has('nocp'))
                                    <p class="text-danger">{{ $errors->first('nocp') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Number OF CryptoCurrency</label>
                                <input type="text" id="title" class="form-control" name="nocc"
                                       value="{{ $broker->data!=null ? old('nocc', $broker->data['TRADABLE_ASSETS']['nocc']) : '' }}"
                                       placeholder="Enter Number OF CryptoCurrency" required>
                                @if($errors->has('nocc'))
                                    <p class="text-danger">{{ $errors->first('nocc') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Number OF Stocks</label>
                                <input type="text" id="title" class="form-control" name="nos"
                                       value="{{ $broker->data!=null ? old('nos', $broker->data['TRADABLE_ASSETS']['nos']) : '' }}"
                                       placeholder="Enter Number OF Stocks" required>
                                @if($errors->has('nos'))
                                    <p class="text-danger">{{ $errors->first('nos') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Number OF Indices</label>
                                <input type="text" id="title" class="form-control" name="noi"
                                       value="{{ $broker->data!=null ? old('noi', $broker->data['TRADABLE_ASSETS']['noi']) : '' }}"
                                       placeholder="Enter Number OF Indices" required>
                                @if($errors->has('noi'))
                                    <p class="text-danger">{{ $errors->first('noi') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Number OF Commodities</label>
                                <input type="text" id="title" class="form-control" name="noc"
                                       value="{{ $broker->data!=null ? old('noc', $broker->data['TRADABLE_ASSETS']['noc']) : '' }}"
                                       placeholder="Enter Number OF Commodities" required>
                                @if($errors->has('noc'))
                                    <p class="text-danger">{{ $errors->first('noc') }}</p>
                                @endif
                            </div>
{{--                            {{dd($broker)}}--}}
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Number OF Futures</label>
                                <input type="text" id="title" class="form-control" name="nof"
                                       value="{{ $broker->data!=null ? old('nof', $broker->data['TRADABLE_ASSETS']['nof']) : '' }}"
                                       placeholder="Enter Number OF Futures" required>
                                @if($errors->has('nof'))
                                    <p class="text-danger">{{ $errors->first('nof') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Number OF Options</label>
                                <input type="text" id="title" class="form-control" name="noo"
                                       value="{{ $broker->data!=null ? old('noo', $broker->data['TRADABLE_ASSETS']['noo']) : '' }}"
                                       placeholder="Enter Number OF Options" required>
                                @if($errors->has('noo'))
                                    <p class="text-danger">{{ $errors->first('noo') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Number OF Bonds</label>
                                <input type="text" id="title" class="form-control" name="nob"
                                       value="{{ $broker->data!=null ? old('nob', $broker->data['TRADABLE_ASSETS']['nob']) : '' }}"
                                       placeholder="Enter Number OF Bonds" required>
                                @if($errors->has('nob'))
                                    <p class="text-danger">{{ $errors->first('nob') }}</p>
                                @endif
                            </div>

                            <div class="col-12 d-flex justify-content-end mt-4">
                                <button type="button" class="btn btn-primary me-1 mb-1 prev-step">Previous</button>
                                <button type="button" class="btn btn-primary me-1 mb-1 next-step">Next</button>

                            </div>
                        </div>
                    </div>
                    <div class="step step-6">
                        <h3>TRADING PLATFORMS</h3>
                        <input type="hidden" name="TRADING PLATFORMS[]">
                        <div class="row">

                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Trading PlatForms</label>
                                <input type="text" id="title" class="form-control" name="tp"
                                       value="{{ $broker->data!=null ? old('tp', $broker->data['TRADING_PLATFORMS']['tp']) : '' }}"
                                       placeholder="Enter Trading PlatForms" required>
                                @if($errors->has('tp'))
                                    <p class="text-danger">{{ $errors->first('tp') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">OS Compatibility</label>
                                <input type="text" id="title" class="form-control" name="osp"
                                       value="{{ $broker->data!=null ? old('osp', $broker->data['TRADING_PLATFORMS']['osp']) : '' }}"
                                       placeholder="Enter OS Compatibility" required>
                                @if($errors->has('osp'))
                                    <p class="text-danger">{{ $errors->first('osp') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Mobile Trading</label>
                                <input type="text" id="title" class="form-control" name="mt"
                                       value="{{ $broker->data!=null ? old('mt', $broker->data['TRADING_PLATFORMS']['mt']) : '' }}"
                                       placeholder="Enter Mobile Trading" required>
                                @if($errors->has('mt'))
                                    <p class="text-danger">{{ $errors->first('mt') }}</p>
                                @endif
                            </div>
                            <div class="col-12 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Trading PlatForm Supported
                                    Languages</label>
                                <textarea type="text" id="title" class="form-control" style="height: 100px;" name="tpsl"
                                          placeholder="Enter Trading PlatForm Supported Languages"
                                          required>{{ $broker->data!=null ? old('tpsl', $broker->data['TRADING_PLATFORMS']['tpsl']) : '' }}</textarea>
                                @if($errors->has('tpsl'))
                                    <p class="text-danger">{{ $errors->first('tpsl') }}</p>
                                @endif
                            </div>
                            <div class="col-12 d-flex justify-content-end mt-4">
                                <button type="button" class="btn btn-primary me-1 mb-1 prev-step">Previous</button>
                                <button type="button" class="btn btn-primary me-1 mb-1 next-step">Next</button>

                            </div>
                        </div>
                    </div>
                    <div class="step step-7">
                        <h3>TRADING FEATURES</h3>
                        <input type="hidden" name="TRADING FEATURES[]">
                        <div class="row">

                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Educational Services</label>
                                <input type="text" id="title" class="form-control" name="es"
                                       value="{{ $broker->data!=null ? old('es', $broker->data['TRADING_FEATURES']['es']) : '' }}"
                                       placeholder="Enter Educational Services" required>
                                @if($errors->has('es'))
                                    <p class="text-danger">{{ $errors->first('es') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Social Trading / Copy Trading</label>
                                <input type="text" id="title" class="form-control" name="sct"
                                       value="{{ $broker->data!=null ? old('sct', $broker->data['TRADING_FEATURES']['sct']) : '' }}"
                                       placeholder="Enter Social / Copy Trading" required>
                                @if($errors->has('sct'))
                                    <p class="text-danger">{{ $errors->first('sct') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Trading Signals</label>
                                <input type="text" id="title" class="form-control" name="ts"
                                       value="{{ $broker->data!=null ? old('ts', $broker->data['TRADING_FEATURES']['ts']) : '' }}"
                                       placeholder="Enter Trading Signals" required>
                                @if($errors->has('ts'))
                                    <p class="text-danger">{{ $errors->first('ts') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Email Alerts</label>
                                <input type="text" id="title" class="form-control" name="ema"
                                       value="{{ $broker->data!=null ? old('ema', $broker->data['TRADING_FEATURES']['ema']) : '' }}"
                                       placeholder="Enter Email Alerts" required>
                                @if($errors->has('ema'))
                                    <p class="text-danger">{{ $errors->first('ema') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Guaranteed Stop Loss</label>
                                <input type="text" id="title" class="form-control" name="gsl"
                                       value="{{ $broker->data!=null ? old('gsl', $broker->data['TRADING_FEATURES']['gsl']) : '' }}"
                                       placeholder="Enter Guaranteed Stop Loss" required>
                                @if($errors->has('gsl'))
                                    <p class="text-danger">{{ $errors->first('gsl') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Guaranteed Limit Orders</label>
                                <input type="text" id="title" class="form-control" name="glo"
                                       value="{{ $broker->data!=null ? old('glo', $broker->data['TRADING_FEATURES']['glo']) : '' }}"
                                       placeholder="Enter Guaranteed Limit Orders" required>
                                @if($errors->has('glo'))
                                    <p class="text-danger">{{ $errors->first('glo') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Guaranteed Fills / Liquidity</label>
                                <input type="text" id="title" class="form-control" name="gfl"
                                       value="{{ $broker->data!=null ? old('gfl', $broker->data['TRADING_FEATURES']['gfl']) : '' }}"
                                       placeholder="Enter Guaranteed Fills / Liquidity" required>
                                @if($errors->has('gfl'))
                                    <p class="text-danger">{{ $errors->first('gfl') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">OCO Orders</label>
                                <input type="text" id="title" class="form-control" name="oco"
                                       value="{{ $broker->data!=null ? old('oco', $broker->data['TRADING_FEATURES']['oco']) : '' }}"
                                       placeholder="Enter OCO Orders" required>
                                @if($errors->has('oco'))
                                    <p class="text-danger">{{ $errors->first('oco') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Trailing SP/TP</label>
                                <input type="text" id="title" class="form-control" name="rst"
                                       value="{{ $broker->data!=null ? old('rst', $broker->data['TRADING_FEATURES']['rst']) : '' }}"
                                       placeholder="Enter Trailing SP/TP" required>
                                @if($errors->has('rst'))
                                    <p class="text-danger">{{ $errors->first('rst') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Automated Trading</label>
                                <input type="text" id="title" class="form-control" name="at"
                                       value="{{ $broker->data!=null ? old('at', $broker->data['TRADING_FEATURES']['at']) : '' }}"
                                       placeholder="Enter Automated Trading" required>
                                @if($errors->has('at'))
                                    <p class="text-danger">{{ $errors->first('at') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">API Trading</label>
                                <input type="text" id="title" class="form-control" name="apit"
                                       value="{{ $broker->data!=null ? old('apit', $broker->data['TRADING_FEATURES']['apit']) : '' }}"
                                       placeholder="Enter API Trading" required>
                                @if($errors->has('apit'))
                                    <p class="text-danger">{{ $errors->first('apit') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">VPS Services</label>
                                <input type="text" id="title" class="form-control" name="vpss"
                                       value="{{ $broker->data!=null ? old('vpss', $broker->data['TRADING_FEATURES']['vpss']) : '' }}"
                                       placeholder="Enter VPS Services" required>
                                @if($errors->has('vpss'))
                                    <p class="text-danger">{{ $errors->first('vpss') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Trading From Chart</label>
                                <input type="text" id="title" class="form-control" name="tfc"
                                       value="{{ $broker->data!=null ? old('tfc', $broker->data['TRADING_FEATURES']['tfc']) : '' }}"
                                       placeholder="Enter Trading From Chart" required>
                                @if($errors->has('tfc'))
                                    <p class="text-danger">{{ $errors->first('tfc') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Interest On Margin</label>
                                <input type="text" id="title" class="form-control" name="iom"
                                       value="{{ $broker->data!=null ? old('iom', $broker->data['TRADING_FEATURES']['iom']) : '' }}"
                                       placeholder="Enter Interest ON Margin" required>
                                @if($errors->has('iom'))
                                    <p class="text-danger">{{ $errors->first('iom') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Offers Hedging</label>
                                <input type="text" id="title" class="form-control" name="oh"
                                       value="{{ $broker->data!=null ? old('oh', $broker->data['TRADING_FEATURES']['oh']) : '' }}"
                                       placeholder="Enter Offers Hedging" required>
                                @if($errors->has('oh'))
                                    <p class="text-danger">{{ $errors->first('oh') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Offers Promotions</label>
                                <input type="text" id="title" class="form-control" name="ops"
                                       value="{{ $broker->data!=null ? old('ops', $broker->data['TRADING_FEATURES']['ops']) : '' }}"
                                       placeholder="Enter Offers Promotions" required>
                                @if($errors->has('ops'))
                                    <p class="text-danger">{{ $errors->first('ops') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">One-Click Trading</label>
                                <input type="text" id="title" class="form-control" name="oct"
                                       value="{{ $broker->data!=null ? old('oct', $broker->data['TRADING_FEATURES']['oct']) : '' }}"
                                       placeholder="Enter One-Click Trading" required>
                                @if($errors->has('oct'))
                                    <p class="text-danger">{{ $errors->first('oct') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Expert Advisors(EA)</label>
                                <input type="text" id="title" class="form-control" name="ea"
                                       value="{{ $broker->data!=null ? old('ea', $broker->data['TRADING_FEATURES']['ea']) : '' }}"
                                       placeholder="Enter Expert Advisors(EA)" required>
                                @if($errors->has('ea'))
                                    <p class="text-danger">{{ $errors->first('ea') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Other Trading Features</label>
                                <input type="text" id="title" class="form-control" name="otf"
                                       value="{{ $broker->data!=null ? old('otf', $broker->data['TRADING_FEATURES']['otf']) : '' }}"
                                       placeholder="Enter Other Trading Features" required>
                                @if($errors->has('otf'))
                                    <p class="text-danger">{{ $errors->first('otf') }}</p>
                                @endif
                            </div>


                            <div class="col-12 d-flex justify-content-end mt-4">
                                <button type="button" class="btn btn-primary me-1 mb-1 prev-step">Previous</button>
                                <button type="button" class="btn btn-primary me-1 mb-1 next-step">Next</button>

                            </div>
                        </div>
                    </div>
                    <div class="step step-8">
                        <h3>CUSTOMER SERVICE</h3>
                        <input type="hidden" name="CUSTOMER SERVICE[]">
                        <div class="row">
                            <div class="col-12 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Customer Support Languages</label>
                                <textarea type="text" id="title" class="form-control" style="height: 100px;" name="csl"
                                          placeholder="Enter Customer Support Languages"
                                          required>{{ $broker->data!=null ? old('csl', $broker->data['CUSTOMER_SERVICE']['csl']) : '' }}</textarea>
                                @if($errors->has('csl'))
                                    <p class="text-danger">{{ $errors->first('csl') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">24H Support</label>
                                <input type="text" id="title" class="form-control" name="t4hs"
                                       value="{{ $broker->data!=null ? old('t4hs', $broker->data['CUSTOMER_SERVICE']['t4hs']) : '' }}"
                                       placeholder="Enter Trading PlatForms" required>
                                @if($errors->has('t4hs'))
                                    <p class="text-danger">{{ $errors->first('t4hs') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Support During Weekend</label>
                                <input type="text" id="title" class="form-control" name="sdw"
                                       value="{{ $broker->data!=null ? old('sdw', $broker->data['CUSTOMER_SERVICE']['sdw']) : '' }}"
                                       placeholder="Enter Support During Weekend" required>
                                @if($errors->has('sdw'))
                                    <p class="text-danger">{{ $errors->first('sdw') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Live Chat</label>
                                <input type="text" id="title" class="form-control" name="lc"
                                       value="{{ $broker->data!=null ? old('lc', $broker->data['CUSTOMER_SERVICE']['lc']) : '' }}"
                                       placeholder="Enter Live Chat" required>
                                @if($errors->has('lc'))
                                    <p class="text-danger">{{ $errors->first('lc') }}</p>
                                @endif
                            </div>

                            <div class="col-12 d-flex justify-content-end mt-4">
                                <button type="button" class="btn btn-primary me-1 mb-1 prev-step">Previous</button>
                                <button type="button" class="btn btn-primary me-1 mb-1 next-step">Next</button>

                            </div>
                        </div>
                    </div>
                    <div class="step step-9">
                        <h3>RESEARCH & EDUCATION</h3>
                        <input type="hidden" name="RESEARCH & EDUCATION[]">
                        <div class="row">
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Daily Market Commentary</label>
                                <input type="text" id="title" class="form-control" name="dmc"
                                       value="{{ $broker->data!=null ? old('dmc', $broker->data['RESEARCH_&_EDUCATION']['dmc']) : '' }}"
                                       placeholder="Enter Daily Market Commentary" required>
                                @if($errors->has('dmc'))
                                    <p class="text-danger">{{ $errors->first('dmc') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">News (Top-Tier Sources)</label>
                                <input type="text" id="title" class="form-control" name="ntts"
                                       value="{{ $broker->data!=null ? old('ntts', $broker->data['RESEARCH_&_EDUCATION']['ntts']) : '' }}"
                                       placeholder="Enter News" required>
                                @if($errors->has('ntts'))
                                    <p class="text-danger">{{ $errors->first('ntts') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">AutoChartist</label>
                                <input type="text" id="title" class="form-control" name="ac"
                                       value="{{ $broker->data!=null ? old('ac', $broker->data['RESEARCH_&_EDUCATION']['ac']) : '' }}"
                                       placeholder="Enter AutoChartist" required>
                                @if($errors->has('ac'))
                                    <p class="text-danger">{{ $errors->first('ac') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Trading Central (Recognia)</label>
                                <input type="text" id="title" class="form-control" name="tcr"
                                       value="{{ $broker->data!=null ? old('tcr', $broker->data['RESEARCH_&_EDUCATION']['tcr']) : '' }}"
                                       placeholder="Enter Trading Central (Recognia)" required>
                                @if($errors->has('tcr'))
                                    <p class="text-danger">{{ $errors->first('tcr') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Delkos Research</label>
                                <input type="text" id="title" class="form-control" name="dr"
                                       value="{{ $broker->data!=null ? old('dr', $broker->data['RESEARCH_&_EDUCATION']['dr']) : '' }}"
                                       placeholder="Enter Delkos Research" required>
                                @if($errors->has('dr'))
                                    <p class="text-danger">{{ $errors->first('dr') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Acuity Trading</label>
                                <input type="text" id="title" class="form-control" name="act"
                                       value="{{ $broker->data!=null ? old('act', $broker->data['RESEARCH_&_EDUCATION']['act']) : '' }}"
                                       placeholder="Enter Acuity Trading" required>
                                @if($errors->has('act'))
                                    <p class="text-danger">{{ $errors->first('act') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Webinars</label>
                                <input type="text" id="title" class="form-control" name="webinar"
                                       value="{{ $broker->data!=null ? old('webinar', $broker->data['RESEARCH_&_EDUCATION']['webinar']) : '' }}"
                                       placeholder="Enter Webinars" required>
                                @if($errors->has('webinar'))
                                    <p class="text-danger">{{ $errors->first('webinar') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Video Education</label>
                                <input type="text" id="title" class="form-control" name="ve"
                                       value="{{ $broker->data!=null ? old('ve', $broker->data['RESEARCH_&_EDUCATION']['ve']) : '' }}"
                                       placeholder="Enter Video Education" required>
                                @if($errors->has('ve'))
                                    <p class="text-danger">{{ $errors->first('ve') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Economic Calendar</label>
                                <input type="text" id="title" class="form-control" name="ec"
                                       value="{{ $broker->data!=null ? old('ec', $broker->data['RESEARCH_&_EDUCATION']['ec']) : '' }}"
                                       placeholder="Enter Economic Calendar" required>
                                @if($errors->has('ec'))
                                    <p class="text-danger">{{ $errors->first('ec') }}</p>
                                @endif
                            </div>

                            <div class="col-12 d-flex justify-content-end mt-4">
                                <button type="button" class="btn btn-primary me-1 mb-1 prev-step">Previous</button>
                                <button type="button" class="btn btn-primary me-1 mb-1 next-step">Next</button>

                            </div>
                        </div>
                    </div>
                    <div class="step step-10">
                        <h3>PROMOTIONS</h3>
                        <input type="hidden" name="PROMOTIONS[]">
                        <div class="row">

                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Promotions</label>
                                <input type="text" id="title" class="form-control" name="promotion"
                                       value="{{ $broker->data!=null ? old('promotion', $broker->data['PROMOTIONS']['promotion']) : '' }}"
                                       placeholder="Enter Promotions" required>
                                @if($errors->has('promotion'))
                                    <p class="text-danger">{{ $errors->first('promotion') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Read Review</label>
                                <input type="text" id="title" class="form-control" name="rr"
                                       value="{{ $broker->data!=null ? old('rr', $broker->data['PROMOTIONS']['rr']) : '' }}"
                                       placeholder="Enter Read Review" required>
                                @if($errors->has('rr'))
                                    <p class="text-danger">{{ $errors->first('rr') }}</p>
                                @endif
                            </div>
                            <div class="col-6 mt-3">
                                <label for="title" style="margin-bottom: 10px;">Link</label>
                                <input type="text" id="title" class="form-control" name="link"
                                       value="{{ $broker->data!=null ? old('link', $broker->data['PROMOTIONS']['link']) : '' }}"
                                       placeholder="Enter Link" required>
                                @if($errors->has('link'))
                                    <p class="text-danger">{{ $errors->first('link') }}</p>
                                @endif
                            </div>

                            <div class="col-12 d-flex justify-content-end mt-4">
                                <button type="button" class="btn btn-primary me-1 mb-1 prev-step">Previous</button>
                                <button type="submit" class="btn btn-success me-1 mb-1 next-step">Submit</button>

                            </div>
                        </div>
                    </div>
{{--                </form>--}}
            </div>
        </div>
    </div>
</div>
