<?php
/**
 * Created by PhpStorm.
 * User: Christophe
 * Date: 4/21/2016
 * Time: 5:25 PM
 */

$message = '';

function addToMessage($string){
    global $message;
    $message = $message . ' ' . $string;
}

function clearMessage(){
    global $message;
    $message = '';
}


function printMessage(){
    global $message;
    echo ('<script>toggleVisibilityErrorMessage(\''.$message.'\');</script>');
}
?>







