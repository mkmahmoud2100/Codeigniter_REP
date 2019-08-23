
{include file="header.tpl"}

<script>
    var site_url = '{$site_url}';
    var twoway = '{$twoway}';
    console.log(tripType);
    var total = 0;
    var adult = 0;
    var kids = 0;
    var baby = 0;
    var accessory_fees = 0;

    {literal}

        $(document).ready(function () {

            $("input[type='number']").inputSpinner();
            $("#zip").hide();

            $('#depart-date').datepicker({
                format: 'dd/mm/yyyy',
                startDate: '-3d',
                zIndexOffset: 99999

            });
            $('#arrival-date').datepicker({
                format: 'dd/mm/yyyy',
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
        });
    {/literal}
</script>

<div class="container">
    {if $validation_errors neq NULL}
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {**{assign var=counter value=0}
            {foreach from=$validation_errors item=error_row}
            {if $counter eq 2}
            {$counter=0}
            {else}

            {/if}
            {/foreach}**}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    {/if}
    <form method="post" action="{$site_url}/booking/">
        <div class="card">
            <div class="card-header">
                Customer Information
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="name">Name:</label>
                        <input type="text" name="name" class="form-control" value=""/>
                    </div>
                    <div class="col-sm-4">
                        <label for="surname">Surname:</label>
                        <input type="text" name="surname" class="form-control"/>
                    </div>
                    <div class="col-sm-4">
                        <label for="surname">Reservation Code:</label>
                        <input type="text" name="reservation-code" value="{$lastCode}" class="form-control" readonly="readonly"/>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="phone">Mobile:</label>
                        <input type="text" name="phone" id="phone" class="form-control"/>
                    </div>
                    <div class="col-sm-4">
                        <label for="email">e-mail:</label>
                        <input type="text" name="email" class="form-control"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                Booking Information
            </div>
            <div class="card-body">
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="phone">Flight No:</label>
                        <input type="text" name="phone" id="phone" class="form-control"/>
                    </div>
                   <!-- <div class="col-sm-4">
                        <label for="phone">Airlines Name:</label>
                        <input type="text" name="phone" id="phone" class="form-control"/>
                    </div>
                    <div class="col-sm-4">
                        <label for="phone">Departure Airport:</label>
                        <input type="text" name="phone" id="phone" class="form-control"/>
                    </div>-->
                </div>
                <div class="form-group row">
                    <div class="col-sm-4">
                        <label for="depart-date">Trasnfer Date:</label>
                        <div class="input-group date" data-provide="datepicker">
                            <input type="text" id="depart-date" class="form-control">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label for="depart-time">Pick up Time:</label>
                        <input type="text"  id="depart-time" class="form-control"/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
                <div class="form-group row">                  
                    <div class="col-sm-4">
                        <label for="arrival-date">Return transfer Date:</label>
                        <div class="input-group date" data-provide="datepicker">
                            <input type="text" id="arrival-date" class="form-control">
                            <div class="input-group-addon">
                                <span class="glyphicon glyphicon-th"></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <label for="arrival-time">Pick up Time:</label>
                        <input type="text"  id="arrival-time" class="form-control"/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="card">
            <div class="card-header">
                Passengers Information
            </div>
            <div class="card-body">
                <div class="form-group row">            
                    <div class="col-sm-4">
                        <label for="adults">Adults:</label>
                        <input type="number" name="adult" id="adult" class="form-control" value="0" min="0" max="30" step="1"/>
                    </div>

                    <div class="col-sm-4">
                        <label for="kids">Kids:</label>
                        <input type="number" name="kids" id="kids" class="form-control " value="0" min="0" max="30" step="1"/>
                    </div>

                    <div class="col-sm-4">
                        <label for="baby">Baby:</label>
                        <input type="number" name="baby" id="baby" class="form-control" value="0" min="0" max="30" step="1"/>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                Accessories Free Charge!
            </div>
            <div class="card-body">
                <div class="form-group row"> 
                    {foreach from=$accessory item=acc}
                        <div class="input-group col-sm-4">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <input type="checkbox" class="checkbox" value="{$acc->accessory_id}" name="{$acc->title}" id="{$acc->title}" aria-label="Checkbox for following text input">
                                </div>
                            </div>
                            <input type="text" class="form-control" aria-label="Text input with checkbox" value="&nbsp;{$acc->title}" readonly="readonly">
                        </div>
                    {/foreach}
                </div>
            </div>
        </div>
        <div class="form-group"> 
            <input type="submit" class="btn" name="submit" value="Submit"/>
        </div>
    </form>
</div>
{include file="footer.tpl"}