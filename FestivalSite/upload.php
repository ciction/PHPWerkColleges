<?php
session_start();
require_once 'ConnectionDAO.php';
require_once 'Classes/artist.php';

$imgExtension = '';

//todo generate random filename already exists mag niet gebeuren
if(isset($_FILES["file"]["type"]))
{
    $path = "images/artists/";
    $validextensions = array("jpeg", "jpg", "png");
    $temporary = explode(".", $_FILES["file"]["name"]);
    $file_extension = end($temporary);
    if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
        ) && ($_FILES["file"]["size"] < 600000)//Approx. 600kb files can be uploaded.
        && in_array($file_extension, $validextensions)) {
        if ($_FILES["file"]["error"] > 0)
        {
           echo "Return Code: " . $_FILES["file"]["error"] . "<br/><br/>";
        }
        else
        {
//            if (file_exists($path. $_FILES["file"]["name"])) {
//                echo $_FILES["file"]["name"] . " <span id='invalid'><b>already exists.</b></span> ";
//                die("already exist");
//            }
//            else
            {
                if($_FILES["file"]["type"] == "image/png") $imgExtension = '.png';
                if($_FILES["file"]["type"] == "image/jpg" || $_FILES["file"]["type"] == "image/jpeg") $imgExtension = '.jpg';


                $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
                $newImageName = 'artistImage' . (artist::getLast() + 1);
                $targetPath = $path. $newImageName.$imgExtension;/*$_FILES['file']['name'];*/ // Target path where file is to be stored
                move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
//                echo "<span id='success'>Image Uploaded Successfully...!!</span><br/>";
//                echo "<br/><b>File Name:</b> " . $_FILES["file"]["name"] . "<br>";
//                echo "<b>Type:</b> " . $_FILES["file"]["type"] . "<br>";
//                echo "<b>Size:</b> " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
//                echo "<b>Temp file:</b> " . $_FILES["file"]["tmp_name"] . "<br>";


                $fields = array('name', 'description', 'file', 'dateInput', 'beginTime', 'endTime');

                if(isset($_POST['addArtist'])){
                    $error = false; //No errors yet

                    foreach($fields AS $fieldName) { //Loop trough each field
                        if(!isset($_POST[$fieldName]) || empty($_POST[$fieldName])) {
                            echo 'Field '.$fieldName.' misses!<br />'; //Display error with field
                            $error = true; //Yup there are errors
                        }
                        else{
                            $fieldName = test_input($fieldName);
                        }
                    }
                    //($id,$name,$description,$imageURL,$beginTime,$endTime)
                    $artiest = new artist()
                    $artiest->saveToDatabase();
                    if(!$error) { //Only create queries when no error occurs
//Create queries....
                    }
                }



                function test_input($data) {
                    $data = trim($data);
//    $data = stripslashes($data);
                    $data = htmlspecialchars($data);
                    return $data;
                }


            }
        }
    }
    else
    {
        $URL = $_SESSION['homePageURL'] .'?InvalidIMG';
        header('Location: '. $URL);
    }
}


?>