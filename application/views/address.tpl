{include file="header.tpl"}
<script type="text/javascript">
    var site_url = "{$site_url}";
    var dataSet = [];
    {literal}
        $(document).ready(function () {
            $("#save").button({
                text: true,
                icons: {
                    primary: 'ui-icon-check',
                    secondary: 'ui-icon-lightbulb'
                }
            });
            $("#cancel").button({
                text: true,
                icons: {
                    primary: 'ui-icon-cancel',
                    secondary: 'ui-icon-cancel'
                }
            });

            $("#address_list").dataTable({
                responsive: true,
                select: true
            });
            /*  $.ajax({
             url: base_url + "index.php/Address/viewAll",
             type: "POST",
             dataType: "json",
             success: function (array) {
             for (var i = 0; i < array.length; i++) {
             dataSet.push([array[i].address_id, array[i].address,
             array[i].address2, array[i].district, array[i].city,
             array[i].postal_code, array[i].phone, array[i].last_update
             ]);
             }
             var table = $('#list').DataTable({
             data: dataSet
             });
             $('#products tbody').on('click', 'tr', function () {
             if ($(this).hasClass('selected')) {
             $(this).removeClass('selected');
             } else {
             table.$('tr.selected').removeClass('selected');
             $(this).addClass('selected');
             }
             });
             $("#products tbody").on("dblclick", 'tr', function () {
             
             var row = table.row(this).data();
             var id = row[0];
             //alert("id" + id);
             var url = base_url + "index.php/products/update_product/" + id;
             var options = 'width=800,height=600,scrollbars=no,menubar=no,status=yes,resizable=yes,screenx=200,screeny=0';
             var open_mode = "_blank";
             window.open(url, open_mode, options);
             });
             }
             });*/
        });
    {/literal}
</script>
<div class="container-fluid">
    <div class="">
        <table border="0" class="table">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <label for="address">Address:</label>
                        <input type="text" id="address">
                    </td>
                    <td>
                        <label for="address_2">Address2:</label>
                        <input type="text" id="address_2">
                    </td>
                    <td>
                        <label for="disctrict">District:</label>
                        <input type="text" id="district">
                    </td>
                    <td>
                        <label for="postal_code">Postal Code</label>
                        <input type="text" id="postal_code">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="city">City:</label>
                        <select id="city">
                            <option value="-1">Select</option>
                            {foreach from=$cities item=city}
                                <option value="{$city.city_id}">{$city.city}</option>
                            {/foreach}
                        </select>
                    </td>
                    <td>
                        <label for="phone">Phone/Cell</label>
                        <input type="text" id="phone">
                    </td>
                    <td>

                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td>
                        <button type="button" id="save">Save</button>
                        <button type="button" id="cancel">Canel</button>
                    </td>
                    <td></td>
                </tr>

            </tbody>
        </table>

    </div>

    <div class="table">
        <table id="address_list" class="table dataTable">
            <thead>
            <th>Id</th>
            <th>Address</th>
            <th>Address2</th>
            <th>District</th>
            <th>City</th>
            <th>Postal Code</th>
            <th>Phone</th>
            <th>Last Update</th>
            </thead>
            <tbody>
                <tr></tr>
            </tbody>
            <tfoot>
            <th>Id</th>
            <th>Address</th>
            <th>Address2</th>
            <th>District</th>
            <th>City</th>
            <th>Postal Code</th>
            <th>Phone</th>
            <th>Last Update</th>
            </tfoot>
        </table>
    </div>
</div>

{include file="footer.tpl"}