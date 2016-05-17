<?php
require_once 'Classes/reaction.php';
require_once 'Classes/message.php';

if(isset($_POST['saveReply'])) {
    $message = $_POST['message'];
    $messageId = $_POST['messageId'];

    $reaction = reaction::makeReaction($messageId,$message);
    $reaction->saveToDatabase();
   
    $URL = $_SESSION['homePageURL'];
    header('Location: '. $URL);
}

if(isset($_POST['saveNewsItem'])) {
    $title = $_POST['title'];
    $message = $_POST['message'];

    $newsItem = message::makeMessage($title,$message);
    $newsItem->saveToDatabase();
    
    $URL = $_SESSION['homePageURL'];
    header('Location: '. $URL);
}
?>