<?php

if(isset($_GET["addArtist"])) {
    header('#CreateArtistModal');
}

if(isset($_GET["InvalidIMG"])) {
    echo "<script>$('#errorModal').openModal();</script>";
}

if(isset($_GET["InvalidLogin"])) {
    echo "<script>$('#errorModal').openModal();</script>";
}
if(isset($_GET["WrongPassword"])) {
    echo "<script>$('#errorModal').openModal();</script>";
}


?>