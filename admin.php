<?php
 
$uname = $_POST['uname'];
$pass = $_POST['pass'];

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "sgnup";

$con = new mysqli($host, $dbusername, $dbpassword, $dbname);
if($con->connect_error) {
    die("Failed to connect : ". $con->connect_error);
} else {
    $stmt = $con->prepare("SELECT * from `adminlog` where `uname` = ?");
    $stmt->bind_param("s",$uname);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if($data['pass'] === $pass){
            header('Location:admdash.html');
    } else {
        echo "<h2>Invalid username or Password</h2>";
    }
} else {
    echo "<h2>Invalid username or password</h2>";
}
}
?>