{include file="header.tpl"}
<script type="text/javascript">
    var site_url = "{$site_url}";
    var dataSet = [];
    var table;
    {literal}
        $(document).ready(function () {

            //buttons
            $("#add").button({
                icons: {
                    primary: 'ui-icon-check',
                    secondary: 'ui-icon-arrow'
                }
            });
            $("#submit").button({
                icons: {
                    primary: 'ui-icon-check',
                    secondary: 'ui-icon-arrow'
                }
            });

            $("#update").button({
                icons: {
                    primary: 'ui-icon-check',
                    secondary: 'ui-icon-arrow'
                }
            });
            $("#delete").button({
                icons: {
                    primary: 'ui-icon-cancel',
                    secondary: 'ui-icon-arrow'
                }
            });
            $("#cancel").button({
                text: true,
                icons: {
                    primary: 'ui-icon-cancel',
                    secondary: 'ui-icon-cancel'
                }
            });
            $("#upload").button({
                text: true,
                icons: {
                    primary: 'ui-icon-start',
                    secondary: 'ui-icon-disk'
                }
            });
            $("#currency").selectmenu();

            $("#amount").spinner({
                min: 0,
                max: 10
            });
            /*$('#accessories').dataTable({
             responsive: true,
             select: true
             });*/

            $.ajax({
                url: site_url + "/api/accessories/accessories/",
                type: "GET",
                dataType: "json",
                contentType: "application/json; charset=utf-8",
                success: function (array) {

                    for (var i = 0; i < array.length; i++) {
                        console.log(array[i].accessory_id + array[i].title);
                        dataSet.push([array[i].accessory_id, array[i].title,
                            array[i].fees, array[i].currency_iso, array[i].image_id,
                            array[i].created, array[i].modified, array[i].status
                        ]);
                    }
                    table = $('#accessories').DataTable({
                        data: dataSet,
                        responsive: true,
                        select: true
                    });

                    $('#products tbody').on('click', 'tr', function () {
                        if ($(this).hasClass('selected')) {
                            $(this).removeClass('selected');
                        } else {
                            table.$('tr.selected').removeClass('selected');
                            $(this).addClass('selected');
                        }
                    });

                    $("#accessories tbody").on("dblclick", 'tr', function () {

                        var row = table.row(this).data();
                        var id = row[0];
                        $("#accessory_id").val(id);
                        $("#title").val(row[1]);
                        $("#fees").val(row[2]);
                        $("#currency_iso").val(row[3]);

                        // alert("id" + id);

                    });
                },
                error: function () {
                    alert("error  ");
                }
            });

            $("#submit").on('click', function () {

                /* table.row.add([
                 3, 'test', 40, '', '', '', '', ''
                 ]).draw( true );*/

                //var form = $("#form-post-accessories");

                var id = $("#accessory_id").val();
                var title = $("#title").val();
                var fees = $("#fees").val();
                var currency = $("#currency_iso").val();
                var obj = {
                    id: '',
                    title: title,
                    fees: fees,
                    currency: currency,
                    image_id: '',
                    created: '',
                    modified: '',
                    status: 'active'
                };
                $.ajax({
                    type: "POST",
                    url: "http://localhost:8083/index.php/api/accessories/accessories",
                    data: obj,
                    dataType: 'JSON',
                    beforeSend: function () {
                    },
                    success: function (response) {
                    },
                    statusCode: {
                        201: function (response) { //HTTP_CREATED
                            swal('', 'User created!', 'success');
                            $('#form-post-user')[0].reset();
                        },
                        400: function (response) { //HTTP_BAD_REQUEST
                            var response = JSON.parse(response.responseText).message;
                            var output = '';
                            for (var key in response) {
                                output += response[key] + '<br>';
                            }
                            swal('Oops...', output, 'error');
                        },
                        401: function (response) { //HTTP_UNAUTHORIZED
                            swal('Oops...', 'HTTP_UNAUTHORIZED', 'error');
                        },
                        403: function (response) { //HTTP_FORBIDDEN
                            swal('Oops...', 'HTTP_FORBIDDEN', 'error');
                        },
                        404: function (response) { //HTTP_NOT_FOUND
                            swal('Oops...', 'HTTP_NOT_FOUND', 'error');
                        },
                        408: function (response) { //HTTP_REQUEST_TIMEOUT
                            swal('Oops...', 'HTTP_REQUEST_TIMEOUT', 'error');
                        },
                        409: function (response) { //HTTP_CONFLICT 
                            var response = JSON.parse(response.responseText).message;
                            swal('Oops...', response, 'error');
                        },
                        500: function (response) { //HTTP_INTERNAL_SERVER_ERROR
                            swal('Oops...', HTTP_INTERNAL_SERVER_ERROR, 'error');
                        },
                    },
                    error: function () {
                        console.log('failed request!');
                    }
                });
                return false;
            });


            $("#delete").on('click', function () {
                /*var id=table.row('.selected').remove().draw( true );*/
                var id = $("#accessory_id").val();

                if (id > parseInt('0')) {
                    $.ajax({
                        type: "DELETE",
                        url: site_url + "/api/accessories/accessories/" + id,
                        dataType: 'json',
                        beforeSend: function () {
                        },
                        success: function (response) {
                        },
                        statusCode: {
                            204: function (response) { //NO_CONTENT
                                swal('Deleted!', 'Your file has been deleted.', 'success');
                            },
                            401: function (response) { //HTTP_UNAUTHORIZED
                                swal('Oops...', 'HTTP_UNAUTHORIZED', 'error');
                            },
                            403: function (response) { //HTTP_FORBIDDEN
                                swal('Oops...', 'HTTP_FORBIDDEN', 'error');
                            },
                            404: function (response) { //HTTP_NOT_FOUND
                                swal('Oops...', 'HTTP_NOT_FOUND', 'error');
                            },
                            405: function (response) { //HTTP_NOT_FOUND
                                swal('Oops...', 'HTTP_METHOD_NOT_ALLOWED', 'error');
                            },
                            408: function (response) { //HTTP_REQUEST_TIMEOUT
                                swal('Oops...', 'HTTP_REQUEST_TIMEOUT', 'error');
                            },
                            500: function (response) { //HTTP_INTERNAL_SERVER_ERROR
                                swal('Oops...', HTTP_INTERNAL_SERVER_ERROR, 'error');
                            },
                        },
                        error: function () {
                            console.log('failed request!');
                        }
                    });
                }
                return false;
            });
        });

    {/literal}
</script>
<div class="page-header">
    Accessories
</div>
<div class="form">
    <!--  <form method="post" action="http://localhost:8083/index.php/api/accessories/accessories" name='form-post-accessories' id="form-post-accessories">-->
    <table class="table">
        <thead>            
        </thead>
        <tbody>
            <tr>
                <td>
                    <input type="hidden" id="accessory_id">
                    <label for="title">Title:</label>
                    <input type="text" id="title">
                </td>
                <td>
                    <label for="fees">Fees:</label>
                    <input type="text" id="fees" value="0">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="currency">Currency:</label>
                    <select id="currency">
                        <option value="-1">Select</option>
                        {foreach from=$currencies item=currency}
                            <option value="{$currency.iso}">{$currency.name}</option>
                        {/foreach}
                    </select>
                </td>
                <td>
                    <label for="amount">Amont:</label>
                    <input id="amount" value="amount">
                </td>
            </tr>

            <tr>
                <td>
                    <button id="submit" name="submit">Submit</button>
                    <button id="update">Update</button>
                </td>
                <td>
                    <button id="delete">delete</button>                     
                    <button id="cancel">Cancel</button>
                </td>
            </tr>
        </tbody>
    </table>
    <!--</form>-->
</div>
<div class="list">
    <table id="accessories" class="table dataTable">
        <thead>
        <th>Id</th>
        <th>Title</th>
        <th>Fees</th>
        <th>Currency</th>
        <th>Image</th>
        <th>Created</th>
        <th>Modified</th>
        <th>Status</th>
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
        <th>Created</th>
        <th>Modified</th>
        <th>Status</th>
        </tfoot>
    </table>
</div>
{include file="footer.tpl"}