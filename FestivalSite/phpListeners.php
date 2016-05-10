<?php

if(isset($_GET["addArtist"])) {
    header('#CreateArtistModal');

}

if(isset($_GET["InvalidIMG"])) {
    echo "<script>$('#IMGError').openModal();</script>";
}



?>