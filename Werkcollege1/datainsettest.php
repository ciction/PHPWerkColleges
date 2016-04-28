<?php
/**
 * Created by PhpStorm.
 * User: Christophe
 * Date: 4/21/2016
 * Time: 5:32 PM
 */

include_once '../ConnectionDAO.php';
include_once '../General.php';


function loadUsers(){
    $sql = "SELECT * FROM Overview";
    $result = getConnection()->query($sql);

    echo('<br>');
    echo($sql);
    echo('<br>');


    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            addToMessage($row['Name']);
            addToMessage('<br>');
        }
        printMessage();

    }

    getConnection()->close();
}


?>


