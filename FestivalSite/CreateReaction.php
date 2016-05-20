<?php
require_once 'Classes/reaction.php';
require_once 'Classes/message.php';

if(isset($_POST['saveReply'])) {
    $message = AntiXSS::setFilter($_POST['message'], "whitelist", "string",1);
    $messageId = AntiXSS::setFilter($_POST['messageId'], "whitelist", "string",1);

    $reaction = reaction::makeReaction($messageId,$message);
    $reaction->saveToDatabase();
   
    $URL = $_SESSION['homePageURL'];
    header('Location: '. $URL);
}

if(isset($_POST['saveNewsItem'])) {
    $title = AntiXSS::setFilter($_POST['title'], "whitelist", "string",1);
    $message = AntiXSS::setFilter($_POST['message'], "whitelist", "string",1);


    $newsItem = message::makeMessage($title,$message);
    $newsItem->saveToDatabase();
    
    $URL = $_SESSION['homePageURL'];
    header('Location: '. $URL);
}
?>