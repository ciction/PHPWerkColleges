<?php
session_start();
require_once 'Design.html';
require_once "ConnectionDAO.php";
require_once 'Authentication.php';
require_once 'loginModalController.php';
require_once 'Views/CreateArtistModalView.php';

//$_SESSION['homePageURL'] = $_SERVER['REQUEST_URI'];
$_SESSION['homePageURL'] = 'http://localhost/PHPWerkColleges/FestivalSite/index.php';

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Festival Home</title>
</head>
<body>

<?php require_once 'Views/navBar.php'; ?>
    <div id="Home" class="section scrollspy">
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
require_once 'Views/ImageErrorMessage.html';
require_once 'Views/LoginErrorMessage.html';
require_once 'Views/WrongPasswordErrorMessage.html';
require_once 'phpListeners.php';
?>

</body>
</html>