
{include file="header.tpl"}
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBDDLs30w9PpbyVLfZvaN5t-Mxq2sfouHQ&callback=initMap"
        async defer> var map;

</script>
<script>

    var site_url = "{$site_url}";
    {literal}

        $(document).ready(function () {
        });
        function forwardToBooking() {
            window.location.href = site_url+"/booking";
        }
    {/literal}
</script>
<div class="row">
    <div class="col-12">
        <div id="slides" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img  class="d-block w-100" height="300" src="../../../images/vito3.jpg" alt="First Slide"/>
                </div>
                <div class="carousel-item">
                    <img  class="d-block w-100" height="300" src="../../../images/vito2.jpg" alt="Second Slide"/>
                </div>
                <div class="carousel-item">
                    <img  class="d-block w-100" height="300" src="../../../images/vito3.jpg" alt="Third Slide"/>
                </div>
                <div class="carousel-item">
                    <img  class="d-block w-100" height="300" src="../../../images/vito2.jpg" alt="Forth Slide"/>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</div>

<div class="card-deck">
    <div class="card">
        <img class="card-img-top" height="220px" width="300px" src="../../../images/airport-transfer.jpeg" alt="AIRPORT TRANSFER">
        <div class="card-body">
           
            <button id="airport-transfer" class="btn btn-secondary btn-sm" onclick="forwardToBooking();">AIRPORT TRANSFER</button>
        </div>
    </div>
    <div class="card">
        <img class="card-img-top" height="220px" width="300px" src="../../../images/Buyuk-Han-Paphos-Turkish-Association4.jpg" alt="DAILY TOURS ">
        <div class="card-body">
            <font color="red" size="+1"><i>We are comming soon...</i></font>
            <button id="" class="btn btn-secondary btn-sm disabled">DAILY ORGANIZED TOURS</button>
        </div>
    </div>
    <div class="card">
        <img class="card-img-top" height="220px" width="300px" src="../../../images/golden-sun.jpeg" alt="SPECIAL OFFERS TOURS ">
        <div class="card-body">
            <font color="red" size="+1"><i>We are comming soon...</i></font>
            <button id="" class="btn btn-secondary btn-sm disabled">SPECIAL TOURS</button>
        </div>
    </div>
    <div class="card">
        <img class="card-img-top" height="220px" width="300px" src="../../../images/vip-tours.jpg" alt="VIP TRANSFER ">
        <div class="card-body">
            <font color="red" size="+1"><i>We are comming soon...</i></font>
            <button id="" class="btn btn-secondary btn-sm disabled">VIP TRANSFER</button>
        </div>
    </div>
</div>


{include file="footer.tpl"}
