<?php
include_once 'ConnectionDAO.php';

$result = getConnection()->query("SELECT login FROM users");
if($result->num_rows > 0){
    while ($row = $result->fetch_assoc()){
        echo ($row['login']);
        echo ('<br>');
    }
}
?>