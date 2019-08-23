{include file="header.tpl"}


<div class="container">
    <div class="card">
        <div class="card-header">
            Reservation Information
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead></thead>
                    <tbody>
                        <tr>
                            <td><label>Estimate Distance:</label></td>
                            <td><lable>Estimated Time</lable></td>
                    </tr>
                    <tr>
                        <td><label >Total Cost: {$row->fees} {$row->iso}<input type="hidden" id="totalFees" readonly="readonly"/> </label></td>
                        <td>
                            <select name="currencies" class="form-control">
                                <option value="0">---</option>
                                {foreach from=$currencies item=curr}
                                    <option value="{$curr.iso}"> {$curr.symbol} &nbsp;{$curr.name}</option>
                                {/foreach}
                            </select>

                        </td>
                    </tr>
                    </tbody>
                    <tfoot></tfoot>
                </table>
                <br>
            </div>
        </div>
    </div>
</div>
{include file="footer.tpl"}