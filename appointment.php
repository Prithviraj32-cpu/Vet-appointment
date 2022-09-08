<?php
 
$fname = $_POST['fname'];
$petage = $_POST['petage'];
$pettype = $_POST['pettype'];
$petbreed = $_POST['petbreed'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$addres = $_POST['addres'];
$pincode = $_POST['pincode'];
$petid = uniqid('petid');


    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "apptm";
   
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
 if(mysqli_connect_error()) {
      die('Connection Error('. mysqli_connect_errno().')'. mysqli_connect_error());
}else{
    $stmt = $conn->prepare("INSERT Into `dappoint` (fname, petage, pettype, petbreed, gender, phone, addres, pincode, petid) values(?,?,?,?,?,?,?,?,?)");
    
} 
   $stmt->bind_param("sisssisis",$fname,$petage,$pettype,$petbreed,$gender,$phone,$addres,$pincode, $petid); 
   $stmt->execute();
   echo "Registration successful. Your Unique ID id -";
   echo "$petid";
   $stmt->close();
   $conn->close();
   
?>
