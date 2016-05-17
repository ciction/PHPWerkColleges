<?php

$currentDatetime = date('Y-m-d H:i:s');

class message{
    private $id;
    private $title;
    private $date;
    private $text;
    private $type;

    //Constructor

    public static function makeMessage($title, $text)
    {
        global $currentDatetime;
        $newsItem = new message(message::getLast()+1, $title, $currentDatetime, $text, 'newsItem');
        return $newsItem;
    }


    public function __construct($id, $title, $date, $text,$type) {
        $this->id = $id;
        $this->title = $title;
        $this->date = $date;
        $this->text = $text;
        $this->type = $type;
    }
    
    //Getters & Setters
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    
    public function getTitle() {
        return $this->title;
    }
    public function setTitle($title) {
        $this->title = $title;
    }
    
    public function getDate() {
        return $this->date;
    }
    
    public function setDate($date) {
        $this->date = $date;
    }
    
    public function getText() {
        return $this->text;
    }
    public function setText($text) {
        $this->text = $text;
    }

    public function getType() {
        return $this->type;
    }
    public function setType($type) {
        $this->type = $type;
    }
    
    

    //Database functions
    //-----------------------------------------------------------

    //Save
    public function saveToDatabase(){
        $conn = databaseManager::getConnection();
        $stmt = $conn->prepare("INSERT INTO messages(id,title,date,text) values (?, ?, ?, ?)");
        if($stmt == false) die("querry error");
        $stmt->bind_param('isss',$this->getId(), $this->getTitle(), $this->getDate(), $this->getText());
        $result = $stmt->execute();
    }

    //Delete
    public function deleteThisFromDatabase(){
    $conn = databaseManager::getConnection();
    $stmt = $conn->prepare("DELETE FROM messages WHERE id = ?");
    $stmt->bind_param('i', $this->getId());
    $result = $stmt->execute();
}
    public static function deleteFromDatabase($id){
    $conn = databaseManager::getConnection();
    $stmt = $conn->prepare("DELETE FROM messages WHERE id = ?");
    $stmt->bind_param('i', $id);
    $result = $stmt->execute();
}

    //Get All
    public function getAll(){

        $conn = databaseManager::getConnection();
        $messageList = array();
        $query = "SELECT * FROM messages";
        if ($stmt = mysqli_prepare($conn, $query)) {
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $id, $title,$date,$text,$type);
            while (mysqli_stmt_fetch($stmt)) {
                $message = new message($id, $title,$date,$text,$type);
                array_push($messageList, $message);
            }
            mysqli_stmt_close($stmt);
        }
        return $messageList;

    }

    //get Last
    public static function getLast(){
        $conn = databaseManager::getConnection();
        $IdMax = 0;
        $query = "SELECT id FROM messages WHERE id=(SELECT max(id) FROM messages)";

        if ($stmt = mysqli_prepare($conn, $query)) {
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $id);
            while (mysqli_stmt_fetch($stmt)) {
                $IdMax = $id;
            }
            mysqli_stmt_close($stmt);
        }
        return $IdMax;
    
    }



}

?>