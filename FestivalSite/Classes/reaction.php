<?php

$currentDatetime = date('Y-m-d H:i:s');

class reaction{
    private $id;
    private $parentMessage;
    private $title;
    private $date;
    private $text;
    private $type;

    public static function makeReaction($parentMessage, $text)
    {
        global $currentDatetime;
        $reaction = new reaction(reaction::getLast()+1, $parentMessage, '', $currentDatetime, $text, 'reaction');
        return $reaction;
    }

    //Constructor
    public function __construct($id,$parentMessage, $title, $date, $text,$type) {
        $this->id = $id;
        $this->parentMessage = $parentMessage;
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

    public function getParentMessage() {
        return $this->parentMessage;
    }
    public function setParentMessage($parentMessage) {
        $this->parentMessage = $parentMessage;
    }


    

    //Database functions
    //-----------------------------------------------------------

    //Save
    public function saveToDatabase(){
        $conn = databaseManager::getConnection();
        $stmt = $conn->prepare("INSERT INTO reactions(id,parentMessage,title,date,text,type) values (?,?, ?, ?, ?,?)");
        if($stmt == false) die("querry error");
        $stmt->bind_param('isssss',$this->getId(), $this->parentMessage ,$this->getTitle(), $this->getDate(), $this->getText(), $this->type);
        $result = $stmt->execute();
    }

    //Delete
    public function deleteThisFromDatabase(){
    $conn = databaseManager::getConnection();
    $stmt = $conn->prepare("DELETE FROM reactions WHERE id = ?");
    $stmt->bind_param('i', $this->getId());
    $result = $stmt->execute();
}
    public static function deleteFromDatabase($id){
    $conn = databaseManager::getConnection();
    $stmt = $conn->prepare("DELETE FROM reactions WHERE id = ?");
    $stmt->bind_param('i', $id);
    $result = $stmt->execute();
}

    //Get All
    public function getAll(){
        $conn = databaseManager::getConnection();
        $reactionList = array();
        $query = "SELECT * FROM reactions";
        if ($stmt = mysqli_prepare($conn, $query)) {
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $id,$parentMessage, $title,$date,$text,$type);
            while (mysqli_stmt_fetch($stmt)) {
                $reaction = new reaction($id,$parentMessage, $title,$date,$text,$type);
                array_push($reactionList, $reaction);
            }
            mysqli_stmt_close($stmt);
        }
        return $reactionList;
    }

    //Get by ParrentMessage
    public function getByMessage($id){
        $conn = databaseManager::getConnection();
        $reactionList = array();
        $query = "SELECT * FROM reactions WHERE parentMessage = $id";
        if ($stmt = mysqli_prepare($conn, $query)) {
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $id,$parentMessage, $title,$date,$text,$type);
            while (mysqli_stmt_fetch($stmt)) {
                $reaction = new reaction($id,$parentMessage, $title,$date,$text,$type);
                array_push($reactionList, $reaction);
            }
            mysqli_stmt_close($stmt);
        }
        return $reactionList;
    }

    //get Last
    public static function getLast(){
        $conn = databaseManager::getConnection();
        $IdMax = 0;
        $query = "SELECT id FROM reactions WHERE id=(SELECT max(id) FROM reactions)";

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

    function __toString()
    {
        $array = array(
            'id' => $this->id,
            'parentMessage' => $this->parentMessage,
            'title' => $this->title,
            'date' => $this->date,
            'text'=> $this->text,
            'type' => $this->type
        );
        return json_encode($array);
    }


}

?>