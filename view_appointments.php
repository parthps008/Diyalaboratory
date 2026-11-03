<?php

include 'db.php';

/* UPDATE STATUS */

if (isset($_POST['update'])) {

$id = $_POST['id'];
$status = $_POST['status'];

$sql_update = "UPDATE appointments
SET status='$status'
WHERE id='$id'";

mysqli_query($conn, $sql_update);

echo "<script>
alert('Status Updated Successfully');
window.location='view_appointments.php';
</script>";

}

/* FETCH DATA */

$sql = "SELECT * FROM appointments";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html>
<head>

<title>View Appointments</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

<div class="container mt-5">

<h2 class="mb-4">
Appointments Management
</h2>

<table class="table table-bordered table-striped">

<tr>

<th>ID</th>
<th>Patient ID</th>
<th>Test Name</th>
<th>Date</th>
<th>Status</th>
<th>Update</th>

</tr>

<?php

while ($row = mysqli_fetch_assoc($result)) {

?>

<tr>

<form method="POST">

<td>

<?php echo $row['id']; ?>

<input type="hidden"
name="id"
value="<?php echo $row['id']; ?>">

</td>

<td>

<?php echo $row['patient_id']; ?>

</td>

<td>

<?php echo $row['test_name']; ?>

</td>

<td>

<?php echo $row['appointment_date']; ?>

</td>

<td>

<select
name="status"
class="form-control">

<option>

<?php echo $row['status']; ?>

</option>

<option>

Pending

</option>

<option>

Approved

</option>

<option>

Completed

</option>

<option>

Cancelled

</option>

</select>

</td>

<td>

<button
type="submit"
name="update"
class="btn btn-success">

Update

</button>

</td>

</form>

</tr>

<?php

}

?>

</table>

<a href="admin_dashboard.php"
class="btn btn-secondary">

Back to Dashboard

</a>

</div>

</body>
</html>