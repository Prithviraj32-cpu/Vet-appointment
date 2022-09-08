<?php
 
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$phone = $_POST['phone'];
$pass = $_POST['pass'];
$rpass = $_POST['rpass'];


if(!empty($fname) || !empty($lname) || !empty($email) || !empty($gender) || !empty($phone) || !empty($pass) || !empty($rpass)) {
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "sgnup";
   
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
 if(mysqli_connect_error()) {
      die('Connection Error('. mysqli_connect_errno().')'. mysqli_connect_error());
}else{
    $SELECT = "SELECT `email` From `usignup` Where `email` = ? Limit 1";
    $INSERT = "INSERT Into `usignup` (fname, lname, email,gender,phone, pass, rpass) values(?,?,?,?,?,?,?)";
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
        $stmt->bind_param("ssssiss", $fname, $lname, $email,$gender, $phone, $pass, $rpass);
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