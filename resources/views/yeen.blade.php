@extends('layout.default')
@section('pageStyle')
<link rel="stylesheet" href="{{ asset('assets/plugins/DataTables/media/css/dataTables.bootstrap.min.css') }}">
<link rel="stylesheet"
    href="{{ asset('assets/plugins/DataTables/extensions/Responsive/css/responsive.bootstrap.min.css') }}">
@endsection
@section('pageScript')
<script src="{{ asset('assets/plugins/DataTables/media/js/jquery.dataTables.js') }}"></script>
<script src="{{ asset('assets/plugins/DataTables/media/js/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/plugins/DataTables/extensions/Responsive/js/dataTables.responsive.min.js') }}"></script>
@endsection
@section('content')
<style>
    .searchDiv input {
        border-color: transparent;
    }

    .searchDiv input:hover {
        border-color: gray;
    }

    .tbBorder {
        padding: 20px 5px;
        border-top: 2px solid lightgray;
        border-bottom: 2px solid lightgray;
    }

    .itemDiv {
        padding: 20px 5px 53px;
        margin: 60px 15px;
        border-radius: 5px;
    }

    .itemDiv:hover {
        background-color: gray;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        left: 4px;
        bottom: 4px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:focus+.slider {
        box-shadow: 0 0 1px #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    .card {
        background-color: lightgray;
        border: 1px solid gray;
        border-radius: 7px;
    }

    .card-footer {
        padding: 20px 10px;
        border-top: 2px solid gray;
    }

    #map {
        height: 100%;
    }

</style>
<div class="panel">
    <div class="panel-heading">
        <h6 class="panel-title">Policies</h6>
        <div class="heading-elements">
            <ul class="icons-list">
                <li class="fullscreen_element"><a href="javascript:void(0)"></a></li>
                <li class="collapse_element"><a class="up" href="javascript:void(0)"></a></li>
                <li class="refresh_element"><a href="javascript:void(0)"></a></li>
                <li class="close_element"><a href="javascript:void(0)"></a></li>
            </ul>
        </div>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-lg-7">
                <h4> <a href="#">What are policies?</a></h4>
            </div>
            <div class="col-lg-2">
            </div>
            <div class='col-xs-3'>
                <button type="button" class="btn btn-block" data-toggle="modal" data-target="#exampleModal"
                    style='font-size: 16px'>
                    <i class="fas fa-plus-circle text-success"></i> Add A Policy
                </button>
            </div>
            <hr>
            <br>
            <div class='col-xs-6 searchDiv'>
                <input type='search' class='form-control' placeholder='Search'>
            </div>
            @foreach($policies as $policy)
            <div class='itemDiv' data-toggle="modal" data-target={{"#exampleModall".$policy->
            id}} style="margin-top:34px!important;margin-bottom:34px!important">
                <div class='col-xs-10'>
                    <div><span>{{$policy->policy_name}}</span> </div>
                    <div><small>{{$policy->description}}</small></div>
                </div>
                <div class='col-xs-2' style='font-size: 20px;'><i class="fas fa-user-friends"></i> <span>1</span></div>
            </div>

            <div class="modal fade" id={{"exampleModall".$policy->
            id}} tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Add Policy</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="row justify-content-center">
                                <div class="col-sm-12 ">
                                    <form class="forms-sample" action="/add_policy" method="post"
                                        enctype='multipart/form-data'>
                                        <div class="form-group">
                                            <label class="control-label required">Policy Name</label>
                                            <input required type="text" name="policy_name"
                                                value="{{$policy->policy_name}}" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label required">Description</label>
                                            <input required type="text" name="description"
                                                value="{{$policy->description}}" placeholder="Drivers Name"
                                                class="form-control">
                                        </div>
                                        <div class="text-center">
                                            Rules
                                            <hr style="margin:0px!important">
                                            <div class="card text-left">
                                                <div class="card-body">
                                                    <div style="float:right;">
                                                        <label class="switch">
                                                            @if($policy->expense_code == "0")
                                                            <input
                                                                onclick='checking(`{{"check".$policy->id}}`,`{{"redhead".$policy->id}}`)'
                                                                id="{{'check'.$policy->id}}" name="expense_code"
                                                                value="1" type="checkbox">
                                                            <span class="slider round"></span>
                                                        </label>
                                                    </div>
                                                    <h4 class="card-title" style='display:inline-block;'>
                                                        Add expense code
                                                    </h4>
                                                    <p class='text-muted'>Riders need to give a reason for their ride
                                                        before
                                                        ordering.</p>
                                                </div>
                                                <div id="{{'redhead'.$policy->id}}"
                                                    class="card-footer text-muted text-left">
                                                    Isn’t required
                                                </div>
                                                @else
                                                <input
                                                    onclick='checking(`{{"check".$policy->id}}`,`{{"redhead".$policy->id}}`)'
                                                    id="{{'check'.$policy->id}}" name="expense_code" value="1"
                                                    type="checkbox" checked>
                                                <span class="slider round"></span>
                                                </label>
                                            </div>
                                            <h4 class="card-title" style='display:inline-block;'>
                                                Add expense code
                                            </h4>
                                            <p class='text-muted'>Riders need to give a reason for their ride before
                                                ordering.</p>
                                        </div>
                                        <div id="{{'redhead'.$policy->id}}"
                                            class="card-footer text-muted text-left bg-danger">
                                            Missing expense codes To allow people to select a reason for riding, you
                                            need to provide a list of expense codes. ADD EXPENSE CODES
                                        </div>
                                        @endif

                                </div>
                                <br>
                                <div class="card text-left">
                                    <div class="card-body">
                                        <div style="float:right;">
                                            <label class="switch">
                                                @if($policy->trip_expense == "0")
                                                <input id="{{'trip_expense'.$policy->id}}"
                                                    onclick='trip(`{{"trip_expense".$policy->id}}`,`{{"isnotrequired".$policy->id}}`)'
                                                    name="trip_expense" value="1" type="checkbox">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        <h4 class="card-title" style='display:inline-block;'>
                                            Require trip expense info
                                        </h4>
                                        <p class='text-muted'>Whether the Bolt mobile app should ask for a ride reason
                                            before each ride.</p>
                                    </div>
                                    <div id="{{'isnotrequired'.$policy->id}}" class="card-footer text-muted text-left">
                                        Isn’t required
                                    </div>
                                    @else
                                    <input id="{{'trip_expense'.$policy->id}}"
                                        onclick='trip(`{{"trip_expense".$policy->id}}`,`{{"isnotrequired".$policy->id}}`)'
                                        name="trip_expense" value="1" type="checkbox" checked>
                                    <span class="slider round"></span>
                                    </label>
                                </div>
                                <h4 class="card-title" style='display:inline-block;'>
                                    Require trip expense info
                                </h4>
                                <p class='text-muted'>Whether the Bolt mobile app should ask for a ride reason
                                    before each ride.</p>
                            </div>
                            <div id="{{'isnotrequired'.$policy->id}}" class="card-footer text-muted text-left">
                                People are required to provide reasons for rides
                            </div>
                            @endif

                        </div>
                        <br>
                        <div class="card text-left">
                            <div class="card-body">
                                <div style="float:right;">
                                    <label class="switch">
                                        @if($policy->limit_spending == "0")
                                        <input id="{{'limit_spending'.$policy->id}}" name="limit_spending"
                                            onclick='limit(`{{"limit_spending".$policy->id}}`,`{{"isnotrequiredd".$policy->id}}`)'
                                            value="1" type="checkbox">
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                                <h4 class="card-title" style='display:inline-block;'>
                                    Limit spending allowance
                                </h4>
                                <p class='text-muted'>The maximum amount a person can spend in a given period of
                                    time, e.g. spending budget.</p>
                            </div>
                            <div id="{{'isnotrequiredd'.$policy->id}}" class="card-footer text-muted text-left">
                                Not limited
                            </div>
                            @else
                            <input id="{{'limit_spending'.$policy->id}}" name="limit_spending"
                                onclick='limit(`{{"limit_spending".$policy->id}}`,`{{"isnotrequiredd".$policy->id}}`)'
                                value="1" type="checkbox" checked>
                            <span class="slider round"></span>
                            </label>
                        </div>
                        <h4 class="card-title" style='display:inline-block;'>
                            Limit spending allowance
                        </h4>
                        <p class='text-muted'>The maximum amount a person can spend in a given period of
                            time, e.g. spending budget.</p>
                    </div>
                    <div id="{{'isnotrequiredd'.$policy->id}}" class="card-footer text-muted text-center">
                        <label class="">NGR</label>
                        <input type="text" name="cash" placeholder="Drivers Name" class="form-control"
                            value="{{$policy->spending}}" style="width:20%!important;display:inline-block!important">
                        <select class="form-control" name="dayss"
                            style="width:20%!important;display:inline-block!important">
                            @if($policy->limit_days == "Year")
                            <option selected value="Year">Year</option>
                            @else
                            <option value="Year">Year</option>
                            @endif
                            @if($policy->limit_days == "Month")
                            <option selected value="Month">Month</option>
                            @else
                            <option value="Month">Month</option>
                            @endif
                            @if($policy->limit_days == "Week")
                            <option selected value="Week">Week</option>
                            @else
                            <option value="Week">Week</option>
                            @endif
                            @if($policy->limit_days == "Day")
                            <option selected value="Day">Day</option>
                            @else
                            <option value="Day">Day</option>
                            @endif
                        </select>
                    </div>
                    @endif

                </div>
                <br>
                <div class="card text-left">
                    <div class="card-body">
                        <div style="float:right;">
                            <label class="switch">
                                @if($policy->limit_amout_trips == "0")
                                <input id="{{'limit_amout'.$policy->id}}" name="limit_amout_trips"
                                    onclick='limit_amount(`{{"limit_amout".$policy->id}}`,`{{"isnotrequireddd".$policy->id}}`)'
                                    value="1" type="checkbox">
                                <span class="slider round"></span>
                            </label>
                        </div>
                        <h4 class="card-title" style='display:inline-block;'>
                            Limit amount of trips
                        </h4>
                        <p class='text-muted'>The maximum amount of trips a person can make in a given
                            period of time.</p>
                    </div>
                    <div id="{{'isnotrequireddd'.$policy->id}}" class="card-footer text-muted text-left">
                        Not limited
                    </div>
                    @else
                    <input id="{{'limit_amout'.$policy->id}}" name="limit_amout_trips"
                        onclick='limit_amount(`{{"limit_amout".$policy->id}}`,`{{"isnotrequireddd".$policy->id}}`)'
                        value="1" type="checkbox" checked>
                    <span class="slider round"></span>
                    </label>
                </div>
                <h4 class="card-title" style='display:inline-block;'>
                    Limit amount of trips
                </h4>
                <p class='text-muted'>The maximum amount of trips a person can make in a given
                    period of time.</p>
            </div>
            <div id="{{'isnotrequireddd'.$policy->id}}" class="card-footer text-muted text-center">
                <label class="">MAX</label>
                <input type="text" name="max_limit" placeholder="Drivers Name" class="form-control"
                    value="{{$policy->max_limit}}" style="width:20%!important;display:inline-block!important">
                <select name="days" class="form-control" style="width:20%!important;display:inline-block!important">
                    @if($policy->trips_days == "Year")
                    <option selected value="Year">Year</option>
                    @else
                    <option value="Year">Year</option>
                    @endif
                    @if($policy->trips_days == "Month")
                    <option selected value="Month">Month</option>
                    @else
                    <option value="Month">Month</option>
                    @endif
                    @if($policy->trips_days == "Week")
                    <option selected value="Week">Week</option>
                    @else
                    <option value="Week">Week</option>
                    @endif
                    @if($policy->trips_days == "Day")
                    <option selected value="Day">Day</option>
                    @else
                    <option value="Day">Day</option>
                    @endif
                </select>
            </div>
            @endif

        </div>
        <br>
        <div class="card text-left">
            <div class="card-body">
                <div style="float:right;">
                    <label class="switch">
                        @if($policy->time == "0")
                        <input id="{{'time'.$policy->id}}" name="time"
                            onclick='time_limit(`{{"time".$policy->id}}`,`{{"isnotrequiredddd".$policy->id}}`)'
                            value="1" type="checkbox">
                        <span class="slider round"></span>
                    </label>
                </div>
                <h4 class="card-title" style='display:inline-block;'>
                    Time
                </h4>
                <p class='text-muted'>Restrict when trips can be ordered to specific days of the
                    week and/or times of the day.</p>
            </div>
            <div id="{{'isnotrequiredddd'.$policy->id}}" class="card-footer text-muted text-left">
                Not limited
            </div>
            @else
            <input id="{{'time'.$policy->id}}" name="time"
                onclick='time_limit(`{{"time".$policy->id}}`,`{{"isnotrequiredddd".$policy->id}}`)' value="1"
                type="checkbox" checked>
            <span class="slider round"></span>
            </label>
        </div>
        <h4 class="card-title" style='display:inline-block;'>
            Time
        </h4>
        <p class='text-muted'>Restrict when trips can be ordered to specific days of the
            week and/or times of the day.</p>
    </div>
    <div id="{{'isnotrequiredddd'.$policy->id}}" class="card-footer text-muted text-left">
        Weekdays only
    </div>
    @endif

</div>
<br>
<div class="card text-left">
    <div class="card-body">
        <div style="float:right;">
            <label class="switch">
                @if($policy->limit_by_supply_type == "0")
                <input id="{{'limit_by_supply_type'.$policy->id}}" name="limit_by_supply_type"
                    onclick='limit_b_supply_type(`{{"limit_by_supply_type".$policy->id}}`,`{{"isnotrequireddddd".$policy->id}}`)'
                    value="1" type="checkbox">
                <span class="slider round"></span>
            </label>
        </div>
        <h4 class="card-title" style='display:inline-block;'>
            Limit by supply type
        </h4>
        <p class='text-muted'>Restrict the supply type for trips.</p>
    </div>
    <div id="{{'isnotrequireddddd'.$policy->id}}" class="card-footer text-muted text-left">
        All rides types allowed
    </div>
    @else
    <input id="{{'limit_by_supply_type'.$policy->id}}" name="limit_by_supply_type"
        onclick='limit_b_supply_type(`{{"limit_by_supply_type".$policy->id}}`,`{{"isnotrequireddddd".$policy->id}}`)'
        value="1" type="checkbox" checked>
    <span class="slider round"></span>
    </label>
</div>
<h4 class="card-title" style='display:inline-block;'>
    Limit by supply type
</h4>
<p class='text-muted'>Restrict the supply type for trips.</p>
</div>
<div id="{{'isnotrequireddddd'.$policy->id}}" class="card-footer text-muted text-left">
    @if($policy->limit_by_supply_type == "Ride-hailing")
    <div class="form-check">
        <input class="form-check-input" type="radio" value="Ride-hailing" name="Limit_supply_type"
            id="flexRadioDefault1" checked>
        <label class="form-check-label" for="flexRadioDefault1">
            Ride-hailing
        </label>
    </div>
    @else
    <div class="form-check">
        <input class="form-check-input" type="radio" value="Ride-hailing" name="Limit_supply_type"
            id="flexRadioDefault1">
        <label class="form-check-label" for="flexRadioDefault1">
            Ride-hailing
        </label>
    </div>
    @endif
    @if($policy->limit_by_supply_type == "Rentals")
    <div class="form-check">
        <input class="form-check-input" type="radio" value="Rentals" name="Limit_supply_type" id="flexRadioDefault2"
            checked>
        <label class="form-check-label" for="flexRadioDefault2">
            Rentals
        </label>
    </div>
    @else
    <div class="form-check">
        <input class="form-check-input" type="radio" value="Rentals" name="Limit_supply_type" id="flexRadioDefault2">
        <label class="form-check-label" for="flexRadioDefault2">
            Rentals
        </label>
    </div>
    @endif
</div>
@endif

</div>
<br>
<div class="card text-left">
    <div class="card-body">
        <div style="float:right;">
            <label class="switch">
                @if($policy->locations_check == "0")
                <input id="{{'locations_check'.$policy->id}}"
                    onclick='locations(`{{"locations_check".$policy->id}}`,`{{"isnotrequiredddddd".$policy->id}}`)'
                    name="locations_check" value="1" type="checkbox">
                <span class="slider round"></span>
            </label>
        </div>
        <h4 class="card-title" style='display:inline-block;'>
            Location limits
        </h4>
        <p class='text-muted'>Restrict where should people be able to ride using
            ride-hailing.</p>
    </div>
    <div id="{{'isnotrequiredddddd'.$policy->id}}" class="card-footer text-muted text-left">
        All rides types allowed
    </div>
    @else
    <input id="{{'locations_check'.$policy->id}}"
        onclick='locations(`{{"locations_check".$policy->id}}`,`{{"isnotrequiredddddd".$policy->id}}`)'
        name="locations_check" value="1" type="checkbox" checked>
    <span class="slider round"></span>
    </label>
</div>
<h4 class="card-title" style='display:inline-block;'>
    Location limits
</h4>
<p class='text-muted'>Restrict where should people be able to ride using
    ride-hailing.</p>
</div>
<div id="{{'isnotrequiredddddd'.$policy->id}}" class="card-footer text-muted text-left">
    <div class="form-check">
        @if($policy->location_limit == "To or From the permitted locations")
        <input class="form-check-input" onclick="myFunction('flexRadioDefault3','div1')"
            value="To or From the permitted locations" type="radio" name="Location_limits" id="flexRadioDefault3"
            checked>
        <label class="form-check-label" for="flexRadioDefault3">
            To or From the permitted locations
        </label>
        @else
        <input class="form-check-input" onclick="myFunction('flexRadioDefault3','div1')"
            value="To or From the permitted locations" type="radio" name="Location_limits" id="flexRadioDefault3">
        <label class="form-check-label" for="flexRadioDefault3">
            To or From the permitted locations
        </label>
        @endif
        <div class="text-center" id="div1">
        </div>
    </div>
    <div class="form-check">
        @if($policy->location_limit == "Only from the permitted locations")
        <input class="form-check-input" onclick="myFunction('flexRadioDefault4','div2')"
            value="Only from the permitted locations" type="radio" name="Location_limits" id="flexRadioDefault4"
            checked>
        <label class="form-check-label" for="flexRadioDefault4">
            Only from the permitted locations
        </label>
        @else
        <input class="form-check-input" onclick="myFunction('flexRadioDefault4','div2')"
            value="Only from the permitted locations" type="radio" name="Location_limits" id="flexRadioDefault4">
        <label class="form-check-label" for="flexRadioDefault4">
            Only from the permitted locations
        </label>
        @endif
        <div class="text-center" id="div2">
        </div>
    </div>
    <div class="form-check">
        @if($policy->location_limit == "Only to the permitted locations")
        <input class="form-check-input" onclick="myFunction('flexRadioDefault5','div3')"
            value="Only to the permitted locations" type="radio" name="Location_limits" id="flexRadioDefault5" checked>
        <label class="form-check-label" for="flexRadioDefault5">
            Only to the permitted locations
        </label>
        @else
        <input class="form-check-input" onclick="myFunction('flexRadioDefault5','div3')"
            value="Only to the permitted locations" type="radio" name="Location_limits" id="flexRadioDefault5">
        <label class="form-check-label" for="flexRadioDefault5">
            Only to the permitted locations
        </label>
        @endif
        <div class="text-center" id="div3">

        </div>
    </div>
    <div class="form-check">
        @if($policy->location_limit == "Between permitted locations")
        <input class="form-check-input" onclick="myFunction('flexRadioDefault6','div4')"
            value="Between permitted locations" type="radio" name="Location_limits" id="flexRadioDefault6" checked>
        <label class="form-check-label" for="flexRadioDefault6">
            Between permitted locations
        </label>
        @else
        <input class="form-check-input" onclick="myFunction('flexRadioDefault6','div4')"
            value="Between permitted locations" type="radio" name="Location_limits" id="flexRadioDefault6">
        <label class="form-check-label" for="flexRadioDefault6">
            Between permitted locations
        </label>
        @endif
        <div class="text-center" id="div4">
        </div>
    </div>
</div>
@endif

</div>
<div class="card text-left">
    <div class="card-body">
        <h4 class="card-title" style='display:inline-block;'>
            Locations
        </h4>
        <div id="location_paste">
            @foreach($data as $row)
            <h5 class='card-title' style='display:inline-block;'>
                {{$row->location_name}}
            </h5>
            <p class='text-muted'>{{$row->location_address}},{{$row->location_radius}}
                km</p>
            @endforeach
        </div>
    </div>
</div>
<br>
<input type="hidden" name="_token" value={{csrf_token()}}>
<button type="submit" class="btn btn-primary">Save</button>
</div>
</div>
</div>
</div>
</form>
<div class="modal-footer">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>
@endforeach
<div>
</div>
</div>
</div>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Policy</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-sm-12 ">
                        <form class="forms-sample" action="/add_policy" method="post" enctype='multipart/form-data'>
                            <div class="form-group">
                                <label class="control-label required">Policy Name</label>
                                <input required type="text" name="policy_name" placeholder="Drivers Name"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="control-label required">Description</label>
                                <input required type="text" name="description" placeholder="Drivers Name"
                                    class="form-control">
                            </div>
                            <div class="text-center">
                                Rules
                                <hr style="margin:0px!important">
                                <div class="card text-left">
                                    <div class="card-body">
                                        <div style="float:right;">
                                            <label class="switch">
                                                <input id="check" name="expense_code" value="1" type="checkbox">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        <h4 class="card-title" style='display:inline-block;'>
                                            Add expense code
                                        </h4>
                                        <p class='text-muted'>Riders need to give a reason for their ride before
                                            ordering.</p>
                                    </div>
                                    <div id="redhead" class="card-footer text-muted text-left">
                                        Isn’t required
                                    </div>
                                </div>
                                <br>
                                <div class="card text-left">
                                    <div class="card-body">
                                        <div style="float:right;">
                                            <label class="switch">
                                                <input id="checks" name="trip_expense" value="1" type="checkbox">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        <h4 class="card-title" style='display:inline-block;'>
                                            Require trip expense info
                                        </h4>
                                        <p class='text-muted'>Whether the Bolt mobile app should ask for a ride reason
                                            before each ride.</p>
                                    </div>
                                    <div id="isnotrequired" class="card-footer text-muted text-left">
                                        Isn’t required
                                    </div>
                                </div>
                                <br>
                                <div class="card text-left">
                                    <div class="card-body">
                                        <div style="float:right;">
                                            <label class="switch">
                                                <input id="checkss" name="limit_spending" value="1" type="checkbox">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        <h4 class="card-title" style='display:inline-block;'>
                                            Limit spending allowance
                                        </h4>
                                        <p class='text-muted'>The maximum amount a person can spend in a given period of
                                            time, e.g. spending budget.</p>
                                    </div>
                                    <div id="isnotrequiredd" class="card-footer text-muted text-left">
                                        Not limited
                                    </div>
                                </div>
                                <br>
                                <div class="card text-left">
                                    <div class="card-body">
                                        <div style="float:right;">
                                            <label class="switch">
                                                <input id="checksss" name="limit_amout_trips" value="1" type="checkbox">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        <h4 class="card-title" style='display:inline-block;'>
                                            Limit amount of trips
                                        </h4>
                                        <p class='text-muted'>The maximum amount of trips a person can make in a given
                                            period of time.</p>
                                    </div>
                                    <div id="isnotrequireddd" class="card-footer text-muted text-left">
                                        Not limited
                                    </div>
                                </div>
                                <br>
                                <div class="card text-left">
                                    <div class="card-body">
                                        <div style="float:right;">
                                            <label class="switch">
                                                <input id="checkssss" name="time" value="1" type="checkbox">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        <h4 class="card-title" style='display:inline-block;'>
                                            Time
                                        </h4>
                                        <p class='text-muted'>Restrict when trips can be ordered to specific days of the
                                            week and/or times of the day.</p>
                                    </div>
                                    <div id="isnotrequiredddd" class="card-footer text-muted text-left">
                                        Not limited
                                    </div>
                                </div>
                                <br>
                                <div class="card text-left">
                                    <div class="card-body">
                                        <div style="float:right;">
                                            <label class="switch">
                                                <input id="checksssss" name="limit_by_supply_type" value="1"
                                                    type="checkbox">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        <h4 class="card-title" style='display:inline-block;'>
                                            Limit by supply type
                                        </h4>
                                        <p class='text-muted'>Restrict the supply type for trips.</p>
                                    </div>
                                    <div id="isnotrequireddddd" class="card-footer text-muted text-left">
                                        All rides types allowed
                                    </div>
                                </div>
                                <br>
                                <div class="card text-left">
                                    <div class="card-body">
                                        <div style="float:right;">
                                            <label class="switch">
                                                <input id="checkssssss" name="locations_check" value="1"
                                                    type="checkbox">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        <h4 class="card-title" style='display:inline-block;'>
                                            Location limits
                                        </h4>
                                        <p class='text-muted'>Restrict where should people be able to ride using
                                            ride-hailing.</p>
                                    </div>
                                    <div id="isnotrequiredddddd" class="card-footer text-muted text-left">
                                        All rides types allowed
                                    </div>
                                </div>
                                <div class="card text-left">
                                    <div class="card-body">
                                        <h4 class="card-title" style='display:inline-block;'>
                                            Locations
                                        </h4>
                                        <div id="location_paste">
                                            @foreach($data as $row)
                                            <h5 class='card-title' style='display:inline-block;'>
                                                {{$row->location_name}}
                                            </h5>
                                            <p class='text-muted'>{{$row->location_address}},{{$row->location_radius}}
                                                km</p>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <input type="hidden" name="_token" value={{csrf_token()}}>
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                    </div>
                </div>
            </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="{{'exampleModall'.$policy->
   id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel2" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Location</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-sm-12 ">
                        <form>
                            <div class="form-group">
                                <label class="control-label required">Location Name</label>
                                <input required type="text" name="location" placeholder="Location Name" id="location"
                                    class="form-control">
                                <span class="text-danger" id="location_alert"></span>
                            </div>
                            <div class="form-group">
                                <label class="control-label required">Address</label>
                                <input required type="text" onchange="drawOnclick();" name="address" placeholder=""
                                    id="address" class="form-control">
                                <span class="text-danger" id="address_alert"></span>
                            </div>
                            <div class="form-group">
                                <label class="control-label required">Radius</label>
                                <input required onchange="drawOnclick();" type="number" id="radius" name="radius"
                                    placeholder="" class="form-control">
                                <span class="text-danger" id="radius_alert"></span>
                            </div>
                            <div id="googleMap" style="width:100%;height:400px;"></div>
                    </div>
                    <div class="text-center" style="margin-top:10px;">
                        <br>
                        <button type="button" id="form_submit" class="btn btn-primary ">Add Location</button>
                    </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closemodal">Close</button>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<script>
    $("#form_submit").click(function (e) {
        // var c = document.getElementById("category");
        // var option = c.options[no.selectedIndex].text;


        w = $('#location').val();
        if (!w) {
            $("#location_alert").html("This field is required");
            $("#exampleModal2").scrollTop(0);
            return;
        }
        l = $('#address').val();
        if (!l) {
            $("#address_alert").html("This field is required");
            $("#exampleModal2").scrollTop(0);
            return;
        }
        r = $('#radius').val();
        if (!r) {
            $("#radius_alert").html("This field is required");
            $("#exampleModal2").scrollTop(0);
            return;
        }

        btn = document.getElementById('form_submit');
        btn.disabled = true;
        btn.innerText = 'Saving...'
        e.preventDefault();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
            }


        });

        $.ajax({
            url: "/bussiness_account_ajax",
            type: "POST",
            data: {
                location: $('#location').val(),
                address: $('#address').val(),
                radius: $('#radius').val(),

            },

            success: function (data) {
                if (data) {

                    $('#exampleModal2').modal('hide');
                    $('#exampleModal').modal('show');
                    document.querySelector("#exampleModal").style.overflow = 'auto';
                    $("#exampleModal").scrollTop(100);

                    $("#location_paste").html(data);


                } else {

                }

            },
            error: function () {

            }
        });

    });

</script>
<script>
    $('#closemodal').click(function () {
        $('#exampleModal2').modal('hide');
        $('#exampleModal').modal('show');
        document.querySelector("#exampleModal").style.overflow = 'auto';

    });

</script>
<script>
    function myclose(id) {
        $('#exampleModal').modal('hide');

        $('#exampleModal2').modal('show');
        document.querySelector("body").style.overflow = 'hidden';
        document.querySelector("#exampleModal2").style.overflow = 'auto';
    };

</script>
<script>
    function myMap() {
        map = new google.maps.Map(document.getElementById('googleMap'), {
            scrollwheel: true,
            mapTypeControl: false,
            center: {
                lat: 48.8534100,
                lng: 2.3488000
            },
            zoom: 13,
            streetViewControl: false,
            zoomControl: true
        });
    }

    function drawOnclick() {
        myMap();
        address = $("#address").val();
        myArray = address.split(",");
        lat = parseFloat(myArray[0]);
        long = parseFloat(myArray[1]);
        radius = $("#radius").val();
        float_radius = parseFloat(radius);

        var antennasCircle = new google.maps.Circle({
            draggable: true,
            strokeColor: "#FF0000",
            strokeOpacity: 0.4,
            strokeWeight: 2,
            fillColor: "#FF0000",
            fillOpacity: 0.35,
            map: map,
            center: {
                lat: lat,
                lng: long
            },
            radius: 1000 * float_radius
        });
        map.fitBounds(antennasCircle.getBounds());

    }

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAd8q-fqcHslANRJ3WZxR5cMYY1CgtBe9I&callback=myMap">
</script>
<script>
    $("#check").change(function (e) {
        if (document.getElementById("check").checked) {
            $("#redhead").addClass("bg-danger");
            $("#redhead").html(
                "Missing expense codes To allow people to select a reason for riding, you need to provide a list of expense codes. ADD EXPENSE CODES"
            );

        } else {
            $("#redhead").removeClass("bg-danger");
            $("#redhead").html("Isn’t required");

        }
    });

</script>
<script>
    $("#checks").change(function (e) {
        if (document.getElementById("checks").checked) {
            $("#isnotrequired").html("People are required to provide reasons for rides");

        } else {
            $("#isnotrequired").html("Isn’t required");

        }
    });

</script>
<script>
    $("#checkss").change(function (e) {
        if (document.getElementById("checkss").checked) {
            $("#isnotrequiredd").removeClass("text-left");
            $("#isnotrequiredd").addClass("text-center");
            $("#isnotrequiredd").html(`<label class="">NGR</label>
                    <input type="text" name="cash" placeholder="Drivers Name" class="form-control" value="100" style="width:20%!important;display:inline-block!important">
                    <select  class="form-control" name="dayss"style="width:20%!important;display:inline-block!important">
                           <option value="Year">Year</option>
                           <option value="Month">Month</option>
                           <option value="Week">Week</option>
                           <option value="Day">Day</option>
                           </select>`);

        } else {
            $("#isnotrequiredd").removeClass("text-center text-left");
            $("#isnotrequiredd").addClass("text-left");
            $("#isnotrequiredd").html("Not limited");

        }
    });

</script>
<script>
    $("#checksss").change(function (e) {
        if (document.getElementById("checksss").checked) {
            $("#isnotrequireddd").removeClass("text-left");
            $("#isnotrequireddd").addClass("text-center");
            $("#isnotrequireddd").html(`<label class="">MAX</label>
                    <input type="text" name="max_limit" placeholder="Drivers Name" class="form-control" value="2" style="width:20%!important;display:inline-block!important">
                    <select name="days" class="form-control" style="width:20%!important;display:inline-block!important">
                           <option value="Year">Year</option>
                           <option value="Month">Month</option>
                           <option value="Week">Week</option>
                           <option value="Day">Day</option>
                           </select>`);

        } else {
            $("#isnotrequireddd").removeClass("text-center text-left");
            $("#isnotrequireddd").addClass("text-left");
            $("#isnotrequireddd").html("Not limited");

        }
    });

</script>
<script>
    $("#checkssss").change(function (e) {
        if (document.getElementById("checkssss").checked) {
            $("#isnotrequiredddd").html(`Weekdays only`);
        } else {
            $("#isnotrequiredddd").html("Not limited");

        }
    });

</script>
<script>
    $("#checksssss").change(function (e) {
        if (document.getElementById("checksssss").checked) {
            $("#isnotrequireddddd").html(`<div class="form-check">
   <input class="form-check-input" type="radio" value="Ride-hailing" name="Limit_supply_type" id="flexRadioDefault1">
   <label class="form-check-label" for="flexRadioDefault1">
   Ride-hailing
   </label>
   </div>
   <div class="form-check">
   <input class="form-check-input" type="radio" value="Rentals" name="Limit_supply_type" id="flexRadioDefault2" checked>
   <label class="form-check-label" for="flexRadioDefault2">
   Rentals
   </label>
   </div>`);
        } else {
            $("#isnotrequireddddd").html("All rides types allowed");

        }
    });

</script>
<script>
    $("#checkssssss").change(function (e) {
        if (document.getElementById("checkssssss").checked) {
            $("#isnotrequiredddddd").html(`<div class="form-check">
   <input class="form-check-input" onclick="myFunction('flexRadioDefault3','div1')" value="To or From the permitted locations" type="radio" name="Location_limits" id="flexRadioDefault3">
   <label class="form-check-label" for="flexRadioDefault3">
   To or From the permitted locations
   </label>
   <div class="text-center" id="div1">
   </div>
   </div>
   <div class="form-check">
   <input class="form-check-input" onclick="myFunction('flexRadioDefault4','div2')" value="Only from the permitted locations" type="radio" name="Location_limits" id="flexRadioDefault4" >
   <label class="form-check-label" for="flexRadioDefault4">
   Only from the permitted locations
   </label>
   <div class="text-center" id="div2">
   </div>
   </div>
   <div class="form-check">
   <input class="form-check-input" onclick="myFunction('flexRadioDefault5','div3')" value="Only to the permitted locations" type="radio" name="Location_limits" id="flexRadioDefault5" >
   <label class="form-check-label" for="flexRadioDefault5">
   Only to the permitted locations
   </label>
   <div class="text-center" id="div3">
   
   </div>
   </div>
   <div class="form-check">
   <input  class="form-check-input" onclick="myFunction('flexRadioDefault6','div4')" value="Between permitted locations" type="radio" name="Location_limits" id="flexRadioDefault6" >
   <label class="form-check-label" for="flexRadioDefault6">
   Between permitted locations
   </label>
   <div class="text-center" id="div4">
   </div>
   </div>
   `);
        } else {
            $("#isnotrequiredddddd").html("All rides types allowed");

        }
    });

</script>
<script>
    function myFunction(box_id, div_id) {
        if (document.getElementById(box_id).checked) {
            $("#" + div_id).html(`<button type="button" class="btn btn-primary" onclick="myclose('click')" id="click"  >
   Add location
   </button>`);

        }
        for (let i = 1; i <= 4; i++) {
            x = "div" + i;
            if (x == div_id) {

            } else {
                $("#" + x).html(``);
            }
        }
    }

</script>

<script>
    function checking(checkbox, print) {
        if (document.getElementById(checkbox).checked) {
            $("#" + print).addClass("bg-danger");
            $("#" + print).html(
                "Missing expense codes To allow people to select a reason for riding, you need to provide a list of expense codes. ADD EXPENSE CODES"
            );

        } else {
            $("#" + print).removeClass("bg-danger");
            $("#" + print).html("Isn’t required");

        }
    }

</script>
<script>
    function trip(checkbox, print) {
        if (document.getElementById(checkbox).checked) {
            $("#" + print).html("People are required to provide reasons for rides");

        } else {
            $("#" + print).html("Isn’t required");

        }
    }

</script>
<script>
    function limit(checkbox, print) {
        if (document.getElementById(checkbox).checked) {
            $("#" + print).removeClass("text-left");
            $("#" + print).addClass("text-center");
            $("#" + print).html(`<label class="">NGR</label>
                    <input type="text" name="cash" placeholder="Drivers Name" class="form-control" value="100" style="width:20%!important;display:inline-block!important">
                    <select  class="form-control" name="dayss"style="width:20%!important;display:inline-block!important">
                           <option value="Year">Year</option>
                           <option value="Month">Month</option>
                           <option value="Week">Week</option>
                           <option value="Day">Day</option>
                           </select>`);

        } else {
            $("#" + print).removeClass("text-center text-left");
            $("#" + print).addClass("text-left");
            $("#" + print).html("Not limited");

        }
    }

</script>
<script>
    function limit_amount(checkbox, print) {
        if (document.getElementById(checkbox).checked) {
            $("#" + print).removeClass("text-left");
            $("#" + print).addClass("text-center");
            $("#" + print).html(`<label class="">MAX</label>
                    <input type="text" name="max_limit" placeholder="Drivers Name" class="form-control" value="2" style="width:20%!important;display:inline-block!important">
                    <select name="days" class="form-control" style="width:20%!important;display:inline-block!important">
                           <option value="Year">Year</option>
                           <option value="Month">Month</option>
                           <option value="Week">Week</option>
                           <option value="Day">Day</option>
                           </select>`);

        } else {
            $("#" + print).removeClass("text-center text-left");
            $("#" + print).addClass("text-left");
            $("#" + print).html("Not limited");

        }
    }

</script>
<script>
    function time_limit(checkbox, print) {
        if (document.getElementById(checkbox).checked) {
            $("#" + print).html(`Weekdays only`);
        } else {
            $("#" + print).html("Not limited");

        }
    }

</script>

<script>
    function limit_b_supply_type(checkbox, print) {
        if (document.getElementById(checkbox).checked) {
            $("#" + print).html(`<div class="form-check">
   <input class="form-check-input" type="radio" value="Ride-hailing" name="Limit_supply_type" id="flexRadioDefault1">
   <label class="form-check-label" for="flexRadioDefault1">
   Ride-hailing
   </label>
   </div>
   <div class="form-check">
   <input class="form-check-input" type="radio" value="Rentals" name="Limit_supply_type" id="flexRadioDefault2" checked>
   <label class="form-check-label" for="flexRadioDefault2">
   Rentals
   </label>
   </div>`);
        } else {
            $("#" + print).html("All rides types allowed");

        }
    }

</script>

<script>
    function locations(checkbox, print) {

        if (document.getElementById(checkbox).checked) {
            $("#" + print).html(`<div class="form-check">
   <input class="form-check-input" onclick="myFunction('flexRadioDefault3','div1')" value="To or From the permitted locations" type="radio" name="Location_limits" id="flexRadioDefault3">
   <label class="form-check-label" for="flexRadioDefault3">
   To or From the permitted locations
   </label>
   <div class="text-center" id="div1">
   </div>
   </div>
   <div class="form-check">
   <input class="form-check-input" onclick="myFunction('flexRadioDefault4','div2')" value="Only from the permitted locations" type="radio" name="Location_limits" id="flexRadioDefault4" >
   <label class="form-check-label" for="flexRadioDefault4">
   Only from the permitted locations
   </label>
   <div class="text-center" id="div2">
   </div>
   </div>
   <div class="form-check">
   <input class="form-check-input" onclick="myFunction('flexRadioDefault5','div3')" value="Only to the permitted locations" type="radio" name="Location_limits" id="flexRadioDefault5" >
   <label class="form-check-label" for="flexRadioDefault5">
   Only to the permitted locations
   </label>
   <div class="text-center" id="div3">
   
   </div>
   </div>
   <div class="form-check">
   <input  class="form-check-input" onclick="myFunction('flexRadioDefault6','div4')" value="Between permitted locations" type="radio" name="Location_limits" id="flexRadioDefault6" >
   <label class="form-check-label" for="flexRadioDefault6">
   Between permitted locations
   </label>
   <div class="text-center" id="div4">
   </div>
   </div>
   `);
        } else {
            $("#" + print).html("All rides types allowed");

        }
    }

</script>
@endsection
