<html>
  <head>
    <title> Appointment Check</title>
</head>
<body>
    <div class ="main">
  <h1><center>Doctor Appointment Check</h1>
  <table border="2">

  <tr>
    <th>S No.</th>
    <th>Pet ID</th>
    <th>App.Date</th>
    <th>Symptom</th>
</tr>


<?php
include("connection.php");
error_reporting(0);
$query = "SELECT * from bappt";
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
    <td>".$result['dater']."</td>
    <td>".$result['symptom']."</td>

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