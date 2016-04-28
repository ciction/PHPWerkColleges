<?php
/**
 * Created by PhpStorm.
 * User: Ontlener
 * Date: 21/04/2016
 * Time: 10:22
 */
define("PI",pi());
include 'meetkunde.php';
?>

<!-- Compiled and minified CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/css/materialize.min.css">
<link rel="stylesheet" href="../main.css">
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.6/js/materialize.min.js"></script>


<?php
//    geeft een array terug dag - minuut - maand etc...
//    print_r(getdate());
//    $datum = mktime(0,0,0,12,31,2013);

    $nu = time();
// FORMAT   Dinsdag 01/10/2013, 09:08.
//    $test_month = date('F', $nu); // This month --> FULL     echo($test_month);
    $huidigeMaand = date('m', $nu);


/*December-Januari-Februari = Winter
Maart - April - Mei = Lente
Juni - Juli - Augustus = Zomer
September - Oktober November = Herfst*/
$Seizoenen = array("Winter","Winter","Lente","Lente","Lente","Zomer","Zomer","Zomer","Herfst","Herfst","Herfst","Winter");
$SeizoenenBescrijving = array("Winter" => "het sneeuwt","Lente" => "De bloemen komen uit!","Zomer" => "het is warm","Herfst" => "ugh regen");

?>

<body>
<div class="container">
    <div class="row">
            <div class="centerContent">
                <!--row-->
                <div class="row">
                <!--card -->
                    <div class="fillWidth">
                        <div class="card blue-grey darken-1">
                            <div class="card-content white-text">
                                <span class="card-title">Datum</span>
                                <p>
                                    <? echo date('l d/m/Y h:i', $nu); ?>
                                    <br>
                                    <? $seizoen = $Seizoenen[((int)$huidigeMaand)];
                                        echo($seizoen).'<br>';
                                        echo $SeizoenenBescrijving["$seizoen"];
                                    ?>
                                </p>
                                <hr>
                                <p>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
<!-- card-->


</div>
</body>




