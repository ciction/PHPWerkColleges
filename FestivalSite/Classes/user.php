<?php


class user 
{
    private $id;
    private $login;
    private $password;
    private $role;

    private $array;


    //  Constructor
    //-----------------------------------------------------------
    public static function makeVisitor()
    {
        $user = new user(0, 'visitor', '', 'visitor');

        return $user;
    }

    public function __construct($id, $login, $password, $role)
    {
        $this->id = $id;
        $this->login = $login;
        $this->password = $password;
        $this->role = $role;
    }


    //Getters & Setters
    //-----------------------------------------------------------

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function setLogin($login)
    {
        $this->login = $login;
        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }


    //Database functions
    //-----------------------------------------------------------

    //Save
    public function saveToDatabase()
    {
        $conn = databaseManager::getConnection();
        $stmt = $conn->prepare("INSERT INTO users(id,login,password,role) values (?, ?, ?, ?)");
        if ($stmt == false) die("querry error");
        $stmt->bind_param('ssss', $this->getId(), $this->getLogin(), $this->getPassword(), $this->getRole());
        $result = $stmt->execute();
    }

    //Get All
    //return user list
    public function getAll()
    {
        $conn = databaseManager::getConnection();
        $userlist = array();
        $query = "SELECT * FROM users";
        if ($stmt = mysqli_prepare($conn, $query)) {
            mysqli_stmt_execute($stmt);
            mysqli_stmt_bind_result($stmt, $id, $login, $password, $role);
            while (mysqli_stmt_fetch($stmt)) {
                $user = new artist($id, $login, $password, $role);
                array_push($userlist, $user);
            }
            mysqli_stmt_close($stmt);
        }
        return $userlist;
    }

    //get by name
    public static function getUserByLogin($login)
    {
        $conn = databaseManager::getConnection();
        if ($stmt = $conn->prepare("SELECT * FROM users WHERE login = ?")) {
            $stmt->bind_param("s", $login);
            $stmt->execute();
            $stmt->store_result();

            if ($stmt->num_rows() <= 0) {
                return false;
            }

            $stmt->bind_result($id, $login, $password, $role);
            $stmt->fetch();
            $user = new user($id, $login, $password, $role);
            $stmt->close();
        }
        return $user;
    }

    //get Last
    public static function getLast()
    {
        $conn = databaseManager::getConnection();
        $IdMax = 0;
        $query = "SELECT id FROM users WHERE id=(SELECT max(id) FROM users)";

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

    public function serialize()
    {
        $array = array(
            'id' => $this->id,
            'login' => $this->login,
            'password' => $this->password,
            'role' => $this->role,
        );
        return $array;
    }

    public function unserialize($other)
    {
        $this->setId($other['id']);
        $this->setLogin($other['login']);
        $this->setPassword($other['password']);
        $this->setRole($other['role']);
    }

    function __toString()
    {
        $array = array(
            'id' => $this->id,
            'login' => $this->login,
            'password' => $this->password,
            'role' => $this->role,
        );
       return json_encode($array);
    }


}
?>