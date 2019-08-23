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