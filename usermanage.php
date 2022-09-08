<html>
  <head>
    <title> User Management</title>
</head>
<body>
  <h1><center>User Management</h1>
  <table border="2">

  <tr>
    <th>S No.</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>E-mail</th>
    <th>Phone</th>
    <th>Password</th>
</tr>


<?php
include("connection2.php");
error_reporting(0);
$query = "SELECT * from usignup";
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
    <td>".$result['phone']."</td>
    <td>".$result['pass']."</td>
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