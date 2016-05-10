<?php

require_once "../ConnectionDAO.php";

class artist {
    private $id;
    private $name;
    private $description;
    private $imageURL;
    private $beginTime;
    private $endTime;

    //  Constructor
    //-----------------------------------------------------------

    function __construct($id,$name,$description,$imageURL,$beginTime,$endTime)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->imageURL = $imageURL;
        $this->beginTime = $beginTime;
        $this->endTime = $endTime;
    }

    //Getters & Setters
    //-----------------------------------------------------------

    //ID
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    //Name
    public function getName()
    {
        return $this->name;
    }
    public function setName($name)
    {
        $this->name = $name;
    }

    //Description
    public function getDescription()
    {
        return $this->description;
    }
    public function setDescription($description)
    {
        $this->description = $description;
    }

    //ImageUrl
    public function getImageURL()
    {
        return $this->imageURL;
    }
    public function setImageURL($imageURL)
    {
        $this->imageURL = $imageURL;
    }

    //BeginTime
    public function getBeginTime()
    {
        return $this->beginTime;
    }
    public function setBeginTime($beginTime)
    {
        $this->beginTime = $beginTime;
    }

    //endTime
    public function getEndTime()
    {
        return $this->endTime;
    }
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;
    }

    //Database functions
    //-----------------------------------------------------------

    //Save
    public function saveToDatabase(){
        $conn = databaseManager::getConnection();
        $stmt = $conn->prepare("INSERT INTO artist(name,description,imageURL,beginTime,endTime) values (?, ?, ?, ?)");
        $stmt->bind_param($this->getName(), $this->getDescription(), $this->getImageURL(), $this->getBeginTime(),$this->getEndTime());
        $result = $stmt->execute();
    }

    //Get All
    public function getAll(){
        $conn = databaseManager::getConnection();
        $artistList = array();
        $query = "SELECT * FROM artists";
        if ($stmt = mysqli_prepare($conn, $query)) {
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $id, $name, $description, $imageURL, $beginTime, $endTime);
            while (mysqli_stmt_fetch($stmt)) {
                $artist = new artist($id, $name, $description, $imageURL, $beginTime, $endTime);
                array_push($artistList, $artist);
            }
            mysqli_stmt_close($stmt);
        }
        return $artistList;
    }

    //get Last
    public static function getLast(){
        $conn = databaseManager::getConnection();
        $IdMax = 0;
        $query = "SELECT id FROM artists WHERE id=(SELECT max(id) FROM artists)";

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