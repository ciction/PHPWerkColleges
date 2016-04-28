<?php
session_start();

//teller
$functionsExecutedCounter = 0;
if(!isset($_SESSION["functionsExecutedCounter"])){
    global $functionsExecutedCounter;
    $_SESSION["functionsExecutedCounter"]= $functionsExecutedCounter;
}
else{
    global $functionsExecutedCounter;
    $functionsExecutedCounter  = $_SESSION["functionsExecutedCounter"];
}



//berekenOppervlakteDriehoek(basis:double, hoogte:double):double
//berekenOppervlakteVierkant(zijde:double):double
//berekenOppervlakteRechthoek(zijde1:double,zijde2:double):double

function berekenOppervlakteCirkel($straal) {
    incrementCounter();
    $oppervlakte = pow($straal,2) * PI;
    return $oppervlakte;
}

function berekenOppervlakteDriehoek($basis, $hoogte) {
    incrementCounter();
    $oppervlakte = ($basis * $hoogte) / 2;
    return $oppervlakte;
}

function berekenOppervlakteVierkant($zijde) {
    incrementCounter();
    $oppervlakte = berekenOppervlakteRechthoek($zijde,$zijde);
    return $oppervlakte;
}

function berekenOppervlakteRechthoek($zijde1, $zijde2) {
    incrementCounter();
    $oppervlakte = ($zijde1 * $zijde2);
    return $oppervlakte;
}

function incrementCounter(){
    global $functionsExecutedCounter;
    $functionsExecutedCounter++;
    $_SESSION["functionsExecutedCounter"]= $functionsExecutedCounter;
}

?>