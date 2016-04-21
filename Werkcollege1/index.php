<?php
/**
 * Created by PhpStorm.
 * User: Ontlener
 * Date: 21/04/2016
 * Time: 10:22
 */
define("PI",pi());
include 'meetkunde.php';

$straal = 0;
$basis = 0;
$hoogte = 0;
$zijdeV = 0;
$zijde1 = 0;
$zijde2 = 0;
?>



<head>
    <!--Material CSS-->
    <!------------------------------------------------------------------->
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
    <!-- Compiled and minified JavaScript -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>

    <!--Custom CSS-->
    <!------------------------------------------------------------------->
    <link rel="stylesheet" href="css/main.css">

    <!--javascript-->
    <!------------------------------------------------------------------->

    <script src="js/main.js"></script>
</head>




<body>
<div id="errorBox">
    <h1>hello</h1>
</div>

<div class="container">


<!--    row-->
    <div class="row">
<!--        card -->
        <div class="col s6">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title">Bereken de oppervlakte Cirkel</span>
                    <p>
                    <form method="post">
                        <h5>Straal:</h5>
                        <input type="number" step="0.01" value="0" name="straal" title="straal" >
                        <input type="submit" name="btnCirkel"  value="bereken oppervlakte cirkel" class="waves-effect waves-light btn">
                    </form>
                    </p>
                    <hr>
                    <p>
                        <?php
                        if (isset($_POST['btnCirkel'])) {
                            if (isset($_POST["straal"]) && !empty($_POST["straal"])) {
                                $straal = $_POST["straal"];
                            }
                        }
                        echo ('<h5>oppervlakte = ' . berekenOppervlakteCirkel($straal) . '<h5>');
                        ?>
                    </p>
                </div>
            </div>
        </div>
<!-- card-->
        <div class="col s6">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title">Bereken de oppervlakte Driehoek</span>
                    <p>
                    <form method="post">
                        <h5>Straal:</h5>
                        <input type="number" step="0.01" value="0" name="basis" title="basis">
                        <input type="number" step="0.01" value="0" name="hoogte" title="hoogte" >
                        <input type="submit" name="btnDriehoek" value="bereken oppervlakte driehoek" class="waves-effect waves-light btn">
                    </form>
                    </p>
                    <hr>
                    <p>
                        <?php
                        if (isset($_POST['btnDriehoek'])) {
                            if ( (isset($_POST["basis"]) && !empty($_POST["basis"])) && (isset($_POST["hoogte"]) && !empty($_POST["hoogte"])) ){
                                $basis = $_POST["basis"];
                                $hoogte = $_POST["hoogte"];
                            }
                        }
                        echo ('<h5>oppervlakte = ' . berekenOppervlakteDriehoek($basis,$hoogte) . '<h5>');
                        ?>
                    </p>
                </div>
            </div>
        </div>
<!--  end row-->
    </div>

 <?php include 'datainsettest.php'; ?>
</div>
</body>




