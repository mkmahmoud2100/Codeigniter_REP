<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>CyrpoTransfer</title>
        {* JQUERY AND GOOGLE MAP *}
        <script src="../../../js/jquery-3.3.1.min.js" type="text/javascript"></script>
        <script src="../../../js/gmaps.min.js" type="text/javascript"></script>

        {* BOOTSTRAP *}   
        <link href="../../../css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <link href="../../../css/bootstrap-grid.min.css" rel="stylesheet" type="text/css"/>
        <!--<link href="../../../css/bootstrap.min.css" rel="stylesheet" type="text/css"/>-->
        <script src="../../../js/bootstrap.js" type="text/javascript"></script>        
        <script src="../../../js/bootstrap.bundle.min.js" type="text/javascript"></script>
        <script src="../../../js/request-bundler.js" type="text/javascript"></script>
        <script src="../../../js/autocomplete.js" type="text/javascript"></script>
        <script src="../../../js/bootstrap-input-spinner.js" type="text/javascript"></script>

        {*JQUERY -UI *}
         <link href="../../../css/jquery-ui.theme.css" rel="stylesheet" type="text/css"/>
        <link href="../../../css/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <script src="../../../js/jquery-ui.js" type="text/javascript"></script>  
        <link href="../../../bower_components/jquery-ui/themes/ui-lightness/jquery-ui.css" rel="stylesheet" type="text/css"/>
        <link href="../../../bower_components/jquery-ui/themes/ui-lightness/theme.css" rel="stylesheet" type="text/css"/>
            
        {* JQUERY TIME PICKUP*}
        <link href="../../../css/jquery.timepicker.css" rel="stylesheet" type="text/css"/>
        <script src="../../../js/jquery.timepicker.js" type="text/javascript"></script>
        {* AUTO-COMPLETE*}
        <!--<script src="../../../js/autocomplete.js" type="text/javascript"></script>
        <script src="../../../js/request-bundler.js" type="text/javascript"></script>-->
        {* FONT AWAYSOME *}
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans" rel="stylesheet"> 
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower" rel="stylesheet"> 

        {* TRACKING*}
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-133687744-1"></script>
        <script>
            {literal}
                window.dataLayer = window.dataLayer || [];
                function gtag() {
                    dataLayer.push(arguments);
                }
                gtag('js', new Date());

                gtag('config', 'UA-133687744-1');
            {/literal}
        </script>
        {* GOOGLE MAP *}

            {literal}
         
            {/literal}
        </script>
        {* GOOGLE PLACES*}
        <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCrbZ3qvHdHY9_PxkNf85fqrJ9Rk2-crbE&libraries=places"></script>



        </head>
    <body>
        <script type="text/javascript">
            {literal}

            {/literal}
        </script>
        <div class="container-fluid">
            <div class="page-header">              
                <div class="col-sm-8">                        
                    <img src="" height="80px" alt=""/> 
                </div>
            </div>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <a class="navbar-brand" href="{$site_url}/home">CyproTransfer</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{$site_url}/home">HOME <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                BOOKING
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{$site_url}/booking">AIRPORT TRANSFERS</a>
                              <!--  <a class="dropdown-item" href="#">VIP TRANSFERS</a>
                                 <a class="dropdown-item" href="#">SPECIAL BOUTIQUE TOURS</a>
                                  <a class="dropdown-item" href="#">ORGANIZED TOURISTIC TOURS</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>-->
                            </div>
                        </li>
                        <!--<li class="nav-item">
                            <a class="nav-link" href="{$site_url}/services">SERVICES</a>
                        </li>-->
                        <li class="nav-item">
                            <a class="nav-link" href="{$site_url}/aboutus">ABOUT US</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{$site_url}/contact_us">CONTACT US</a>
                        </li>

                        <!--<li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">Action</a>
                                <a class="dropdown-item" href="#">Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link disabled" href="#">Disabled</a>
                        </li>-->
                    </ul>
                    <!--<form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>-->
                </div>
            </nav>
            <br>
