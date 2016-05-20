<?php
require_once 'Classes/error.php';
$errorMessage = new ErrorMessage();

if(isset($_GET["InvalidIMG"])) {
    $errorMessage = new ErrorMessage("<i class=\"material-icons\">error</i> Image Error:","Invalid file Size or Type <br> The image should be jpeg/jpg/png smaller then 600kb try again");
}
if(isset($_GET["InvalidLogin"])) {
        $errorMessage = new ErrorMessage("<i class=\"material-icons\">error</i> Login Error:","This login does not exist");
}
if(isset($_GET["WrongPassword"])) {
    $errorMessage = new ErrorMessage("<i class=\"material-icons\">error</i> Login Error:","wrong password");
}
if(isset($_GET["userAlreadyExists"])) {
    $errorMessage = new ErrorMessage("<i class=\"material-icons\">error</i> Register Error:","sorry this username already exists.");
}
if(isset($_GET["userExists"])) {
    $errorMessage = new ErrorMessage("<i class=\"material-icons\">error</i> Register Error:","sorry this username already exists.");
}
if(isset($_GET["RegisterOk"])) {
    $errorMessage = new ErrorMessage("<i class=\"material-icons\">tag_faces</i> Registerd:","Your useraccount was succesfully created.");
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
