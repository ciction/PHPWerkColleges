$servername = "dt5.ehb.be/phpmyadmin/";
$dbname = "AWD084";
$username = "AWD084";
$password = "35164279";



function createConnection(){
    global $servername;
    global $username;
    global $password;
    global $dbname;

// Create connection
	error_reporting(E_ERROR | E_PARSE);
    try{
        $conn = new mysqli($servername, $username, $password, $dbname);
    }catch (Exception $e){}

	
	  return $conn;
}


unction createDatabase(){
    $conn = createConnection();

    $sql = "CREATE DATABASE message_wall";
    if ($conn->query($sql) === TRUE) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . $conn->error;
    }

    $conn->close();
}
