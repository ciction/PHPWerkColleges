<!-- Modal Structure -->
<?php
require_once 'Classes/user.php';
//$role = "visitor";
$currentUser = user::makeVisitor();
if(!isset($_SESSION['user']) ||  empty($_SESSION['user'])){
        $currentUser = user::makeVisitor();
//        $role = $currentUser->getRole();
        $_SESSION['user'] = $currentUser->serialize();

    }



if(isset($_POST['loginBtn'])) {
    if( user::getUserByLogin($_POST['userName']) == false){
        $_SESSION['user'] = $currentUser->serialize();
//        $role = $currentUser->getRole();
        $URL = $_SESSION['homePageURL'] .'?InvalidLogin';
        header('Location: '. $URL);
    }
    else{
        //check password
        $attemptingUser = user::getUserByLogin($_POST['userName']);
        if($attemptingUser->getPassword() == $_POST['password']){
            $currentUser = $attemptingUser;
            $_SESSION['user'] = $currentUser->serialize();
//            $role = $currentUser->getRole();
            $URL = $_SESSION['homePageURL'];
            header('Location: '. $URL);
        }
        else{
            $URL = $_SESSION['homePageURL'] .'?WrongPassword';
            header('Location: '. $URL);

        }

    }
}

if(isset($_POST['logoutBtn'])) {
    unset($_SESSION['user']);
    $currentUser = user::makeVisitor();
//    $role = $currentUser->getRole();
    $URL = $_SESSION['homePageURL'];
    header('Location: '. $URL);
}

if(isset($_SESSION['user'])) {
    $currentUser = user::makeVisitor();
    $currentUser->unserialize($_SESSION['user']);

}

if($currentUser->getId() == 0) {
    include "Views/loginView.html";
}
else {
    include "Views/logoutView.html";
    }
$role = $currentUser->getRole();
?>

