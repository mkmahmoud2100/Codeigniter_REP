
{include file="header.tpl"}

<div class="container">
    <div class="card">
        <div class="card-header">
            Reservation Information
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead></thead>
                    <tbody>
                        {foreach from=$bookingInfo item=info}
                            <tr>
                                <td>
                                    <label>Bookin No:</label>
                                    <label>{$info.booking_id}</label>
                                </td>
                                <td>
                                    <label>Booking Date:</label>
                                    <label>{$info.booking_date}</label>
                                </td>

                                <td>
                                    <label>Depart Date:</label>
                                    <label>{$info.depart_date}</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Depart Time:</label>
                                    <label>{$info.depart_time}</label>
                                </td>

                                {if {$info.type_id} == 'T'}

                                    <td>
                                        <label>Arrival Date:</label>
                                        <label>{$info.arrival_date}</label>
                                    </td>
                                    <td>
                                        <label>Arrival Time:</label>
                                        <label>{$info.arrival_time}</label>
                                    </td>
                                </tr>
                            {/if}

                            <tr>
                                <td>
                                    <label>Commited:</label>
                                    <label>{$info.commited}</label>
                                </td>
                                <td>
                                    <label>Latness:</label>
                                    <label>{$info.latness}</label>
                                </td>

                                <td>
                                    <label>Type:</label>
                                    <label>
                                        {if {$info.type_id} == 'O'}
                                            One Way
                                        {else}
                                            Two Way
                                        {/if}
                                    </label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Total:</label>
                                    <label>{$info.total}{$info.iso}</label>
                                </td>

                                <td>
                                    <label>Name:</label>
                                    <label>{$info.name}</label>
                                </td>
                                <td>
                                    <label>Surname:</label>
                                    <label>{$info.surname}</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Email:</label>
                                    <label>{$info.email}</label>
                                </td>
                                <td>
                                    <label>Mobile:</label>
                                    <label>{$info.mobile}</label>
                                </td>

                                <td>
                                    <label>Adults:</label>
                                    <label>{$info.adult}</label>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <label>Children:</label>
                                    <label>{$info.children}</label>
                                </td>

                                <td>
                                    <label>Bebe:</label>
                                    <label>{$info.bebe}</label>
                                </td>
                                <td>
                                    <label></label>
                                    <label></label>
                                </td>
                            </tr>
                        {/foreach}
                    </tbody>
                    <tfoot></tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Accessories Information
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead></thead>
                    <tbody>
                        {foreach from=$bookingAccessories item=acc}
                            <tr>
                                <td>
                                    <label>{$acc.title}</label>
                                </td>
                            </tr>
                        {/foreach}
                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            Cancelling  Information
        </div>
        <div class="card-body">
            <form method="post" action="">
                <div class="form-group row">
                    <div class="col-sm-8">
                        <button type="button" class="btn btn-info" name="close">
                            Close <span class=""><i class="fas fa-close fa-lg"></i></span>
                        </button>
                    </div>
                     <div class="col-sm-4">
                        <input type="submit" class="btn btn-danger" value="Cancel Reservation" name="cancel_reservation" />
                    </div>
                </div>
            </form>
        </div>
    </div>

</div>

{include file="footer.tpl"}