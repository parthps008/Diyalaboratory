<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include 'db.php';

/* CHECK LOGIN */

if (!isset($_SESSION['patient_id'])) {

header("Location: login.php");
exit();

}

$patient_id = $_SESSION['patient_id'];



$sql = "SELECT * FROM appointments 
WHERE patient_id='$patient_id'";

$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>

<title>My Appointments</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body {
background: #f4f6f9;
}

.container-box {
background: white;
padding: 30px;
border-radius: 10px;
box-shadow: 0 0 10px rgba(0,0,0,0.1);
margin-top: 40px;
}

</style>

</head>

<body>

<div class="container">

<div class="container-box">

<h3>My Appointments</h3>

<table class="table table-bordered">

<tr>
<th>ID</th>
<th>Test Name</th>
<th>Date</th>
<th>Status</th>
</tr>

<?php

if (mysqli_num_rows($result) > 0) {

while ($row = mysqli_fetch_assoc($result)) {

echo "<tr>

<td>".$row['id']."</td>
<td>".$row['test_name']."</td>
<td>".$row['appointment_date']."</td>
<td>".$row['status']."</td>

</tr>";

}

}

else {

echo "<tr>
<td colspan='4' class='text-center'>
No appointments found
</td>
</tr>";

}

?>

</table>

</div>

</div>

</body>
</html>