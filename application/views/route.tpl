
{include file="header.tpl"}
<script>
    {literal}

    {/literal}
        $(document).ready(function () {
            $("input[type='number']").inputSpinner();
        });

</script>
<div class="container">
    <form class="form-inline">
        <div class="row">
            <h2>Route Information</h2>
            <hr>
            <div class="table-responsive">
                <table class="table-light">
                    <thead></thead>
                    <tbody>
                        <tr>
                            <td><label for="from_address">From Address:</label></td>
                            <td><input type="text" name="from_address" value="{$route.from_address}" class="" readonly="readonly"/></td>
                            <td><input type="text" value="{$route.intial_address}"/></td>

                            <td><label for="to_address">To Address:</label></td>
                            <td><input type="text" name="from_address" value="{$route.to_address}" class="" readonly="readonly"/></td>
                            <td><input type="text" value="{$route.destination_address}"/></td>
                        </tr>
                        <tr>
                            <td><label for="fees">Fees:</label></td>
                            <td><input type="text" name="fees" value="{$route.fees}" class="" readonly="readonly"/></td>
                            <td><input type="text" name="iso" value="{$route.iso}" class="" readonly="readonly"/></td>
                            <td><label class="text-justify">Estimated Time: &emsp;{$route.estimated_time}</label></td>
                            <td><label class="text-justify">Comments: &emsp;{$route.comments}</label></td>
                        </tr>
                    </tbody>
                    <tfoot></tfoot>
                </table>
                <br>
            </div>

        </div>
        <div class="row">
            <h2>Passengers Information:</h2>
            <hr>
            <div class="form-group">
                <label for="adults">Adults:</label>
                <input type="number" name="adult" class="" value="2" min="0" max="30" step="1"/>
            </div>
            <div class="form-group">
                <label for="kids">Kids:</label>
                <input type="number" name="kids" class="" value="0" min="0" max="30" step="1"/>
            </div>
            <div class="form-group">
                <label for="bebe">Bebe:</label>
                <input type="number" name="bebe" class="" value="0" min="0" max="30" step="1"/>
            </div>
            <div class="form-group">
                <label for="other">Other:</label>
                <input type="number" name="other" class="" value="0" min="0" max="30" step="1"/>
            </div>
        </div>
        <div class="row">
            <h2>Reserver Information:</h2>
            <hr>
            <div class="form-group">
                <label for="address">address:</label>
                <input type="text" name="address" class="form-control"/>
                <label for="email">Email:</label>
                <input type="text" name="email" class="form-control"/>
                <label for="country">Country:</label>
                <select class="form-control">
                    <option value="0">---</option>
                    {foreach from=$countries item=country}
                        {if $country.iso== 'TR'}
                            <option value="{$country.phonecode}" selected="true">{$country.name}</option>
                        {/if}
                        <option value="{$country.phonecode}">{$country.name}</option>
                    {/foreach}
                </select>
                <label for="phone">Phone/Cell:</label>
                <input type="text" name="phone" class="form-control"/>
            </div>
        </div>
    </form>
</div>
{include file="footer.tpl"}