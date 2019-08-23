{include file="header.tpl"}

<script>

    var site_url = "{$site_url}";
    {literal}
        $(document).ready(function () {
            $("#sendmessage").hide();
            $("#errormessage").hide();
       initMap();
                function initMap() {
                var myLatLng = new google.maps.LatLng('35.1856', '33.3823');
                        var map = new google.maps.Map(document.getElementById('map'), {
                        zoom: 12,
                                center: myLatLng
                        });
                        var marker = new google.maps.Marker({
                        position: myLatLng,
                                map: map,
                                title: 'Hello World!'
                        });
                }
            });
            
    {/literal}
</script>
<!--banner-->
<section id="banner" class="banner">
    {if $validation_errors neq NULL}
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {assign var=counter value=0}
            {foreach from=$validation_errors key =key item=error_row}
                {$error_row}
            {/foreach}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    {/if}
    <!--contact-->
    <section id="contact" class="section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="ser-title">Contact us</h2>
                    <div id="map" style="width:100%;height:200px; background-color: blue;">
                    </div>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <h3>Contact Info</h3>
                    <div class="space"></div>
                    <p><i class="fa fa-map-marker fa-fw pull-left fa-2x"></i>Sami address<br> New York, NY 17022</p>
                    <div class="space"></div>
                    <p><i class="fa fa-envelope-o fa-fw pull-left fa-2x"></i>info@cyprotransfer.com</p>
                    <div class="space"></div>
                    <p><i class="fa fa-phone fa-fw pull-left fa-2x"></i>+1 111 111 1234</p>
                </div>
                <div class="col-md-8 col-sm-8 marb20">
                    <div class="contact-info">
                        <h3 class="cnt-ttl">Having Any Query!</h3>
                        <div class="space"></div>
                        <div id="sendmessage">Your message has been sent. Thank you!</div>
                        <div id="errormessage"></div>
                        <form action="{$site_url}/Contact_us/sendEmail" method="post" role="form" class="contactForm" id="contact_post">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control br-radius-zero" id="name" value="{if $name neq NULL}{$name}{/if}" placeholder="Your Name and surname" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control br-radius-zero" name="email" id="email" value="{if $email neq NULL}{$email}{/if}" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control br-radius-zero" name="subject" id="subject" value="{if $subject neq NULL}{$subject}{/if}" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                                <div class="validation"></div>
                            </div>
                            <div class="form-group">
                                <textarea class="form-control br-radius-zero" name="message" rows="5" data-rule="required" value="{if $message neq NULL}{$message}{/if} data-msg="Please write something for us" placeholder="Message"></textarea>
                                <div class="validation"></div>
                            </div>

                            <div class="form-action">
                                <input type="submit" name="submit"/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<br/>
<!--/ contact-->
{include file="footer.tpl"}