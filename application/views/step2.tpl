{include file="header.tpl"}
<script type="text/javascript">
    var base_url = "{$base_url}";
    {literal}
        $(document).ready(function () {
            $("#next").button({
                text: true,
                icons: {
                    primary: 'ui-icon-check',
                    secondary: 'ui-icon-arrow'
                }
            });
            $("#add_accessories").button({
                icons: {
                    primary: 'ui-icon-check',
                    secondary: 'ui-icon-arrow'
                }
            });
            $.ajax({
                url: base_url + "index.php/Accessories/viewAll",
                type: "POST",
                dataType: "json",
                success: function (array) {
                    for (var i = 0; i < array.length; i++) {
                        dataSet.push([array[i].accessory_id, array[i].title,
                            array[i].fees, array[i].currency_iso, array[i].image_id
                        ]);
                    }
                    var table = $('#accessories').DataTable({
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

                }
            });

        });
    {/literal}
</script>

<div class="table-responsive">
    <form id="" action="" method="post">
        <table class="table">
            <thead>            
            </thead>
            <tbody>
                <tr>
                    <td><label for="title">Title:</label></td>
                    <td>
                        <select id="title">
                            <option value="-1">Select</option>
                            {foreach from=$accessories item=$accessory}
                                <option value="{$accessory.accessory_id}">{$accessory.title}</option>
                            {/foreach}
                        </select>
                    </td>
                    <td><label for="fees">Fees:</label></td>
                    <td><input type="text" id="fees"></td>
                    <td><label for="count">Amont:</label></td>
                    <td><input type="number" id="amount" value="1" min="0" max="10"></td>
                </tr>
                <tr>
                    <td><label for="image_id">Image:</label></td>
                    <td><img src="{$base_url}" width="300" height="300" alt="Sorry media is not fond!"></td>
                </tr>
                <tr>
                    <td><button id="add_accessories">Add Item</button></td>
                </tr>
            </tbody>
        </table>
        <button id="next">Next</button>
    </form>
</div>

<div>
    <table id="accessories" class="table dataTable">
        <thead>
        <th>Id</th>
        <th>Title</th>
        <th>Fees</th>
        <th>Currency</th>
        <th>Image</th>
        </thead>
        <tbody>
            <tr></tr>
        </tbody>
        <tfoot>
        <th>Id</th>
        <th>Title</th>
        <th>Fees</th>
        <th>Currency</th>
        <th>Image</th>
        </tfoot>
    </table>
</div>
</div>
{include file="footer.tpl"}