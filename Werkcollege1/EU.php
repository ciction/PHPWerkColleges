<?php
/**
 * Created by PhpStorm.
 * User: Christophe Swolfs
 * Date: 4/28/2016
 * Time: 1:04 PM
 */

$lidstaten = array("Austria (1995)",
    "Belgium (1958)",
    "Bulgaria (2007)",
    "Croatia (2013)",
    "Cyprus (2004)",
    "Czech Republic (2004)",
    "Denmark (1973)",
    "Estonia (2004)",
    "Finland (1995)",
    "France (1958)",
    "Germany (1958)",
    "Greece (1981)",
    "Hungary (2004)",
    "Ireland (1973)",
    "Italy (1958)",
    "Latvia (2004)",
    "Lithuania (2004)",
    "Luxembourg (1958)",
    "Malta (2004)",
    "Netherlands (1958)",
    "Poland (2004)",
    "Portugal (1986)",
    "Romania (2007)",
    "Slovakia (2004)",
    "Slovenia (2004)",
    "Spain (1986)",
    "Sweden (1995)",
    "United Kingdom (1973)");
asort($lidstaten); //arsort() voor reverse (gewone array geen key values)

?>
<h3>De Europese Unie:</h3>
    <p>De Europese Unie telt sinds 2007 in totaal 27 lidstaten.</p>
    <h4>De volledige lijst van lidstaten, alfabetisch gerangschikt</h4>
    <ol>
        <?php
        foreach ($lidstaten as $country)
            echo '<li>'.$country.'</li>';
        ?>
    </ol>


<br>
<p>
   <h4> variablene checken:</h4>
<?php
//variablene checken
        $variabele1 = 0;
        $variabele2;
        $variabele3= '';
        $variabele4 = ' ';
        $variabele5 = 1;

        echo 'isset($variabele1) :   ' . isset($variabele1) . '<br>';
        echo 'isset($variabele2) :   ' . isset($variabele2) . '<br>';
        echo 'empty($variabele3) :   ' . empty($variabele3) . '<br>';
        echo 'empty($variabele4) :   ' . empty($variabele4) . '<br>';
        echo ('isset($variabele5) == true && empty($variabele5)==false :   ' . (isset($variabele5)) . ' - ' . (empty($variabele5))) ;

?>
</p>
