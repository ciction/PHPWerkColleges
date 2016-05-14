<?php
require_once 'Classes/error.php';
$errorMessage = new ErrorMessage();


if(isset($_GET["InvalidIMG"])) {
    $errorMessage = new ErrorMessage("Image Error:","Invalid file Size or Type <br> The image should be jpeg/jpg/png smaller then 600kb try again");
}
if(isset($_GET["InvalidLogin"])) {
        $errorMessage = new ErrorMessage("Login Error:","This login does not exist");
}
if(isset($_GET["WrongPassword"])) {
    $errorMessage = new ErrorMessage("Login Error:","wrong password");
}

?>

<!-- Modal Structure -->
<div id="errorModal" class="modal bottom-sheet">
    <div class="modal-content">
        <h4><?php echo $errorMessage->getTitle();?></h4>
        <p></p><?php echo $errorMessage->getDescription();?></p>
    </div>
    <div class="modal-footer">
        <a href="#!" class=" modal-action modal-close waves-effect waves-green btn-flat">Ok</a>
    </div>
</div>





<?php
require_once 'phpListeners.php';
?>
