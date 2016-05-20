<?php
//session_start();
require_once '../ConnectionDAO.php';
require_once '../Classes/artist.php';



if(isset($_POST['removeArtist'])) {
    die('delete');
    artist::deleteFromDatabase($_POST['artistID']);
}


//$renderFirstTime = true;
//if(isset($_SESSION['htmlArtists'])){
//    echo $_SESSION['htmlArtists'];
//    $renderFirstTime = false;
//}
updateHtml();


function updateHtml(){
    global $renderFirstTime;

    //output
    $html = '<div class="row">';
//    $_SESSION['htmlArtists'] =  $html;
    $artists = artist::getAll();
    foreach($artists as $artist) {
//        $_SESSION['htmlArtists'] = $_SESSION['htmlArtists'] . renderArtistData($artist->getId(),$artist->getName(),$artist->getDescription(),$artist->getImageURL(),$artist->getBeginTime(),$artist->getEndTime());
        $html = $html . renderArtistData($artist->getId(),$artist->getName(),$artist->getDescription(),$artist->getImageURL(),$artist->getBeginTime(),$artist->getEndTime());
    }

    $html = $html . '</div>';
//    $_SESSION['htmlArtists'] = $_SESSION['htmlArtists'] .  $html;

//    if($renderFirstTime == true) {
//        echo $_SESSION['htmlArtists'];
//    }
    echo $html;
}


function renderArtistData($id, $name,$description,$image,$beginTime,$endTime){
    $beginTime = date('g:ia', strtotime($beginTime));
    $endTime = date('g:ia', strtotime($endTime));
    $timerange = $beginTime . ' - '. $endTime ;
    $image = 'images/artists/'.$image;

    $html = '<div class="col s12 m4 l3 offset-m0">' .
    '<div class="card artist">
        <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="'.$image.'" style="height:200px;width: inherit;max-width: 100%;max-height: 100%;">
        </div>
        <div class="card-content">
            <span class="card-title activator grey-text text-darken-4">' . $name . '<i class="material-icons right">more_vert</i></span>
            <p class="time">'. $timerange .'</p>
            <form method="post">
                <input type="hidden" value="'.$id.'" name="artistID">
                <input type="submit" value="remove" name="removeArtist" class="modal-action waves-effect waves-green btn">
            </form>
        </div>
        <div class="card-reveal">
            <span class="card-title grey-text text-darken-4">' . $name . '<i class="material-icons right">close</i></span>
            <p>'. $description .'</p>
        </div>

    </div>' .
    '</div>';
    return $html;
}

?>



