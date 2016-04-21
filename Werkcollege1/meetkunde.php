<?php
/**
 * Created by PhpStorm.
 * User: Ontlener
 * Date: 21/04/2016
 * Time: 11:32
 */

//berekenOppervlakteDriehoek(basis:double, hoogte:double):double
//berekenOppervlakteVierkant(zijde:double):double
//berekenOppervlakteRechthoek(zijde1:double,zijde2:double):double

function berekenOppervlakteCirkel($straal) {
    $oppervlakte = pow($straal,2) * PI;
    return $oppervlakte;
}

function berekenOppervlakteDriehoek($basis, $hoogte) {
    $oppervlakte = ($basis * $hoogte) / 2;
    return $oppervlakte;
}

function berekenOppervlakteVierkant($zijde) {
    $oppervlakte = berekenOppervlakteRechthoek($zijde,$zijde);
    return $oppervlakte;
}

function berekenOppervlakteRechthoek($zijde1, $zijde2) {
    $oppervlakte = ($zijde1 * $zijde2);
    return $oppervlakte;
}


?>