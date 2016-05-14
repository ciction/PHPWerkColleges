<?php

class newsItem{
    private $id;
    private $title;
    private $date;
    private $text;

    //Constructor
    public function __construct($id, $title, $date, $text) {
        $this->id = $id;
        $this->title = $title;
        $this->date = $date;
        $this->text = $text;
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
    
    

    //Database functions
    //-----------------------------------------------------------

    //Save
    public function saveToDatabase(){
        $conn = databaseManager::getConnection();
        $stmt = $conn->prepare("INSERT INTO newsitems(id,title,date,text) values (?, ?, ?, ?)");
        if($stmt == false) die("querry error");
        $stmt->bind_param('issss',$this->getId(), $this->getTitle(), $this->getDate(), $this->getText());
        $result = $stmt->execute();
    }

    //Delete
    public function deleteThisFromDatabase(){
    $conn = databaseManager::getConnection();
    $stmt = $conn->prepare("DELETE FROM newsitems WHERE id = ?");
    $stmt->bind_param('i', $this->getId());
    $result = $stmt->execute();
}
    public static function deleteFromDatabase($id){
    $conn = databaseManager::getConnection();
    $stmt = $conn->prepare("DELETE FROM newsitems WHERE id = ?");
    $stmt->bind_param('i', $id);
    $result = $stmt->execute();
}

    //Get All
    public function getAll(){
        $conn = databaseManager::getConnection();
        $newsItemList = array();
        $query = "SELECT * FROM newsitems";
        if ($stmt = mysqli_prepare($conn, $query)) {
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $id, $title,$date,$text);
            while (mysqli_stmt_fetch($stmt)) {
                $newsItem = new newsItem($id, $title,$date,$text);
                array_push($newsItemList, $newsItem);
            }
            mysqli_stmt_close($stmt);
        }
        return $newsItemList;
    }

    //get Last
    public static function getLast(){
        $conn = databaseManager::getConnection();
        $IdMax = 0;
        $query = "SELECT id FROM newsitems WHERE id=(SELECT max(id) FROM newsitems)";

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