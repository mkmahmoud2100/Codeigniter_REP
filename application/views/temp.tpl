 <div id="exchange-card">
        <div class="card col-lg-6">
            <div class="card-body">

                <div class="form-group row">
                    <div id="" class="col-lg-8 float-left">
                    </div>
                    <div class="col-sm-4">
                        <label><b>Exchange To:</b></label>
                        <select id="" name="" class="form-control">
                            <option value="0">---</option>
                            <option value="AUD">AUD</option>
                            <option value="GBP">GBP</option>
                            <option value="USD">USD</option>
                            <option value="TRY">TRY</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>

 $("#return-flight-no-div").hide();
            $("#return-way-div").hide();
            $("#hidden-route-info").hide();
            $("#exchange-card").hide();

            $("#return-way").change(function () {
                if ($('#return-way').prop('checked')) {
                    $("#return-flight-no-div").show();
                    $("#return-way-div").show();
                    $("#exchange-card").show();
                    if ($("#exchange").attr("option:selected").val() !== '0') {
                        //alert("checked");
                        var temp1 = '<p id="fees-exchange-x2">X2</p>';
                        var temp2 = '<p id="total-price-x2">X2</p>';
                        $("#fees-exchange").append(temp1);
                        $("#total-price").append(temp2);
                    }
                } else {
                    $("#return-flight-no-div").hide();
                    $("#return-way-div").hide();
                    $("#fees-exchange-x2").remove();
                    $("#total-price-x2").remove();
                    //alert("not checked");
                }
            });
            $("#reset").click(function () {
                //console.log("Reset");
                $("#reservation")[0].reset();
                location.reload(true);
            });
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
                timeFormat: 'h:mm p',
                interval: 15,
                dynamic: false,
                dropdown: true,
                scrollbar: true,
                zindex: 99999
            });
            $('#arrival-time').timepicker({
                timeFormat: 'h:mm p',
                interval: 15,
                dynamic: false,
                dropdown: true,
                scrollbar: true,
                zindex: 99999
            });
            
              $("#total-try").val(Math.ceil(json.rates.TRY * (parseInt(response.routes[0].legs[0].distance.text) * 0.75)));
                               
             $("#distance-hidden").val(response.routes[0].legs[0].distance.text);
                            $("#duration-hidden").val(response.routes[0].legs[0].duration.text);
                            $("#fees-hidden").val(Math.ceil(parseInt(response.routes[0].legs[0].distance.text) * 0.75));

                            $("#distance").val(response.routes[0].legs[0].distance.text);
                            $("#duration").val(response.routes[0].legs[0].duration.text);
                            $("#total-fees").val(Math.ceil(parseInt(response.routes[0].legs[0].distance.text) * 0.75));
                            
            
              function exchangeRate(amount, symbol) {
            //alert("Amount " + amount + 'Symbol ' + symbol)
            // set endpoint and your access key
            endpoint = 'latest';
            access_key = '23691197eabcac1df5731ec39d88f743';
// get the most recent exchange rates via the "latest" endpoint:
            $.ajax({
                url: 'http://data.fixer.io/api/' + endpoint + '?access_key=' + access_key,
                dataType: 'jsonp',
                success: function (json) {
                    json.rates.TRY * parseInt(amount);
                    var routeInfo = '';
                    if (symbol === '0') {

                    }
                    if (symbol === 'USD') {
                        $("#fees-exchange").remove();
                        routeInfo += '<div id="fees-exchange" class="col-sm-6">';
                        routeInfo += '<label><b>FEES : <font size="+1">' + Math.ceil(json.rates.USD * (distance * 0.75)) + ' $</font></b></lable>';
                        routeInfo += '</div>';
                        $("#fees").val(Math.ceil(json.rates.USD * (distance * 0.75)));
                        $("#fees-iso").val('USD');
                    }
                    if (symbol === 'AUD') {
                        $("#fees-exchange").remove();
                        routeInfo += '<div id="fees-exchange" class="col-lg-6">';
                        routeInfo += '<label><b>FEES :<font size="+1"> ' + Math.ceil(json.rates.AUD * (distance * 0.75)) + ' A$</font></b></lable>';
                        routeInfo += '</div>';
                        $("#fees").val(Math.ceil(json.rates.AUD * (distance * 0.75)));
                        $("#fees-iso").val('AUD');

                    }
                    if (symbol === 'GBP') {
                        $("#fees-exchange").remove();
                        routeInfo += '<div id="fees-exchange" class="col-lg-6">';
                        routeInfo += '<label><b>FEES :  <font size="+1">' + Math.ceil(json.rates.GBP * (distance * 0.75)) + ' £</font></b></lable>';
                        routeInfo += '</div>';
                        $("#fees").val(Math.ceil(json.rates.GBP * (distance * 0.75)));
                        $("#fees-iso").val('GPB');
                    }
                    if (symbol === 'TRY') {
                        $("#fees-exchange").remove();
                        routeInfo += '<div id="fees-exchange" class="col-lg-6">';
                        routeInfo += '<label><b>FEES : <font size="+1">' + Math.ceil(json.rates.TRY * (distance * 0.75)) + ' TL</font></b></lable>';
                        routeInfo += '</div>';
                        $("#fees").val(Math.ceil(json.rates.TRY * (distance * 0.75)));
                        $("#fees-iso").val('TRY');
                    }

                    $("#exchange-fees").append(routeInfo);
                    // exchange rata data is stored in json.rates
                    //alert(json.rates.GBP);

                    // base currency is stored in json.base
                    //alert(json.base);

                    // timestamp can be accessed in json.timestamp
                    // alert(json.timestamp);

                }
            });
        }