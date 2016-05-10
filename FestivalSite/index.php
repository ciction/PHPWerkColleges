<?php
session_start();
require_once 'Design.html';
require_once 'Views/loginModalView.html';
require_once 'Views/CreateArtistModalView.php';


$_SESSION['homePageURL'] = $_SERVER['REQUEST_URI'];


?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Festival Home</title>
</head>
<body>



<!--Nav bar met hamburger menu voor mobiel-->
<!-- de Navbar zit in een pin-top wrapper dit laat de bar mee naar onder scrollen-->
<!--    <div class="tabs-wrapper pin-top" style="top: 0px;">-->
    <div class="pin-top">
        <div class="row" style="width: 100%;">
            <nav>
                <div class="nav-wrapper">
                    <a href="#!" class="brand-logo"><img src="images/logo.png" class="boundImg">Festival</a>
                    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
                    <ul class="right hide-on-med-and-down" >
                        <li><a href="#Home">Home</a></li>
                        <li><a href="#Artists">Artists</a></li>
                        <li><a href="#Tickets">Tickets</a></li>
                        <li><a href="#Map">Map</a></li>
                        <li><a class='dropdown-button' data-beloworigin="true" href='#' data-activates='dropdownAdmin'>Admin<i class="material-icons iconFix">arrow_drop_down</i></a></li>
                        <li><a class="waves-effect waves-light modal-trigger" href="#LoginModal"><i class="large material-icons">perm_identity</i></a></li>
                    </ul>
                    <ul class="side-nav" id="mobile-demo">
                        <li><a class="waves-effect waves-light modal-trigger" href="#LoginModal">Login</a></li>
                        <li><a href="#Home">Home</a></li>
                        <li><a href="#Artists">Artists</a></li>
                        <li><a href="#Tickets">Tickets</a></li>
                        <li><a href="#Map">Map</a></li>
                        <li><a class='dropdown-button' data-beloworigin="true" href='#' data-activates='dropdownAdminSmall'>Admin<i class="material-icons iconFix">arrow_drop_down</i></a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>

    <!-- Dropdown Structure -->
    <ul id='dropdownAdmin' class='dropdown-content'>
        <li><a class="modal-trigger" href="#CreateArtistModal">AddArtist</a></li>
        <li><a href="#!">two</a></li>
        <li class="divider"></li>
        <li><a href="#!">three</a></li>
    </ul>
    <!-- Dropdown Structure small-->
    <ul id='dropdownAdminSmall' class='dropdown-content'>
        <li><a class="modal-trigger" href="#CreateArtistModal">AddArtist</a></li>
        <li><a href="#!">two</a></li>
        <li class="divider"></li>
        <li><a href="#!">three</a></li>
    </ul>





    <!-- onzichtbare div onder de navbar - drukt alles naar onder-->
    <div class="UnderNavbarMargin ">
    </div>

    <div class="temp">hello world</div>

    <div id="Home" class="section scrollspy">
        <p>Home</p>
    </div>

    <!--parallax container met afbeelding erboven en eronder-->
    <div>
        <div class="parallax-container">
            <div class="parallax"><img src="images/parallax/festival_background_parallax_top.jpg" ></div>
        </div>
            <div class="section white">
                <div class="row container">
                    <h2 class="header">Festival Christophe Swolfs</h2>
                    <p class="grey-text text-darken-3 lighten-3">Welkom.</p>
                </div>
            </div>
        <div class="parallax-container">
            <div class="parallax"><img src="images/parallax/festival_background_parallax_bottom.jpg"</div>
        </div>
    </div>






<div class="container">
    <div class="row">
        <div class="col s12 l6 offset-l6"></div>
        <div id="users">

        </div>

    </div>

    <div id="Artists" class="section scrollspy">
        <h2>Artists</h2>
        <div  class="row" id="artists">
        </div>
    </div>

</div>




<!--JQuerry-->
<script type="text/javascript" src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
<!--Import jQuery before materialize.js-->
<!--<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>-->
<script type="text/javascript" src="Design/materialize.js"></script>


<!--Javascript-->
<script src="Design/main.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="Design/main.css">
<!--Javascript-->
<script src="Design/index.js"></script>

<?php
require_once 'Views/ErrorMessage.html';
require_once 'phpListeners.php';
?>

</body>
</html>