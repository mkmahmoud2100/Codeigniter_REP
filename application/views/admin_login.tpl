{include file="header"}

<div class="">
   {if isset($login_errors_count)}
      {* {$login_errors_count}*}
   {/if}
</div>
<div class="">
    {if isset({$on_hold_message})}
        {$form_open}
            <table class="table">
                <tbody>
                    <tr>
                        <td><label for="login_string">Username: </label></td>
                        <td><input type="text" name="login_string" id="login_string" class="" autocomplete="off" maxlength="255" /></td>
                    </tr>
                    <tr>
                        <td><label for="login_pass" class="">Password: </label></td>
                        <td><input type="password" name="login_pass" id="login_pass" class=""  
                                   autocomplete="off" onfocus="" /></td>
                    </tr>
                    <tr>
                        <td><input name="submit" value="Login" id="submit_button" type="submit"></td>
                    </tr>
                </tbody>
        {$form_close}
    {/if}
    </div>
{include file="footer.tpl"}
