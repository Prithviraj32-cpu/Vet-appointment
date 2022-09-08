<?php
 
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$license = $_POST['license'];
$gender = $_POST['gender'];
$specialization = $_POST['specialization'];
$addres = $_POST['addres'];
$pass = $_POST['pass'];
$rpass = $_POST['rpass'];
$phone = $_POST['phone'];

if(!empty($fname) || !empty($lname) || !empty($email) || !empty($license) || !empty($gender) || !empty($specialization) || !empty($addres)
|| !empty($pass) || !empty($rpass) || !empty($phone)) {
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "sgnup";
   
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
 if(mysqli_connect_error()) {
      die('Connection Error('. mysqli_connect_errno().')'. mysqli_connect_error());
}else{
    $SELECT = "SELECT `email` From `dsignup` Where `email` = ? Limit 1";
    $INSERT = "INSERT Into `dsignup` (fname, lname, email, license, gender, specialization, addres, pass, rpass, phone) values(?,?,?,?,?,?,?,?,?,?)";
} 
    $stmt = $conn->prepare($SELECT);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($email);
    $stmt->store_result();
    $rnum = $stmt->num_rows;
  
    if ($rnum==0) {
        $stmt->close();

        $stmt = $conn->prepare($INSERT);
        $stmt->bind_param("sssssssssi", $fname, $lname, $email, $license,$gender, $specialization, $addres, $pass, $rpass, $phone);
        $stmt->execute();
        echo "Sign up successful";
    }else{
        echo "Already registered using this email";
    }
    $stmt->close();
    $conn->close();
    }
else {
    echo "All fields are required";
    die();
}
?>
