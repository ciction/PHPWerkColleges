<?php

if(isset($_GET["addArtist"])) {
    header('#CreateArtistModal');

}

if(isset($_GET["InvalidIMG"])) {
    echo "<script>$('#IMGError').openModal();</script>";
}

if(isset($_GET["InvalidLogin"])) {
    echo "<script>$('#InvalidLoginError').openModal();</script>";
}
if(isset($_GET["WrongPassword"])) {
    echo "<script>$('#WrongPasswordError').openModal();</script>";
}


?>