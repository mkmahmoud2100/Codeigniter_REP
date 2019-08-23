{include file="header.tpl"}
{* GOOGLE PLACES*}
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrbZ3qvHdHY9_PxkNf85fqrJ9Rk2-crbE&libraries=places&callback=initMap"
async defer></script>
<script>

    var site_url = "{$site_url}";
    var markers;
    var popup;
    {literal}
        var distance;
        $(document).ready(function () {
            $("body").css('cursor', 'default');
            $("#submit_btn").click(function () {
                $("body").css('cursor', 'wait');
            });
            $("input[type='number']").inputSpinner();
            $("#zip").hide();
            $('#depart-date').datepicker({
                dateFormat: "yy-mm-dd",
                startDate: '-3d',
                zIndexOffset: 99999

            });
            $('#arrival-date').datepicker({
                dateFormat: "yy-mm-dd",
                startDate: '-3d',
                zIndexOffset: 99999
            });
            $('#depart-time').timepicker({
                timeFormat: 'HH:mm',
                interval: 15,
                dynamic: false,
                dropdown: true,
                scrollbar: true,
                zindex: 99999
            });

            $('#arrival-time').timepicker({
                timeFormat: 'HH:mm',
                interval: 15,
                dynamic: false,
                dropdown: true,
                scrollbar: true,
                zindex: 99999,
               
            });
            $("#return-flight-no-div").hide();
            $("#return-way-div").hide();
            $("#hidden-route-info").hide();
            $("#exchange-card").hide();
            $("#return-way").change(function () {
                if ($('#return-way').prop('checked')) {
                    //alert("Checked");
                    $("#return-flight-no-div").show();
                    $("#return-way-div").show();
                    $("#exchange-card").show();
                    //if ($('#exchange option:selected') && $('#exchange').val() !== '0') {
                    var tempTotalFees = $("#total-price").val();
                    $("#total-price").val(tempTotalFees * 2);
                    var tempTotalfeesTRY = $("#total-try-hidden").val();
                    $("#total-try-hidden").val(tempTotalfeesTRY * 2);
                    //}
                } else {
                    //alert("Un Checked");
                    $("#return-flight-no-div").hide();
                    $("#return-way-div").hide();
                    // if ($('#exchange option:selected') && $('#exchange').val() !== '0') {
                    var tempTotalFees = $("#total-price").val();
                    $("#total-price").val(tempTotalFees / 2);
                    var tempTotalfeesTRY = $("#total-try-hidden").val();
                    $("#total-try-hidden").val(tempTotalfeesTRY / 2);
                    //}
                }
            });
            /**
             *
             * call flight API
             *  Not Null fill date and time
             *  Manually select date and time
             * @returns {undefined}
             */
            $("#flight-no").focusout(function () {
                var appId = 'e2c2435e';
                var appKey = '259c4c549e8b4853d700bfc092174199';
                var flightId = $(this).val();
                var urlLink = "https://api.flightstats.com/flex/flightstatus/rest/v2/json/airport/status/ABQ/dep/2019/3/2/0?appId=e2c2435e&appKey=259c4c549e8b4853d700bfc092174199&utc=false&numHours=6&maxFlights=100"
                $.ajax({
                    url: urlLink,
                    type: "GET",
                    dataType: "JSONP",
                    contentType: "application/jsonp; charset=utf-8",
                    success: function (data) {
                        /*for(var i=0;i<data.length;i++){
                         console.log("Flight Id"+data[i].flightId);
                         console.log("departureAirportFsCode"+data[i].departureAirportFsCode);
                         }*/
                    },
                    error: function (err) {

                    }
                });
            });
            $("#exchange").change(function () {
                //  alert("Handler for .change() called.");
                //alert("Amount " + amount);
                if ($("#total-price").val() > 0) {
                    var amountInEuro = $("#total-price").val();
                    var symbol = $(this).children('option:selected').val();
                    exchangeRate(amountInEuro, symbol);
                } else {
                    alert("Select Route before.");
                    //$("#fees-exchange-x2").remove();
                }
            });
        });
        function initMap() {

            var map = new google.maps.Map(document.getElementById('route'), {
                mapTypeControl: false,
                center: {lat: 35.1264, lng: 33.4299},
                zoom: 8
            });
            new AutocompleteDirectionsHandler(map);
        }

        function AutocompleteDirectionsHandler(map) {
            this.map = map;
            this.originPlaceId = null;
            this.destinationPlaceId = null;
            this.travelMode = 'DRIVING';
            this.directionsService = new google.maps.DirectionsService;
            this.directionsDisplay = new google.maps.DirectionsRenderer;
            this.directionsDisplay.setMap(map);
            var originInput = document.getElementById('from-address');
            var destinationInput = document.getElementById('to-address');
            var originAutocomplete = new google.maps.places.Autocomplete(originInput);
            // Specify just the place data fields that you need.
            originAutocomplete.setFields(['place_id']);
            var destinationAutocomplete = new google.maps.places.Autocomplete(destinationInput);
            destinationAutocomplete.setFields(['place_id']);
            this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
            this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');
        }
        AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function (autocomplete, mode) {
            var me = this;
            autocomplete.bindTo('bounds', this.map);
            autocomplete.addListener('place_changed', function () {
                var place = autocomplete.getPlace();
                if (!place.place_id) {
                    window.alert("Please select an option from the dropdown list.");
                    return;
                }
                if (mode === 'ORIG') {
                    me.originPlaceId = place.place_id;
                } else {
                    me.destinationPlaceId = place.place_id;
                }
                me.route();
            });
        };
        AutocompleteDirectionsHandler.prototype.route = function () {
            if (!this.originPlaceId || !this.destinationPlaceId) {
                return;
            }
            var me = this;
            this.directionsService.route({
                origin: {'placeId': this.originPlaceId},
                destination: {'placeId': this.destinationPlaceId},
                travelMode: 'DRIVING',
                unitSystem: google.maps.UnitSystem.METRIC
            },
                    function (response, status) {
                        if (status === 'OK') {
                            me.directionsDisplay.setDirections(response);
                            //console.log('Response');
                            //console.log(response.routes[0].legs[0].distance.text);
                            //console.log(response.routes[0].legs[0].duration.text);

                            endpoint = 'latest';
                            access_key = '23691197eabcac1df5731ec39d88f743';
// get the most recent exchange rates via the "latest" endpoint:
                            $.ajax({
                                url: 'http://data.fixer.io/api/' + endpoint + '?access_key=' + access_key,
                                dataType: 'jsonp',
                                success: function (json) {
                                    $("#distance-hidden").val(response.routes[0].legs[0].distance.text);
                                    $("#duration-hidden").val(response.routes[0].legs[0].duration.text);
                                    $("#total-try-hidden").val(Math.ceil(json.rates.TRY * (parseInt(response.routes[0].legs[0].distance.text) * 0.75)));
                                    $("#fees-hidden").val(Math.ceil(parseInt(response.routes[0].legs[0].distance.text) * 0.75));
                                    $("#distance").val(response.routes[0].legs[0].distance.text);
                                    $("#duration").val(response.routes[0].legs[0].duration.text);
                                    $("#total-price").val(Math.ceil(parseInt(response.routes[0].legs[0].distance.text) * 0.75));
                                }
                            });
                        } else {
                            window.alert('Directions request failed due to ' + status);
                        }
                    });
        };
        function exchangeRate(amountInEuro, symbol) {
            //alert("Amount " + amount + 'Symbol ' + symbol)
            // set endpoint and your access key
            endpoint = 'latest';
            access_key = '23691197eabcac1df5731ec39d88f743';
// get the most recent exchange rates via the "latest" endpoint:
            $.ajax({
                url: 'http://data.fixer.io/api/' + endpoint + '?access_key=' + access_key,
                dataType: 'jsonp',
                success: function (json) {

                    var routeInfo = '';
                    if (symbol === '0') {

                    }
                    if (symbol === 'USD') {
                        $("#fees-exchange").remove();
                        routeInfo += '<div id="fees-exchange" class="col-sm-6">';
                        routeInfo += '<label><b>FEES : <font size="+1">' + Math.ceil(json.rates.USD * amountInEuro) + ' $</font></b></lable>';
                        routeInfo += '</div>';
                        $("#fees-hidden").val(Math.ceil(json.rates.USD * amountInEuro));
                        $("#fees-iso-hidden").val('USD');
                    }
                    if (symbol === 'AUD') {
                        $("#fees-exchange").remove();
                        routeInfo += '<div id="fees-exchange" class="col-lg-6">';
                        routeInfo += '<label><b>FEES :<font size="+1"> ' + Math.ceil(json.rates.AUD * amountInEuro) + ' A$</font></b></lable>';
                        routeInfo += '</div>';
                        $("#fees-hidden").val(Math.ceil(json.rates.AUD * amountInEuro));
                        $("#fees-iso-hidden").val('AUD');
                    }
                    if (symbol === 'GBP') {
                        $("#fees-exchange").remove();
                        routeInfo += '<div id="fees-exchange" class="col-lg-6">';
                        routeInfo += '<label><b>FEES :  <font size="+1">' + Math.ceil(json.rates.GBP * amountInEuro) + ' £</font></b></lable>';
                        routeInfo += '</div>';
                        $("#fees-hidden").val(Math.ceil(json.rates.GBP * amountInEuro));
                        $("#fees-iso-hidden").val('GPB');
                    }
                    if (symbol === 'TRY') {
                        $("#fees-exchange").remove();
                        routeInfo += '<div id="fees-exchange" class="col-lg-6">';
                        routeInfo += '<label><b>FEES : <font size="+1">' + Math.ceil(json.rates.TRY * amountInEuro) + ' TL</font></b></lable>';
                        routeInfo += '</div>';
                        $("#fees-hidden").val(Math.ceil(json.rates.TRY * amountInEuro));
                        $("#fees-iso-hidden").val('TRY');
                    }

                    $("#exchange-fees").append(routeInfo);
                }
            });
        }
    {/literal}
</script>

<div class="container-fluid">
    {if $validation_errors neq NULL}
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {assign var=counter value=0}
            {foreach from=$validation_errors key =key item=error_row}
                {$error_row}
            {/foreach}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    {/if}
    {if $database_error neq NULL}
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {$database_error}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    {/if}
    <div class="float-sm-left col-sm-6">
        <div class="card">
            <div class="card-header">
                Transfer Information
            </div>
            <div class="card-body">
                <form name="reservation" id="reservation" class="form" action="{$site_url}/booking/reserveBooking" method="post">
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="reservation-code">Reservation Code:</label>
                            <input type="text" name="reservation-code" id="reservation-code" value="{$lastCode}" class="form-control" readonly="readonly"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="from-address">From Address:</label>
                            <input type="text" name="from-address" id="from-address" class="form-control" value="{if $from_address neq NULL}{$from_address}{/if}">
                        </div>
                        <div class="col-sm-6">
                            <label for="to-address">To Address:</label>
                            <input type="text" name="to-address" id="to-address" class="form-control" value="{if $to_address neq NULL}{$to_address}{/if}">
                        </div>
                    </div>

                    <div class="form-group row">

                        <div class="col-sm-6">
                            <label for="flight-no">Flight No:</label>
                            <input type="text" name="flight-no" id="flight-no" class="form-control" value="{if $flight_no neq NULL}{$flight_no}{/if}" />
                        </div>

                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="depart-date">Trasnfer Date:</label>
                            <div class="input-group date" data-provide="datepicker">
                                <input type="text" id="depart-date" name="depart-date" class="form-control" value="{if $depart_date neq NULL}{$depart_date}{/if}"/>
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="depart-time">Pick up Time:</label>
                            <input type="text" id="depart-time" name="depart-time" class="form-control"  value="{if $depart_time neq NULL}{$depart_time}{/if}"/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="address">Detailed Address <br><b>eg. Galata sokak no 4 Girne.</b></label>
                            <textarea class="form-control" name="address" id="pickup-address" rows="2" placeholder="" maxlength="100" value="{if $address neq NULL}{$address}{/if}" ></textarea>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <input type="checkbox" name="return-way" id="return-way" value="T"> Add return way<br>
                        </div>
                        <div id="return-flight-no-div" class="col-sm-6">
                            <label for="return-flight-no">Return Flight No:</label>
                            <input type="text" name="return-flight-no" id="return-flight-no" class="form-control" value="{if $return_flight_no neq NULL}{$return_flight_no}{/if}"/>
                        </div>
                    </div>
                    <div id="return-way-div" class="form-group row">
                        <div class="col-sm-6">
                            <label for="arrival-date">Return transfer Date:</label>
                            <div class="input-group date" data-provide="datepicker">
                                <input type="text" id="arrival-date" name="arrival-date" class="form-control"  value="{if $arrival_date neq NULL}{$arrival_date}{/if}"/>
                                <div class="input-group-addon">
                                    <span class="glyphicon glyphicon-th"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label for="arrival-time">Pick up Time:</label>
                            <input type="text" id="arrival-time" name="arrival-time" class="form-control"  value="{if $arrival_time neq NULL}{$arrival_time}{/if}"/>
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="adults">Adults:</label>
                            <input type="number" name="adult" id="adult" class="form-control" value="2" min="0" max="30" step="1"/>
                        </div>

                        <div class="col-sm-6">
                            <label for="kids">Kids:</label>
                            <input type="number" name="kids" id="kids" class="form-control " value="0" min="0" max="30" step="1"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="baby">Baby:</label>
                            <input type="number" name="baby" id="baby" class="form-control" value="0" min="0" max="30" step="1"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        {foreach from=$accessory item=acc}
                            <div class="input-group col-sm-6">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <input type="checkbox" class="checkbox" value="{$acc->accessory_id}" name="{$acc->title|lower|replace:' ':'-'}" id="{$acc->title}" aria-label="Checkbox for following text input">
                                    </div>
                                </div>
                                <input type="text" class="form-control" aria-label="Text input with checkbox" value="&nbsp;{$acc->title}" readonly="readonly">
                            </div>
                        {/foreach}
                    </div>
                    <hr>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="name">Name:</label>
                            <input type="text" name="name" class="form-control"  value="{if $name neq NULL}{$name}{/if}"/>
                        </div>
                        <div class="col-sm-6">
                            <label for="surname">Surname:</label>
                            <input type="text" name="surname" class="form-control" value="{if $surname neq NULL}{$surname}{/if}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="mobile">Mobile:</label>
                            <input type="text" name="mobile" id="mobile" class="form-control"  value="{if $mobile neq NULL}{$mobile}{/if}"/>
                        </div>
                        <div class="col-sm-6">
                            <label for="phone">Local Phone (TRNC):</label>
                            <input type="text" name="phone" id="phone" class="form-control"  value="{if $phone neq NULL}{$phone}{/if}"/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6">
                            <label for="email">e-mail:</label>
                            <input type="text" name="email" class="form-control"  value="{if $email neq NULL}{$email}{/if}"/>
                        </div>

                    </div>
                    <div id="hidden-route-info" class="form-group row">
                        <input type="hidden" name="distance-hidden" id="distance-hidden" value="{if $distance neq NULL}{$distance}{/if}" >
                        <input type="hidden" name="duration-hidden" id="duration-hidden" value="{if $duration neq NULL}{$duration}{/if}">
                        <input type="hidden" name="fees-hidden" id="fees-hidden" value="{if $fees neq NULL}{$fees}{/if}">
                        <input type="hidden" name="fees-iso-hidden" id="fees-iso-hidden" value="EUR" value="{if $fees_iso neq NULL}{$fees_iso}{/if}" >
                        <input type="hidden" name="total-try-hidden" id="total-try-hidden" value="{if $total neq NULL}{$total}{/if}">
                    </div>

                    <div class="form-group row">
                        <input type="submit" class="btn btn-info" name="submit" id="submit_btn" value="Submit"/>
                    </div>
                    <!--<div class="form-group row">
                        <input type="reset" class="btn btn-info" value="Reset" name="reset" />
                    </div>-->
                </form>
            </div>
        </div>
    </div>
    <div class="card col-sm-6">
        <div class="card-body">
            <div id="route" style="height:400px; background-color: #f0ead8;"></div>
        </div>
    </div>
    <div class="card col-sm-6">
        <div class="card-body">
            <div id="route-info">
                <!-- Route information section -->
                <div class="form-group row">
                    <div class="col-lg-6">
                        <label><b>DISTANCE : &nbsp&nbsp<font size="+1"></font></b></lable>
                            <input type="text" value="" id="distance" size="10 !importat" readonly="readonly">
                            <b><font size=" + 1"> </font></b>
                    </div>
                    <div class="col-lg-6">
                        <label><b>DURATION : <font size="+1"></font> </b></label>
                        <input type="text" value="" id="duration" size="10 !importat" readonly="readonly">
                        <b><font size=" + 1"> </font></b>
                    </div>
                    <div class="col-lg-12">
                        <label><b>TOTAL PRICE: </b></lable>
                            <input type="text" value="" id="total-price" size="10 !importat" readonly="readonly">
                            <b><font size=" + 1"> &nbsp€</font></b>
                    </div>
                    <hr>
                    <div class="col-sm-4">
                        <label><b>Exchange To:</b></label>
                        <select id="exchange" name="exchange" class="form-control">
                            <option value="0">---</option>
                            <option value="AUD">AUD</option>
                            <option value="GBP">GBP</option>
                            <option value="USD">USD</option>
                            <option value="TRY">TRY</option>
                        </select>
                    </div>
                    <div id="exchange-fees" class="col-lg-8 float-left">
                    </div>



                </div>
            </div>
        </div>
    </div>


    {*{include file="footer.tpl"}*}
