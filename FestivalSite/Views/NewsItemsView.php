<?php
session_start();
require_once '../ConnectionDAO.php';
require_once '../Classes/user.php';
require_once '../Classes/message.php';
require_once '../Classes/reaction.php';
require_once '../loginModalController.php';

$currentUser->unserialize($_SESSION['user']);
$role = $currentUser->getRole();

$colors = array("blue", "teal", "amber", "deep-orange", "orange","indigo", "blue-grey" );
//$rand_color = array_rand($colors);
$currentColor = 0;


//$renderFirstTime = true;
//if(isset($_SESSION['htmlNews'])){
//    echo $_SESSION['htmlNews'];
//    $renderFirstTime = false;
//}

$allReactions = reaction::getAll();
updateHtml();

//foreach($allReactions as $reaction) {
//    if($reaction->getParentMessage() == 1){
//        echo renderReactionData($reaction->getId(),$reaction->getTitle(),$reaction->getDate(),$reaction->getText(),$currentColor);
//    }
//
//}
?>


<?php

function updateHtml(){
    global $renderFirstTime;
    global $colors;
    global $currentColor;
    global $allReactions;
    //output
    $messages = message::getAll();


    $html = '';
    foreach($messages as $message) {
        $html = $html . renderMessageData($message->getId(),$message->getTitle(),$message->getDate(),$message->getText());
        $html = $html . renderReplyButton($message->getId());
        ++$currentColor;
        if($currentColor >= count($colors)){$currentColor = 0;};
    }
//    $_SESSION['htmlNews'] = $html;

//    if($renderFirstTime == true) {
//        echo $html;
//    }
    echo $html;

}


function renderMessageData($id, $title, $date, $text){
    global $colors;
    global $currentColor;
    global $allReactions;

    $html =
        '<div class="row">
            <div class="col s12">
                <div class="card '.$colors[($currentColor)].' darken-2">
                    <div class="card-content white-text">
                        <span class="card-title">'.$title.'</span>
                        <span class="align-right hide-on-small-and-down" style="text-align: right; width: 100%; display: inline-block; margin-top: -4%">'.$date.'</span>
                         <p>'.$text.'</p>
                    </div>
                    <div class="card-action">
                    </div>
                </div>
        </div>';


//    $reactions = reaction::getByMessage($id);
    foreach($allReactions as $reaction) {
        if($reaction->getParentMessage() == $id){
            $html = $html . renderReactionData($reaction->getId(),$reaction->getTitle(),$reaction->getDate(),$reaction->getText(),$currentColor);
        }
    }
    $html = $html .'</div>';
    return $html;
}

function renderReactionData($id, $title, $date, $text, $currentColor){
    global $colors;
    $html =
        '
            <div class="col s11 offset-s1">
                <div class="card '.$colors[($currentColor)].'">
                    <div class="card-content white-text" style="height:inherit;">
                        <span class="align-right /*hide-on-small-and-down*/" style="text-align: right; width: 100%; display: inline-block;/* margin-top: -4%*/">'.$date.'</span>
                         <p>'.$text.'</p>
                    </div>
                </div>
        </div>';
    return $html;
}


function renderReplyButton($id){
    global $colors;
    global $currentColor;
    global $role;
    

    $html = '';
    if($role != 'visitor') {
        $html = '
            <form action="index.php" method="post">
                <div style="width: 100%; text-align: right;">
                    <input type="hidden" name="messageId"  value="'.$id.'">
                    <a class="waves-effect waves-light btn modal-trigger '.$colors[($currentColor)].'" href="#ReactionModal" name="replyBtn" id="'.$id.'" onclick="setModalIdValue(this.id);"><i class="material-icons left" style="margin-right:24px;">reply</i>Reply</a>
                </div>
            </form>';
    }

    return $html;
}

if($role == 'SuperUser' || $role == 'admin'){
    echo('
    <form>
        <div style="width: 100%; text-align: right;">
            <input type="hidden">
            <a type="submit" class="btn-floating btn-large waves-effect waves-light red modal-trigger" href="#NewsItemModal" style="margin-right:24px;"><i class="material-icons">sms</i></a>
        </div>
    </form>
    ');
}
?>


<!--<a  name="reply" class="waves-effect waves-light btn modal-trigger '.$colors[($currentColor)].'" href="#ReactionModal"><i class="material-icons left" style="margin-right:24px;">reply</i>Reply</a>-->

<script>
    $(document).ready(function(){
//        $('.modal-trigger').leanModal();
        $('.modal-trigger').leanModal({
                dismissible: true, // Modal can be dismissed by clicking outside of the modal
                opacity: .5, // Opacity of modal background
                in_duration: 300, // Transition in duration
                out_duration: 200, // Transition out duration
                ready: function() { updatemodal();}, // Callback for Modal open
                complete: function() {} // Callback for Modal close
            }
        );
    });


    $(".pauseAjax").click(function() {
        pause();
    });

</script>

<!--<script src="Design/index.js"></script>-->
