<?php
/**
 * Created by PhpStorm.
 * User: ayeshjayasekara1
 * Date: 5/4/17
 * Time: 9:03 PM
 */

//Change this according to your configuration
$servername = "localhost"; 
$username = "root";
$password = ""; 
$dbname = "user_login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//Just for testing... delete when you are done with implementation (line 20 to 32)
$sql = "SELECT * FROM users";
$result = $conn->query($sql);


if ($result->num_rows) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        //echo "Username: " . $row["username"]. " - Password: " . $row["password"].  "<br>";
    }
} else {
    //echo "0 results";
}

//POST method username and password verifiying 
$username = $_POST['username'];
$password = $_POST['password'];
$result = mysqli_query($conn,"SELECT * FROM users where username='$username' and password='$password'");
$row = mysqli_fetch_array($result);
$data = $row[0]; //usernname
$data2 = $row[1]; //password
$data3 = $row[2]; //just a column in the table
$data4 = $row[3]; // another column in the table

if($data){//print 3rd coulum and fourth one seperated by '!' symbol
    echo $data3; 
    echo "!";
    echo $data4;
}






$conn->close();


?>