<html>
  <head>
    <title> Check Appointment</title>
</head>
<body>
  <h1><center>Check Appointment</h1>
  <table border="2">

  <tr>
    <th>S No.</th>
    <th>Pet ID</th>
    <th>Name</th>
    <th>Pet type</th>
    <th>App. Date</th>
    <th>Phone</th>
    <th>Address</th>
    <th>Pincode</th>
</tr>


<?php
include("connection.php");
error_reporting(0);
$query = "SELECT * from dappoint";
$data = mysqli_query($conn,$query);
$total = mysqli_num_rows($data);

if($total!=0)
{
  while($result = mysqli_fetch_assoc($data))
  {
    echo "
    <tr>
    <td>".$result['sno']."</td>
    <td>".$result['petid']."</td>
    <td>".$result['fname']."</td>
    <td>".$result['pettype']."</td>
    <td>".$result['dater']."</td>
    <td>".$result['phone']."</td>
    <td>".$result['addres']."</td>
    <td>".$result['pincode']."</td>
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