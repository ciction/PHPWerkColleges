<?php

abstract class TicketType
{
    const adultTicket = "adultTicket";
    const juniorTicket = "juniorTicket";
    const seniorTicket = "seniorTicket";
    // etc.
}

class Ticket{
    private $id;
    private $type;
    private $owner;

   public static $seniorPrice = 40;
   public static $seniorCount = 1000;
   public static $juniorPrice = 35;
   public static $juniorCount = 1000;
   public static $adultPrice = 50;
   public static $adultCount = 1000;

    public static function updateStaticTicketCount($type){
        switch ($type){
            case TicketType::adultTicket: -- self::$adultCount;
                break;
            case TicketType::juniorTicket: -- self::$juniorCount;
                break;
            case TicketType::seniorTicket: -- self::$seniorCount;
                break;
        }
    }

    public static function updatePrice($id){
        $conn = databaseManager::getConnection();
        $stmt = $conn->prepare("SELECT price FROM tickets WHERE id = ?");
        $stmt->bind_param('s', $id);

        $retrunPrice = 0;

        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $price);
        while (mysqli_stmt_fetch($stmt)) {
            $retrunPrice = $price;
        }
        mysqli_stmt_close($stmt);


        return $retrunPrice;
    }

    public static function updatePrices(){
        self::$seniorPrice = self::updatePrice(TicketType::seniorTicket);
        self::$juniorPrice = self::updatePrice(TicketType::juniorTicket);
        self::$adultPrice = self::updatePrice(TicketType::adultTicket);
    }



    public static function makeTicket($type,$owner)
    {
        $ticket = new Ticket(Ticket::getLast()+1, $type, $owner);
        return $ticket;
    }

    //Constructor
    public function __construct($id, $type, $owner) {
           $this->id = $id;
        $this->type = $type;
        $this->owner = $owner;

    }


    //Getters & Setters
    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }

    public function getType() {
        return $this->type;
    }
    public function setType($type) {
        $this->type = $type;
    }

    public function getOwner() {
        return $this->owner;
    }
    public function setOwner($owner) {
        $this->owner = $owner;
    }




    //Database functions
    //-----------------------------------------------------------

    //Save
    public function saveToDatabase(){
        $conn = databaseManager::getConnection();
        $stmt = $conn->prepare("INSERT INTO boughttickets(id,type,owner) values (?,?,?)");
        if($stmt == false) die("querry error");
        $stmt->bind_param('isi',$this->getId(), $this->getType() ,$this->getOwner());
        $result = $stmt->execute();

        mysqli_stmt_close($stmt);
        self::updateStaticTicketCount($this->getType());
    }

    public static function saveAllToDatabase($ticketArray){
        $conn = databaseManager::getConnection();
        $stmt = $conn->prepare("INSERT INTO boughttickets(id,type,owner) values (?,?,?)");
        if($stmt == false) die("querry error");
        $stmt->bind_param('isi', $id, $type, $owner);

        foreach ($ticketArray as $ticket){
            $id = $ticket->getId();
            $type = $ticket->getType();
            $owner = $ticket->getOwner();
            $stmt->execute();
            self::updateStaticTicketCount($type);
        }

        $stmt->close();
        $conn->close();
    }

    //Delete
    public function deleteThisFromDatabase(){
    $conn = databaseManager::getConnection();
    $stmt = $conn->prepare("DELETE FROM boughttickets WHERE id = ?");
    $stmt->bind_param('i', $this->getId());
    $result = $stmt->execute();
}
    public static function deleteFromDatabase($id){
    $conn = databaseManager::getConnection();
    $stmt = $conn->prepare("DELETE FROM boughttickets WHERE id = ?");
    $stmt->bind_param('i', $id);
    $result = $stmt->execute();
}

    //Get All
    public static function getAll(){
        $conn = databaseManager::getConnection();
        $ticketList = array();
        $query = "SELECT * FROM boughttickets";
        if ($stmt = mysqli_prepare($conn, $query)) {
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $id,$type, $owner);
            while (mysqli_stmt_fetch($stmt)) {
                $ticket = new reaction( $id,$type, $owner);
                array_push($ticketList, $ticket);
            }
            mysqli_stmt_close($stmt);
        }
        return $ticketList;
    }

    //Get by Owner
    public static function getByOwner($owner){
        $conn = databaseManager::getConnection();
        $ticketList = array();
        $query = "SELECT * FROM boughttickets WHERE owner = $owner";
        if ($stmt = mysqli_prepare($conn, $query)) {
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $id,$type, $owner);
            while (mysqli_stmt_fetch($stmt)) {
                $ticket = new reaction($id,$type, $owner);
                array_push($ticketList, $ticket);
            }
            mysqli_stmt_close($stmt);
        }
        return $ticketList;
    }

    //Get totalPriceForOwner
//    public static function getTotalPrice($owner){
//        $conn = databaseManager::getConnection();
//        $ticketList = array();
//        $query = "SELECT price FROM boughttickets WHERE owner = $owner";
//
//        if ($stmt = mysqli_prepare($conn, $query)) {
//            mysqli_stmt_execute($stmt);
//            mysqli_stmt_bind_result($stmt, $id,$type, $owner);
//            while (mysqli_stmt_fetch($stmt)) {
//                $ticket = new reaction($id, $type, $owner);
//                array_push($ticketList, $ticket);
//            }
//            mysqli_stmt_close($stmt);
//        }
//    }

    //get Last
    public static function getLast(){
        $conn = databaseManager::getConnection();
        $IdMax = 0;
        $query = "SELECT id FROM boughttickets WHERE id=(SELECT max(id) FROM boughttickets)";

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

    public static function pullSyncTicketInfo(){
        $conn = databaseManager::getConnection();
        $query = "SELECT * From tickets";


        if ($stmt = mysqli_prepare($conn, $query)) {
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $id, $count, $price);
            while (mysqli_stmt_fetch($stmt)) {
                switch ($id){
                    case TicketType::adultTicket:
                        self::$adultCount = $count;
                        self::$adultPrice = $price;
                        break;
                    case TicketType::juniorTicket:
                        self::$juniorCount = $count;
                        self::$juniorPrice = $price;
                        break;
                    case TicketType::seniorTicket:
                        self::$seniorCount = $count;
                        self::$seniorPrice = $price;
                        break;
                }
            }
        }
            mysqli_stmt_close($stmt);
    }

    public static function pushSyncTicketCount(){
        $conn = databaseManager::getConnection();

        $count ='';
        $id ='';
        $query =  $conn->prepare("UPDATE tickets SET count=? WHERE id=?");
        if($query == false) die("querry error");
        $query->bind_param('is', $count, $id);

        $count = self::$juniorCount;
        $id = TicketType::juniorTicket;
        $query->execute();

        $count = self::$adultCount;
        $id = TicketType::adultTicket;
        $query->execute();

        $count = self::$seniorCount;
        $id = TicketType::seniorTicket;
        $query->execute();
    }







function __toString()
    {
        $array = array(
            'id' => $this->id,
            'type' => $this->type,
            'owner' => $this->owner,
        );
        return json_encode($array);
    }



}

?>