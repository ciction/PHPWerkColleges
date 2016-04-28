<?php
/**
 * Created by PhpStorm.
 * User: Christophe
 * Date: 4/21/2016
 * Time: 5:25 PM
 */


$servername = "dt5.ehb.be";
$dbname = "AWD084";
$username = "AWD084";
$password = "35164279";



function getConnection(){
    global $servername;
    global $username;
    global $password;
    global $dbname;


    //create connection
    try{
        $conn = new mysqli($servername, $username, $password, $dbname);
    }
    catch (Exception $e){
    }


    //Check connection
    if(isset($conn)){
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        else{
            echo "Connected successfully";
        }



        return $conn;
    }
    else return 0;
}

?>