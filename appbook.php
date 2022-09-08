<?php
 
$petid = $_POST['petid'];
$dater = date('Y-m-d');
$symptom = $_POST['symptom'];

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "apptm";

$con = new mysqli($host, $dbusername, $dbpassword, $dbname);
if($con->connect_error) {
    die("Failed to connect : ". $con->connect_error);
} else {
    $stmt = $con->prepare("SELECT petid from `dappoint` where `petid` = ?");
    $stmt->bind_param("s",$petid);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0) {
        $data = $stmt_result->fetch_assoc();
        if($data['petid'] === $petid){
    echo "<h2>Your Appointment has been booked. You will get a call from clinic regarding timeslot,fees and clinic address.</h2>";
    $stmt = $con->prepare("INSERT Into `bappt` (petid,dater,symptom) values(?,?,?)");
    $stmt->bind_param("sss",$petid,$dater,$symptom);
}
}
}
?>