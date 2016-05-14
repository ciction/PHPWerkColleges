<?php
require_once '../ConnectionDAO.php';
require_once '../Classes/newsItem.php';
require_once '../Design.html';

$colors = array("blue", "teal", "amber", "deep-orange", "orange","indigo", "blue-grey" );
$rand_color = array_rand($colors);


updateHtml();


function updateHtml(){

    //output
    echo '<div class="row">';
    $newsItems = newsItem::getAll();
    foreach($newsItems as $newsItem) {
       echo renderArtistData($newsItem->getId(),$newsItem->getTitle(),$newsItem->getDate(),$newsItem->getText());
    }
    echo '</div>';
}


function renderArtistData($id, $title, $date, $text){
    $html ='';
    return $html;
}

?>

<div class="row">
    <div class="col s12">
        <div class="card <?php echo $colors[($rand_color)]; ?>">
            <div class="card-content white-text">
                <span class="card-title">Card Title</span>
                <span class="align-right" style="text-align: right; width: 100%; display: inline-block; margin-top: -4%">date</span>
                <p>I am a very simple card. I am good at containing small bits of information.
                    I am convenient because I require little markup to use effectively.</p>
            </div>
            <div class="card-action">
            </div>
        </div>
    </div>




