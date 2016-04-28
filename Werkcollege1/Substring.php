<?php

splitsNaam("Christophe Swolfs");
voegNamenSamen("Christophe Pieter", "Swolfs");


function splitsNaam($naam){

    if (strpos($naam, ' ') == false) {
        die ('dit is geen volledige naam, vul voornaam en achtarnaam in');
    }
    $gesplitst = explode ( ' ' , $naam , 2 );
    $gesplitst = str_replace("_"," ",$gesplitst);

 echo '
      <ul>
        <li>Voornaam: ' . $gesplitst[0] . '</li>
        <li>Achternaam: ' . $gesplitst[1] . '</li>
     </ul>';
}


function voegNamenSamen($voornaam,$achternaam){

    $voornaam = str_replace(" ","_",$voornaam);
    splitsNaam($voornaam . ' ' . $achternaam);
}



?>