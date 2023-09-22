@extends('admin.layouts.app')
@push('style-page-level')
@endpush

@section('content')
    {{--{{dd($post)}}--}}
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

        <div class="row">
            <div class="col-md-12">

                <div class="">
                    <img class=" mb-3" src="{{ asset($broker->img) }}" style="width: 150px;" alt="no image">
                </div>
                <div class="tab-content profile-tab-cont">

                    <!-- Personal Details Tab -->
                    <div class="tab-pane fade show active" id="per_details_tab">

                        <!-- Personal Details -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title d-flex justify-content-between">
                                            <span></span>
                                            <a class="edit-link" href="{{ route('admin.broker.edit', $broker->id) }}"
                                               title="Edit"><i class="fa-solid fa-pen-to-square pr-1"
                                                               style="color: #68ee6a;"></i>Edit</a>
                                        </h5>


                                        <div class="row">
                                            <span><h3>COMPANY INFORMATION</h3></span>
{{--                                            {{dd($broker->data)}}--}}
                                           <ul style=" list-style-type: none;">

                                               <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Company Name : </b>{{$broker->data['COMPANY_INFORMATION']['name']}}</p></li>
                                               <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Regulations : </b>{{$broker->data['COMPANY_INFORMATION']['regulations']}}</p></li>
                                               <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Headquarters Country : </b>{{$broker->data['COMPANY_INFORMATION']['headcount']}}</p></li>
                                               <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Foundation Year : </b>{{$broker->data['COMPANY_INFORMATION']['foundation']}}</p></li>
                                               <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Publicly Traded : </b>{{$broker->data['COMPANY_INFORMATION']['publictrade']}}</p></li>
                                               <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Number of Employee : </b>{{$broker->data['COMPANY_INFORMATION']['noe']}}</p></li>
                                               <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Start Date : </b>{{$broker->data['COMPANY_INFORMATION']['sdate']}}</p></li>
                                               <li><p class="col-sm-12 text-muted mb-0 mb-sm-3"><b>End Date : </b>{{$broker->data['COMPANY_INFORMATION']['edate']}}</p></li>
                                               <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Status : </b> @if($broker->is_active == 0)<span>De-Active</span>@else<span>Active</span>@endif</p></li>
                                           </ul>
                                        </div>
                                        <div class="row">
                                            <span><h3>DEPOSIT & WITHDRAWAL</h3></span>
{{--                                            {{dd($broker->data)}}--}}
                                           <ul style=" list-style-type: none;">

                                               <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Deposit Option : </b>{{$broker->data['DEPOSIT_&_WITHDRAWAL']['depositoption']}}</p></li>
                                               <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Withdrawal Option : </b>{{$broker->data['DEPOSIT_&_WITHDRAWAL']['withdrawaloption']}}</p></li>
                                            </ul>
                                        </div>
                                        <div class="row">
                                            <span><h3>COMMISSIONS & FEES</h3></span>
{{--                                            {{dd($broker->data)}}--}}
                                           <ul style=" list-style-type: none;">

                                               <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Commission : </b>{{$broker->data['COMMISSIONS_&_FEES']['commission']}}</p></li>
                                               <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Fees : </b>{{$broker->data['COMMISSIONS_&_FEES']['fees']}}</p></li>
                                            </ul>
                                        </div>
                                        <div class="row">
                                            <span><h3>ACCOUNT INFORMATION</h3></span>
{{--                                            {{dd($broker->data)}}--}}
                                           <ul style=" list-style-type: none;">

                                               <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Trading Desk Type : </b>{{$broker->data['ACCOUNT_INFORMATION']['tgt']}}</p></li>
                                               <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Min Deposit : </b>{{$broker->data['ACCOUNT_INFORMATION']['md']}}</p></li>
                                               <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Max Leverage : </b>{{$broker->data['ACCOUNT_INFORMATION']['ml']}}</p></li>
                                               <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Mini Account : </b>{{$broker->data['ACCOUNT_INFORMATION']['ma']}}</p></li>
                                               <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Premium Account : </b>{{$broker->data['ACCOUNT_INFORMATION']['pa']}}</p></li>
                                               <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Demo Account : </b>{{$broker->data['ACCOUNT_INFORMATION']['da']}}</p></li>
                                               <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Islamic Account : </b>{{$broker->data['ACCOUNT_INFORMATION']['ia']}}</p></li>
                                               <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Segregated Account : </b>{{$broker->data['ACCOUNT_INFORMATION']['sa']}}</p></li>
                                               <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Managed Account : </b>{{$broker->data['ACCOUNT_INFORMATION']['ma']}}</p></li>
                                               <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Suitable For Beginners : </b>{{$broker->data['ACCOUNT_INFORMATION']['sfb']}}</p></li>
                                               <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Suitable For Professionals : </b>{{$broker->data['ACCOUNT_INFORMATION']['sfp']}}</p></li>
                                               <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Suitable For Scalping : </b>{{$broker->data['ACCOUNT_INFORMATION']['sfs']}}</p></li>
                                               <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Suitable For Daily trading : </b>{{$broker->data['ACCOUNT_INFORMATION']['sfdt']}}</p></li>
                                               <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Suitable For Weekly trading : </b>{{$broker->data['ACCOUNT_INFORMATION']['sfwt']}}</p></li>
                                               <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Suitable For Swing trading : </b>{{$broker->data['ACCOUNT_INFORMATION']['sfst']}}</p></li>
                                            </ul>
                                        </div>
                                        <div class="row">
                                            <span><h3>TRADABLE ASSETS</h3></span>
{{--                                                                                        {{dd($broker->data)}}--}}
                                            <ul style=" list-style-type: none;">

                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Trades Currencies : </b>{{$broker->data['TRADABLE_ASSETS']['tcu']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Trades Commodities : </b>{{$broker->data['TRADABLE_ASSETS']['tco']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Trades Indices : </b>{{$broker->data['TRADABLE_ASSETS']['ti']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Trades Stocks : </b>{{$broker->data['TRADABLE_ASSETS']['ts']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Trades CryptoCurrency : </b>{{$broker->data['TRADABLE_ASSETS']['tcc']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Trades ETF'S : </b>{{$broker->data['TRADABLE_ASSETS']['tes']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Trades Bonds : </b>{{$broker->data['TRADABLE_ASSETS']['tb']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Trades Futures : </b>{{$broker->data['TRADABLE_ASSETS']['tf']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Trades Options : </b>{{$broker->data['TRADABLE_ASSETS']['to']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Supported CryptoCoins : </b>{{$broker->data['TRADABLE_ASSETS']['scc']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Number OF Tradable Assets : </b>{{$broker->data['TRADABLE_ASSETS']['nots']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Number OF Currency Pairs : </b>{{$broker->data['TRADABLE_ASSETS']['nocp']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Number OF CryptoCurrency : </b>{{$broker->data['TRADABLE_ASSETS']['nocc']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Number OF Stocks : </b>{{$broker->data['TRADABLE_ASSETS']['nos']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Number OF Indices : </b>{{$broker->data['TRADABLE_ASSETS']['noi']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Number OF Commodities : </b>{{$broker->data['TRADABLE_ASSETS']['noc']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Number OF Futures : </b>{{$broker->data['TRADABLE_ASSETS']['nof']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Number OF Options : </b>{{$broker->data['TRADABLE_ASSETS']['noo']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Number OF Bonds : </b>{{$broker->data['TRADABLE_ASSETS']['nob']}}</p></li>
                                            </ul>
                                        </div>
                                        <div class="row">
                                            <span><h3>TRADING PLATFORMS</h3></span>
                                            <ul style=" list-style-type: none;">

                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Trading PlatForms : </b>{{$broker->data['TRADING_PLATFORMS']['tp']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>OS Compatibility : </b>{{$broker->data['TRADING_PLATFORMS']['osp']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Mobile Trading : </b>{{$broker->data['TRADING_PLATFORMS']['mt']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Trading PlatForm Supported Languages : </b>{{$broker->data['TRADING_PLATFORMS']['tpsl']}}</p></li>
                                            </ul>
                                        </div>
                                        <div class="row">
                                            <span><h3>TRADING FEATURES</h3></span>
                                            <ul style=" list-style-type: none;">

                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Educational Services: </b>{{$broker->data['TRADING_FEATURES']['es']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Social Trading / Copy Trading : </b>{{$broker->data['TRADING_FEATURES']['sct']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Trading Signals : </b>{{$broker->data['TRADING_FEATURES']['ts']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Email Alerts : </b>{{$broker->data['TRADING_FEATURES']['ema']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Guaranteed Stop Loss : </b>{{$broker->data['TRADING_FEATURES']['gsl']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Guaranteed Limit Orders : </b>{{$broker->data['TRADING_FEATURES']['glo']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Guaranteed Fills / Liquidity : </b>{{$broker->data['TRADING_FEATURES']['gfl']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>OCO Orders : </b>{{$broker->data['TRADING_FEATURES']['oco']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Trailing SP/TP : </b>{{$broker->data['TRADING_FEATURES']['rst']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Automated Trading : </b>{{$broker->data['TRADING_FEATURES']['at']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>API Trading : </b>{{$broker->data['TRADING_FEATURES']['apit']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>VPS Services : </b>{{$broker->data['TRADING_FEATURES']['vpss']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Trading From Chart : </b>{{$broker->data['TRADING_FEATURES']['tfc']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Interest On Margin : </b>{{$broker->data['TRADING_FEATURES']['iom']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Offers Hedging : </b>{{$broker->data['TRADING_FEATURES']['oh']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Offers Promotions : </b>{{$broker->data['TRADING_FEATURES']['ops']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>One-Click Trading : </b>{{$broker->data['TRADING_FEATURES']['oct']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Expert Advisors(EA) : </b>{{$broker->data['TRADING_FEATURES']['ea']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Other Trading Features : </b>{{$broker->data['TRADING_FEATURES']['otf']}}</p></li>
                                            </ul>
                                        </div>
                                        <div class="row">
                                            <span><h3>CUSTOMER SERVICE</h3></span>
{{--                                                                                        {{dd($broker->data)}}--}}
                                            <ul style=" list-style-type: none;">

                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Customer Support Languages : </b>{{$broker->data['CUSTOMER_SERVICE']['csl']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>24H Support : </b>{{$broker->data['CUSTOMER_SERVICE']['t4hs']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Support During Weekend : </b>{{$broker->data['CUSTOMER_SERVICE']['sdw']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Live Chat : </b>{{$broker->data['CUSTOMER_SERVICE']['lc']}}</p></li>
                                            </ul>
                                        </div>
                                        <div class="row">
                                            <span><h3>RESEARCH & EDUCATION</h3></span>
                                            <ul style=" list-style-type: none;">

                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Daily Market Commentary : </b>{{$broker->data['RESEARCH_&_EDUCATION']['dmc']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>News (Top-Tier Sources) : </b>{{$broker->data['RESEARCH_&_EDUCATION']['ntts']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>AutoChartist: </b>{{$broker->data['RESEARCH_&_EDUCATION']['ac']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Trading Central (Recognia) : </b>{{$broker->data['RESEARCH_&_EDUCATION']['tcr']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Delkos Research : </b>{{$broker->data['RESEARCH_&_EDUCATION']['dr']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Acuity Trading : </b>{{$broker->data['RESEARCH_&_EDUCATION']['act']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Webinars : </b>{{$broker->data['RESEARCH_&_EDUCATION']['webinar']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Video Education : </b>{{$broker->data['RESEARCH_&_EDUCATION']['ve']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Economic Calendar : </b>{{$broker->data['RESEARCH_&_EDUCATION']['ec']}}</p></li>
                                            </ul>
                                        </div>
                                        <div class="row">
                                            <span><h3>PROMOTIONS</h3></span>
                                            <ul style=" list-style-type: none;">

                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Promotions : </b>{{$broker->data['PROMOTIONS']['promotion']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Read Review : </b>{{$broker->data['PROMOTIONS']['rr']}}</p></li>
                                                <li><p class="col-sm-12 text-muted  mb-0 mb-sm-3"><b>Link: </b>{{$broker->data['PROMOTIONS']['link']}}</p></li>

                                            </ul>
                                        </div>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>


        </div>
    </div>

@endsection
@push('script-page-level')

@endpush
