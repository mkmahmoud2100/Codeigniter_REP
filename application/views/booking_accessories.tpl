{include file="header.tpl"}
<script>
    var site_url = '{$site_url}';
    var tr = "";
    var total = 0;
    {literal}

        $(document).ready(function () {

            $("#add").click(function () {
                //alert("Add");
                var accessory_id = $("#accessory :selected").val();
                var title = $("#accessory :selected").text();
                var fees = $("#accessory_fees").val();
                var iso = $("#accessory_iso").val();

                var amount = $("#accessory_amount").val();

                total += fees * amount;
                console.log("total " + total);
                $("#total").val(total);
                tr = "<tr>\n\
                <td>" + accessory_id + " " + title + "</td>\n\
                <td>" + fees + " " + iso + "</td>\n\
                <td>" + amount + "</td>\n\
                </tr>";
                $("#accessories_table").append(tr);
            });

            $("#accessory").change(function () {
                //alert("select change");
                var accessory_id = $("#accessory :selected").val();
                getAccssory(accessory_id);
            });

        });
        function getAccssory(accessory_id) {

            $.ajax({
                url: site_url + "/accessories_controller/viewById/" + accessory_id,
                dataType: "JSON",
                type: "POST",
                success: function (array) {
                    for (var i = 0; i < array.length; i++) {

                        // alert("acc");
                        //alert(array[i].fees);
                        $("#accessory_fees").val(array[i].fees);
                        $("#accessory_iso").val(array[i].iso);
                    }
                },
                error: function (requst, status, error) {
                    alert(requst.responseText + error);
                }
            });
        }
    {/literal}
</script>
<div class="container">
    <div class="">

    </div>
    <div class="table-responsive table-striped">
        <table class="table" id="accessories_table">
            <thead>
            <th>Accessory</th>
            <th>Fees</th>
            <th>Amount</th>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <label for="total">Total:</label>
                        <input type="text" name="total" id="total" >
                        <label id="total_label"></label>
                    </td>
                </tr>
            </tbody>
            <tfoot></tfoot>
        </table>
    </div>
    <form>
        <div class="form-group col-sm-4">
            <label for="accessory">Accessory:</label>          
            {foreach from=$accessory item=acc}
                <input type="checkbox" value="{$acc->accessory_id}" name="{$acc->title}" id="{$acc->title}">{$acc->title}&nbsp;{$acc->fees}&nbsp;{$acc->iso}<br>
            {/foreach}

        </div>

        <div class="form-group col-sm-4">
            <div class="col-sm-4">
                <label for="accessory_amount">Amount:</label>
                <input type="number" name="accessory_amount" id="accessory_amount" class="form-control " value="0" min="0" max="3" step="1"/>
            </div>
        </div>
        <div class="form-group col-sm-4">
            <div class="col-sm-4">
                <label for="accessory_fees">Fees:</label>
                <input type="text" name="accessory_fees" id="accessory_fees" class="form-control "/>
                <input type="text" name="accessory_iso" id="accessory_iso" class="form-control "/>
            </div>
        </div>

        <div class="form-group col-sm-4">
            <input type="button" id="add" name="add" value="Add"/>
        </div>
        <div class="form-group col-sm-4">
            <input type="button" name="skip" value="Skip"/>
            <input type="submit" name="submit" value="Submit"/>
        </div>
    </form>
</div>
{include file="footer.tpl"}