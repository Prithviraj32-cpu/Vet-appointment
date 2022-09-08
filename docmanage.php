<html>
  <head>
    <title> Doctor Management</title>
</head>
<body>
  <h1><center>Doctor Management</h1>
  <table border="2">

  <tr>
    <th>S No.</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>E-mail</th>
    <th>License ID</th>
    <th>Specialization</th>
    <th>Address</th>
    <th>Password</th>
    <th>Phone</th>
</tr>


<?php
include("connection2.php");
error_reporting(0);
$query = "SELECT * from dsignup";
$data = mysqli_query($conn,$query);
$total = mysqli_num_rows($data);

if($total!=0)
{
  while($result = mysqli_fetch_assoc($data))
  {
    echo "
    <tr>
    <td>".$result['sno']."</td>
    <td>".$result['fname']."</td>
    <td>".$result['lname']."</td>
    <td>".$result['email']."</td>
    <td>".$result['license']."</td>
    <td>".$result['specialization']."</td>
    <td>".$result['addres']."</td>
    <td>".$result['pass']."</td>
    <td>".$result['phone']."</td>
    </tr>
    ";
  } 
}
else{
  echo "No records found";
}
?>
</table>
</body>
</html>