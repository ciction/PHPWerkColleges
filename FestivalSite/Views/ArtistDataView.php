<?php
session_start();
require_once '../ConnectionDAO.php';
require_once '../Classes/artist.php';

$renderFirstTime = true;
if(isset($_SESSION['html'])){
    echo $_SESSION['html'];
    $renderFirstTime = false;
}
updateHtml();


function updateHtml(){
    global $renderFirstTime;

    //output
    $html = '<div class="row">';
    $_SESSION['html'] =  $html;
    $artists = artist::getAll();
    foreach($artists as $artist) {
        $_SESSION['html'] = $_SESSION['html'] . renderArtistData($artist->getName(),$artist->getDescription(),$artist->getImageURL(),$artist->getBeginTime(),$artist->getEndTime());
    }

    $html = '</div>';
    $_SESSION['html'] = $_SESSION['html'] .  $html;

    if($renderFirstTime == true) {
        echo $_SESSION['html'];
    }
}


function renderArtistData($name,$description,$image,$beginTime,$endTime){
    $beginTime = date('g:ia', strtotime($beginTime));
    $endTime = date('g:ia', strtotime($endTime));
    $timerange = $beginTime . ' - '. $endTime ;
    $image = 'images/artists/'.$image;

    $html = '<div class="col s12 m4 l3 offset-m0">' .
    '<div class="card artist">
        <div class="card-image waves-effect waves-block waves-light">
            <img class="activator" src="'.$image.'">
        </div>
        <div class="card-content">
            <span class="card-title activator grey-text text-darken-4">' . $name . '<i class="material-icons right">more_vert</i></span>
            <p class="time">'. $timerange .'</p>
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

