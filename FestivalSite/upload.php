<?php
require_once 'ConnectionDAO.php';
require_once 'Classes/artist.php';
require_once 'Classes/user.php';


$imgExtension = '';
//todo generate random filename already exists mag niet gebeuren
if(isset($_FILES["file"]["type"]) && ($role == 'SuperUser' || $role == 'admin'))
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
            {
                if($_FILES["file"]["type"] == "image/png") $imgExtension = '.png';
                if($_FILES["file"]["type"] == "image/jpg" || $_FILES["file"]["type"] == "image/jpeg") $imgExtension = '.jpg';

                $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
                $newImageName = 'artistImage' . (artist::getLast() + 1);
                $targetPath = $path. $newImageName.$imgExtension;/*$_FILES['file']['name'];*/ // Target path where file is to be stored
                move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file

                $id = artist::getLast() + 1;
                $artist = new artist($id,$_POST['name'],$_POST['description'],$newImageName.$imgExtension,$_POST['beginTime'],$_POST['endTime']);
                $artist->saveToDatabase();

                unset ($_FILES["file"]);
                $URL = $_SESSION['homePageURL'];
                header('Location: '. $URL);

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